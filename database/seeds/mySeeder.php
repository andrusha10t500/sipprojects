<?php

use Illuminate\Database\Seeder;
use App\File;

class mySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 10; $i++) {
            File::query()->insert([
                'link' => $faker->phoneNumber,
                'size' => mt_rand(200, 300),
                'when_download' => $faker->dateTimeBetween('-1 days', 'now')
            ]);
        }
    }
}
