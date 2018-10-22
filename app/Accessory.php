<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = [
        'name',
        'booking_quantity',
        'unit_id',
        'received_quantity',
        'balance',
        'goods_receive_date',
        'work_order_submit_date',
        'supplier_id',
        'style_id',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function style()
    {
        return $this->belongsTo(Style::class);
    }
}
