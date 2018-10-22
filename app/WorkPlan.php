<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkPlan extends Model
{
    protected $fillable=[
        'style_id',
        'start_date',
        'close_date',
        'remarks',
        'working_item_id'
    ];
    public function style(){
        return $this->belongsTo(Style::class);
    }
    public function working_item(){
        return $this->belongsTo(WorkingItem::class);
    }
}
