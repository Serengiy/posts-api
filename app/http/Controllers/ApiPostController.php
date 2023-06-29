<?php
namespace App\Http\Controllers;
require_once 'bootstrap.php';
use App\Http\Models\Post;
use App\RMVC\View\View;


class ApiPostController extends Controller
{
    public function index()
    {
        $posts = Post::query();
        if(isset($_GET['title'])){
            $posts->where('title', 'like', "%{$_GET['title']}%");
        }
        if(isset($_GET['author'])){
            $posts->where('author', 'like', "%{$_GET['author']}%");
        }
        if(isset($_GET['date_from'])){
            $posts->where('created_at', '>=', $_GET['date_from']);
        }
        if(isset($_GET['date_to'])){
            $posts->where('created_at', '<=', $_GET['date_to']);
        }
        return json_encode($posts->get(), JSON_UNESCAPED_UNICODE);
    }

    public function show($post)
    {
        $post = Post::find($post);
        if(isset($post)){
            return json_encode($post, JSON_UNESCAPED_UNICODE);
        }
        return View::view('notfound');
    }
    public function store()
    {
        if($_POST['title'] && $_POST['author']){
            $post = Post::create([
                'title' => $_POST['title'],
                'author' => $_POST['author'],
            ]);
            return json_encode($post, JSON_UNESCAPED_UNICODE);
        }
         return json_encode('Некорректные данные', JSON_UNESCAPED_UNICODE);
    }

    public function update($post)
    {
        $post = Post::where('id', $post)->exists() ? Post::find($post) : null;
        if (!isset($post)){
            return json_encode('Пост не сущестует', JSON_UNESCAPED_UNICODE);
        }

        $data = [];
        if(isset($_POST['title'])){
            $data['title'] = $_POST['title'];
        }
        if(isset($_POST['author'])){
            $data['author'] = $_POST['author'];
        }
        if(isset($_POST['updated_at'])){
            $data['updated_at'] = $_POST['updated_at'];
        }

        if(isset($data)){
            $post->update($data);
            return json_encode('Пост успешно обновлен', JSON_UNESCAPED_UNICODE);
        }

        return json_encode('Что-то пошло не так :(', JSON_UNESCAPED_UNICODE);
    }

    public function delete($post)
    {
        $post = Post::where('id', $post)->exists() ? Post::find($_POST['id']) : null;
        if(isset($post)){
            $post->delete();
            return json_encode('Пост успешно удален', JSON_UNESCAPED_UNICODE);
        }
        return json_encode('Требуемый пост не найден', JSON_UNESCAPED_UNICODE);
    }
}