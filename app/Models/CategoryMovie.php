<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryMovie extends Model
{
    protected $table = 'categories_movies';
    protected $fillable = ['movie_id','category_id','status_id'];
    protected $guarded = ['id'];
}
