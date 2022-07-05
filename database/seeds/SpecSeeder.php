<?php

use Illuminate\Database\Seeder;

class SpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // DB::table('specs')->insert([
        //     'products_id' => '', //Int
        //     'prosesor' => '', //String
        //     'grafis' => '', //String
        //     'storage' => '', //String
        //     'ram' => '', //Int
        //     'baterai' => '', //String
        //     'berat' => '',//double
        //     'layar' => '',//double
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        DB::table('specs')->insert([
            'products_id' => '1', 
            'prosesor' => 'AMD Ryzen™ 7 4800HS', 
            'grafis' => 'NVIDIA GeForce GTX 1650
            4GB GDDR6', 
            'storage' => '1TB M.2 NVMe PCIe 3.0 SSD', 
            'ram' => '16', 
            'baterai' => '76WHrs, 4S1P, 4-cell Li-ion', 
            'berat' => '1.70',
            'layar' => '14',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('specs')->insert([
            'products_id' => '2', //Int
            'prosesor' => 'AMD Ryzen 9 5900HX', //String
            'grafis' => 'NVIDIA GeForce RTX 3080', //String
            'storage' => '2TB M.2 NVMe PCIe SSD', //String
            'ram' => '32', //Int
            'baterai' => '4-cell, 80 WH', //String
            'berat' => '2.1',//double
            'layar' => '15.6',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('specs')->insert([
            'products_id' => '3', //Int
            'prosesor' => 'AMD Ryzen 9 5900H processor ', //String
            'grafis' => 'NVIDIA GeForce RTX 2070 SUPER', //String
            'storage' => '1 ', //Int
            'ram' => '16', //Int
            'baterai' => 'Hingga 9 jam*', //Int
            'berat' => '1.7',
            'layar' => '16.1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('specs')->insert([
            'products_id' => '4', //Int
            'prosesor' => 'Core i5 7300HQ', //String
            'grafis' => 'GeForce GTX 1050', //String
            'storage' => '1 TB HDD 128 GB SSD', //String
            'ram' => '8', //Int
            'baterai' => '4-cell 3220 mAh', //String
            'berat' => '2.7',//double
            'layar' => '15.6',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
             DB::table('specs')->insert([
            'products_id' => '5', //Int
            'prosesor' => 'Intel Core i9-11900H', //String
            'grafis' => 'NVIDIA GeForce RTX 3080', //String
            'storage' => 'up to 8000GB SSD', //String
            'ram' => '64', //Int
            'baterai' => '4-Cell 99.9 Battery (Whr)', //String
            'berat' => '2.45',//double
            'layar' => '17.3',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);

             DB::table('specs')->insert([
            'products_id' => '6', //Int
            'prosesor' => 'AMD A4', //String
            'grafis' => 'AMD Radeon R3 Graphics', //String
            'storage' => '1 TB HDD', //String
            'ram' => '4', //Int
            'baterai' => 'Polymer 2 cells 30 Wh', //String
            'berat' => '2.1',//double
            'layar' => '14',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            DB::table('specs')->insert([
            'products_id' => '7', //Int
            'prosesor' => 'Intel Core i7', //String
            'grafis' => 'Nvidia GTX1050', //String
            'storage' => '1 TB HDD', //String
            'ram' => '8', //Int
            'baterai' => 'Asus SuperBattery', //String
            'berat' => '2.3 ',//double
            'layar' => '15.6',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            DB::table('specs')->insert([
            'products_id' => '8', //Int
            'prosesor' => 'Core i5', //String
            'grafis' => 'Intel Iris Plus Graphics', //String
            'storage' => '1 TB SSD', //String
            'ram' => '8', //Int
            'baterai' => 'Daya tahan hingga 17 jam.', //String
            'berat' => '1.2',//double
            'layar' => '13.5',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            DB::table('specs')->insert([
            'products_id' => '9', //Int
            'prosesor' => 'Ryzen 7', //String
            'grafis' => 'GeForce GTX 1650Ti', //String
            'storage' => '512 GB SSD', //String
            'ram' => '8', //Int
            'baterai' => '7000', //String
            'berat' => '2.2',//double
            'layar' => '15.6',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            DB::table('specs')->insert([
            'products_id' => '10', //Int
            'prosesor' => 'Ryzen 7', //String
            'grafis' => 'Radeon Graphics', //String
            'storage' => '1 TB 512 GB SSD', //String
            'ram' => '8', //Int
            'baterai' => '7000', //String
            'berat' => '1.5',//double
            'layar' => '14',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //___________________________________
            DB::table('specs')->insert([
            'products_id' => '11', //Int
            'prosesor' => 'Mediatek MT8183', //String
            'grafis' => 'ARM Mali-G72 MP3', //String
            'storage' => '32GB SSD', //String
            'ram' => '4', //Int
            'baterai' => 'HP Durable Battery', //String
            'berat' => '1.70',//double
            'layar' => '11.6',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            DB::table('specs')->insert([
            'products_id' => '12', //Int
            'prosesor' => '2.8GHz Intel Core i7-1165G7', //String
            'grafis' => '128MB Intel Iris Xe Graphics', //String
            'storage' => '512GB PCIe NVMe SSD', //String
            'ram' => '16', //Int
            'baterai' => 'More than 14 hours of Battery life', //String
            'berat' => '1.8',//double
            'layar' => '13.5',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
                DB::table('specs')->insert([
            'products_id' => '13', //Int
            'prosesor' => 'Intel Core i5-1135G7', //String
            'grafis' => 'Intel Iris Xe Graphics', //String
            'storage' => '512GB SSD', //String
            'ram' => '12', //Int
            'baterai' => 'UP to 13 hours Battery life', //String
            'berat' => '1.2',//double
            'layar' => '14',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('specs')->insert([
            'products_id' => '21', //Int
            'prosesor' => 'M1 8-Core', //String
            'grafis' => 'macOS Nojave', //String
            'storage' => '256GB', //String
            'ram' => '8', //Int
            'baterai' => '7000', //String
            'berat' => '2',//double
            'layar' => '14',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('specs')->insert([
            'products_id' => '22', //Int
            'prosesor' => 'Intel Core I7-1135G7', //String
            'grafis' => 'Intel UHD Graphics Intergrated', //String
            'storage' => '512', //String
            'ram' => '8', //Int
            'baterai' => '7000', //String
            'berat' => '5',//double
            'layar' => '14',//double
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

    }
}
