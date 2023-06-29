<?php

//namespace Illuminate\Database;

require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('posts', function ($table) {
    $table->increments('id');
    $table->string('title');
    $table->string('author')->unique();
    $table->timestamps();
});