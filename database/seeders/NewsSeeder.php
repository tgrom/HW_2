<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getDate());


    }

    private function getDate(): array
    {
        $faker = Factory::create();
        $status = ["Dr", "Act", "Bl"];
        $data = [];
        for ($i=0; $i < 10; $i++) {
            $id = $i + 1;
            $data[] = [
                'category_id' => 1,
                'title' => $faker->jobTitle(),
                'status' => $status[mt_rand(0,2)],
                'img' => $faker-> imageUrl(250, 150),
                'author' => $faker-> userName(),
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }
}
