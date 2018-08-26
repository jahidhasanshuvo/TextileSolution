<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function color_styles()
    {
        return $this->belongsToMany(ColorStyle::class);
    }
}
