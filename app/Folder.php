<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function workpapers(){
      return $this->hasMany('App\Workpaper');
    }
}
