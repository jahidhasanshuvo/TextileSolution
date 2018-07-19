<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = [
        'name','code','season' ,'brand','activity','email','address','contact'
    ];
}
