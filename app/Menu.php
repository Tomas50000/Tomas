<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title'];
    public function menu() {
      return $this->belongsTo('App\Menu');
    }
}
