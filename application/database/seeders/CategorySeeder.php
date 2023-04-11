<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $categoryNames = Category::factory()->count(8)->create()->pluck('name');
        $data =[
            ['id' => 1, 'name' => 'Games'],
            ['id' => 2, 'name' => 'Electronic'],
            ['id' => 3, 'name' => 'Accessoire'],
            ['id' => 4, 'name' => 'Art'],
            ['id' => 5, 'name' => 'Sport'],
            ['id' => 6, 'name' => 'Book'],
            ['id' => 7, 'name' => 'Clothing'],
            ['id' => 8, 'name' => 'Automotive'],
            ['id' => 9, 'name' => 'Stationery'],
        ];

        foreach ($data as $category){
            Category::create($category);
        };
    }
}
