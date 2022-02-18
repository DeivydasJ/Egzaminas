<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'user_id', 'movies_id'];
    public function movies(){
        return $this->belongsTo(Movies::class);
    }
    public function user(){
    return $this->belongsTo(User::class);
    }
}
