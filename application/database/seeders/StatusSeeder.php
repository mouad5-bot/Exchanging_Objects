<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $StatusNames = Status::factory()->count(3)->create()->pluck('name');
        $data =[
            ['id' => 1, 'name' => 'In Progress'],
            ['id' => 2, 'name' => 'Accepted'],
            ['id' => 3, 'name' => 'Refused']
        ];

        foreach ($data as $status){
            Status::create($status);
        };
    }
}
