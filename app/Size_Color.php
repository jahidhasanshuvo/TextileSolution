<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size_Color extends Model
{
    protected $fillable = [
        'color_id', 'size_id', 'style_id', 'qty'
    ];

    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function style(){
        return $this->belongsTo(Style::class);
    }
}
