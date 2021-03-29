<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //テーブル名
    protected $table = 'blogs';

    //カラム
    protected $fillable = [
      'title',
      'sentence',
      'name',
    ];

    public function users(){
      return $this->belongsToMany('App\User')->withTimestamps();
    }


}
