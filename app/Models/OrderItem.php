<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Comment;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
