<?php
namespace App\Http\Controllers;


use App\RMVC\View\View;
//use Resources\database\Connection;
use App\Http\Database\Connection;
use PDO;

class PostController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = Connection::connect();
    }

    public function index()
    {
        $query = $this->db->query('SELECT * FROM posts');
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);
        return View::view('post.index', compact('posts'));
    }

    public function show($post)
    {

        return View::view('post.show', compact('post'));
    }

    public function store()
    {
        var_dump($_POST);
        var_dump(21312);
        return 'saved';
//        Route::redirect('/posts');
    }
}