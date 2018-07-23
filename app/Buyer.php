<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = [
        'name','code','season' ,'brand','activity','email','address','contact'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
