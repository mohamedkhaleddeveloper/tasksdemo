<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'           => "NaDo",
            'name_ar'           => "نادو",
            'email'          => "nad0@msn.com",
            'lang'             => "en",
            'password'          => bcrypt('123456'),
        ]);

    }
}
