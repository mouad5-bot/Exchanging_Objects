<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Notification;
use App\Models\Message;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // use SoftDeletes;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function roles(){
        return $this->belongsTo(Role::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
    
    public function notifications(){
        return $this->belongsToMany(User::class);
    }

    public function messages(){
        return $this->belongsToMany(User::class);
    }
}
