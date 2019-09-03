<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'statuses';
    protected $fillable = ['status'];
    protected $guarded = ['id'];

    public function movies()
    {
        return $this->hasMany('App\Models\Movie');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }
}
