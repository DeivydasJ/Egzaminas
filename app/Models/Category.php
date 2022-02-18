<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movies;
use App\Models\User; 

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category'];
    public function movies(){
        return $this->hasMany(Movies::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
