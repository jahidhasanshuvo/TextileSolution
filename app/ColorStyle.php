<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorStyle extends Model
{
    protected $fillable = [
        'color_id','style_id'
    ];

    public function colors(){
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
    public function styles(){
        return $this->belongsTo(Style::class);
    }
    public function sizes(){
        return $this->belongsToMany(Size::class)
            ->withPivot('qty')
            ->withTimestamps();
    }
}
