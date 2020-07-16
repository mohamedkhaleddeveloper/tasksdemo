<?php

use Illuminate\Database\Seeder;
use App\user_rols;
class useRrolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        user_rols::create([
            'user_id'           => "1",
            'role_id'           => "1",
        ]);
        user_rols::create([
            'user_id'           => "1",
            'role_id'           => "2",
        ]);
        user_rols::create([
            'user_id'           => "1",
            'role_id'           => "3",
        ]);
        user_rols::create([
            'user_id'           => "1",
            'role_id'           => "4",
        ]);
        user_rols::create([
            'user_id'           => "1",
            'role_id'           => "5",
        ]);
        user_rols::create([
            'user_id'           => "1",
            'role_id'           => "6",
        ]);
        user_rols::create([
            'user_id'           => "1",
            'role_id'           => "7",
        ]);
        user_rols::create([
            'user_id'           => "1",
            'role_id'           => "8",
        ]);
        user_rols::create([
            'user_id'           => "1",
            'role_id'           => "9",
        ]);

    }
}
