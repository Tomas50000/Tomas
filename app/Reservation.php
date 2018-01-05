<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['date','time','person_count'];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
