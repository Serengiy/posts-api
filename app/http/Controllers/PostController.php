<?php
namespace App\Http\Controllers;
use App\Filter\PostFilter;
use App\Http\Models\Post;
use App\RMVC\Route\Route;
use App\RMVC\View\View;

class PostController extends Controller
{
    public function index()
    {
        $query = [];
        if (!empty($_GET['title'])) {
            $query['title'] = $_GET['title'];
        }
        if (!empty($_GET['author'])) {
            $query['author'] = $_GET['author'];
        }
        if (!empty($_GET['date_from'])) {
            $query['date_from'] = $_GET['date_from'];
        }
        if (!empty($_GET['date_to'])) {
            $query['date_to'] = $_GET['date_to'];
        }

        if (isset($query)){
            $filter = new PostFilter($query);
            $posts = Post::query()->filters($filter)->get();
            return View::view('post.index', compact('posts'));
        }else{
            $posts = Post::all();
            return View::view('post.index', compact('posts'));

        }
    }

    public function show($post)
    {
        $post = Post::find($post);
        if(isset($post)){
            return View::view('post.show', compact('post'));
        }
        return View::view('notfound');
    }
    public function create()
    {
        return View::view('post.create');
    }
    public function store()
    {
        if($_POST['title'] && $_POST['author']){
            $post = Post::create([
                'title' => $_POST['title'],
                'author' => $_POST['author'],
            ]);
            return View::view('post.show', compact('post'));
        }
        session_start();
        $message = "Все поля формы должны быть заполнены";
        $_SESSION['message'] = $message;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    public function update()
    {
        $post = [];
        if($_POST['title']){
            $post['title'] = $_POST['title'];
        }
        if($_POST['author']){
            $post['author'] = $_POST['author'];
        }
        if($_POST['updated_at']){
            $post['updated_at'] = $_POST['updated_at'];
        }
        if(isset($post)){
            Post::find($_POST['post_id'])->update($post);
            session_start();
            $message = "Пост успешно обновлен";
            $_SESSION['message'] = $message;
            header("Location: " . '/posts/');;
        }

        $post = Post::find($_POST['post_id']);
        return View::view('post.show', compact('post'));
    }

    public function delete()
    {
        $post = Post::find($_POST['post_id']);
        $post->delete();
        session_start();
        $message = "Пост успешно удален";
        $_SESSION['message'] = $message;
        Route::redirect('/posts/');
    }
}