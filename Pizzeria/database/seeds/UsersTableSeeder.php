<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'telefon' => '111111111',
            'email' => 'admin@admin.pl',
            'password' => hash::make('qwerty123')
        ]);
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);
    }
}
