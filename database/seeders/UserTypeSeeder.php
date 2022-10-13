<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('user_types')->count() == 0){

            DB::table('user_types')->insert([

                [
                    'name' => 'megaUser',
                    'description' => fake()->text($maxNbChars = 100),

                ],
                [
                    'name' => 'user',
                    'description' => fake()->text($maxNbChars = 100),
                ],
                [
                    'name' => 'admin',
                    'description' => fake()->text($maxNbChars = 100),

                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}


// $table->id();
// $table->string('name');
// $table->string('description');
// $table->timestamps();
