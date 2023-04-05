<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
    ];
    
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
