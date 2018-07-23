<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'program_code',
        'buyer_id',
        'date',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function styles()
    {
        return $this->hasMany(Style::class);
    }
}
