<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $fillable = ['user_id', 'cart'];
    //apsirasom, kad uzsakymas priklauso useriui
    public function user() {
      return $this->belongsTo(User::class);
    }
}
