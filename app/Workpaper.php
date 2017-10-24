<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workpaper extends Model
{
    public function folder(){
      return $this->belongsTo('App\Folder');
    }
}
