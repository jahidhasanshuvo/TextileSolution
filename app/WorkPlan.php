<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkPlan extends Model
{
    protected $fillable=[
        'order_id','start_date','close_date','remarks','working_item_id'
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function working_item(){
        return $this->belongsTo(WorkingItem::class);
    }
}
