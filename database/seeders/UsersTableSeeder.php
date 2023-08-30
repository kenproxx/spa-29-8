<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->where('email', 'admin@gmail.com')->delete();

        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make(123456),
            'status' => '1',
            'role_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456),
            'status' => '1',
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'Guest',
            'email' => 'guest@gmail.com',
            'password' => Hash::make(123456),
            'status' => '1',
            'role_id' => '3',
        ]);
    }
}
