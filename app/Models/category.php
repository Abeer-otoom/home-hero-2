<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Tasker;
class category extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function Taskers(){
      return  $this->hasMany(Tasker::class);
    
    }
}
