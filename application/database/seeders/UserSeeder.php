<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder{
    public function run(){
        User::factory()->count(1)->create()->each(
            function($user){
                $user->assignRole('Super_admin');
        });
        User::factory()->count(2)->create()->each(
            function($user){
                $user->assignRole('admin');
        });
        User::factory()->count(4)->create()->each(
            function($user){
                $user->assignRole('client');
        });
    }
    
}
