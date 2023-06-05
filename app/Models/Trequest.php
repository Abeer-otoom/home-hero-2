<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trequest extends Model
{
    use HasFactory;
    
    protected $fillable=['tasker_id','user_id','order_date','order_time','order_location','order_image','order_description','result'];

    public function Tasker(){
        $this->belongsTo(Tasker::class);
    
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
