<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'nama' => 'Asus',
            'image' => '1638371305_586c7a2428fe8-logo-asus_665_374.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'nama' => 'Lenovo',
            'image' => '1638277753_lenovo.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'nama' => 'MSI',
            'image' => '1638277774_MSI-Logo.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'nama' => 'HP',
            'image' => '1638277795_2048px-HP_logo_2012.svg.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'nama' => 'Acer',
            'image' => '1638277827_acer.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'nama' => 'Apple',
            'image' => '1638370941_apple-logo-editorial-iApple.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'nama' => 'Rexus',
            'image' => '1638373723_rexus.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'nama' => 'Samsung',
            'image' => '1638374641_Logo_samsung.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'nama' => 'HyperX',
            'image' => '1638375346_hyperX.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
