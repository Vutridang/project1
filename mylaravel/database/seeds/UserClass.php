<?php

use Illuminate\Database\Seeder;

class UserClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert(
            [
                'name' => $faker->name,
                'email' => 'user@admin.com',
                'email_verified_at' => now(),
                'date_of_birth' => '1994-03-03',
                'password' => Hash::make('123456'),
                'gender' => '1',
                'number_phone' => '0982097131',
                'address' => $faker->address,
                'role' => '2',
            ]
        );
    }
}
