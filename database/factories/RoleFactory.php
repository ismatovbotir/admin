<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ["id"=>1,"name"=>"Admin"],
            ["id"=>2,"name"=>"Price"],
            ["id"=>3,"name"=>"Order"],
            ["id"=>4,"name"=>"Collect"],
            ["id"=>5,"name"=>"Guest"]
        ];
    }
}
