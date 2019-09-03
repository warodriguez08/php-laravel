<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $fillable = ['name','status_id'];
    protected $guarded = ['id'];

    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
