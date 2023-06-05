<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Tasker;
use App\Models\User;
class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";
     
    protected $fillable=['tasker_id','rating','comment' ];

    public function tasker(){
        return $this->belongsTo(Tasker::class);
    }
}
