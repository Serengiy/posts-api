<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent
{

    protected $table = 'posts';
    protected $guarded =false;

}