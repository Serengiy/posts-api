<?php
namespace App\Http\Models;
//use App\Models\Traits\HasFilter;
use App\Filter\AbstractFilter;
use App\Http\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    use HasFilter;
    protected $table = 'posts';
    protected $guarded =false;

}