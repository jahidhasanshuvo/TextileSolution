<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'name','description'
    ];
    public function size_color()
    {
        return $this->hasMany(SizeColor::class);
    }
}
