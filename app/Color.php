<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'name', 'var', 'description'
    ];

    public function size_color()
    {
        return $this->hasMany(SizeColor::class);
    }
}
