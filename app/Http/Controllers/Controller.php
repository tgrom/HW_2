<?php

namespace App\Http\Controllers;

use Carbon\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(?int $id = null): array {
        $faker = \Faker\Factory::create();
        $status = ["Dr", "Act", "Bl"];
        if($id) {
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'autor' => $faker-> userName(),
                'img' => $faker-> imageUrl(250, 150),
                'status' => $status[mt_rand(0,2)],
                'description' => $faker->text(100)
            ];
        }

        $data = [];
        for ($i=0; $i < 10; $i++) {
            $id = $i + 1;
            $data[] = [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'autor' => $faker-> userName(),
                'img' => $faker-> imageUrl(250, 150),
                'status' => $status[mt_rand(0,2)],
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }
    public function getCategory(): array
    {
        $faker = \Faker\Factory::create();
        $status = ["Activ", "Close"];
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $id = $i + 1;
            $data[] = [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'number' => $faker->randomNumber(2),
                'description' => $faker->text(100),
                'status' => $status[mt_rand(0, 1)]

            ];
        }
        return $data;

    }
};
