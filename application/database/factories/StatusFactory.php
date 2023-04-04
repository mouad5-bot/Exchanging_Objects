<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\status>
 */

class StatusFactory extends Factory
{
    public function definition()
    {
        return [        
            "name" => $this->faker->randomElement([    
                "In progress",
                "Accepted",
                "Refused"
            ]),
        ];
    }
}


