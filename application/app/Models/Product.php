<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Models\Location;
use App\Models\status;



class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'status_id',
        'category_id',
        'location_id'
    ];
     
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function locations(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}