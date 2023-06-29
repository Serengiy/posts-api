<?php
namespace Illuminate\Database\Eloquent;



use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    "driver" => "mysql",
    "host" => "books_app_db",
    "port" => "3306",
    "database" => "posts_db",
    "username" => "root",
    "password" => "root"
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();