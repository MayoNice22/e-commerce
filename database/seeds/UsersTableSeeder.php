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
            'name' => 'Admin Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role' => 'Penguasa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Member',
            'email' => 'm@g.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'role' => 'Member',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Davin',
            'email' => 'davin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('321'),
            'role' => 'Pegawai',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
