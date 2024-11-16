<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            $role=Role::insert([

                ["id"=>1,"name"=>"Admin"],
                ["id"=>2,"name"=>"Price"],
                ["id"=>3,"name"=>"Order"],
                ["id"=>4,"name"=>"Collect"],
                ["id"=>5,"name"=>"Guest"]
            ]);

            $admin=User::create(
                [
                    "name"=>"Admin",
                    "email"=>"admin@admin.uz",
                    "password"=>Hash::make("123456789"),
                    "role_id"=>1
       
                ]
            );


    }

}
