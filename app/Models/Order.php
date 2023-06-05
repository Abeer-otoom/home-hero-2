<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tasker;
use App\Models\User;
class Order extends Model
{
    use HasFactory;
    protected $fillable=['tasker_id','user_id','image','date','hour','location','desc'];
    public function tasker()
    {
        return $this->belongsTo(Tasker::class, 'tasker_id');
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
