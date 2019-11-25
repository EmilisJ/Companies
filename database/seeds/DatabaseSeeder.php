<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'name' => 'Emilis',
            'email' => '1@1.com',
            'password' => bcrypt('1'),
        ]);
        DB::table('companies')->insert([
            'name' => 'CUSTOMER IS UNEMPLOYD',
            'address' => '',
        ]);
        foreach(range(1,20) as $val) {
            DB::table('companies')->insert([
                'name' => $faker->unique()->company(),
                'address' => $faker->unique()->address(),
            ]);
        }
        foreach(range(1,50) as $val) {
            DB::table('customers')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'comment' => $faker->realText(rand(20,50)),
                'company_id' => rand(2, 19),
            ]);
        }
    }
}
