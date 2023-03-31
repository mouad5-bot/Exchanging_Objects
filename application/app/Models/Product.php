<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
        'category_id',
        'location_id'
    ];
     
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function locations(){
        return $this->belongsTo(Location::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}