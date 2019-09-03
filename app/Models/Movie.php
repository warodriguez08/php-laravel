<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $table = 'movies';
    protected $fillable = ['name','description','status_id','users_id'];
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
