<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i <= 10; $i++){
            DB::table('lots')->insert([
                'name' => $faker->name,
                'description' => $faker->sentence,
                'category_id' => rand(1,11)
            ]);
        }
    }
}
