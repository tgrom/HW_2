<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('categories')->insert($this->getDate());


    }

    private function getDate(): array
    {
        $faker = Factory::create();

        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $id = $i + 1;
            $data[] = [

                'title' => $faker->jobTitle(),

                'description' => $faker->text(100)



            ];
        }
        return $data;
    }
}

