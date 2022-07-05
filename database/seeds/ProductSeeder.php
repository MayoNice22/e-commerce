<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('products')->insert([
            'nama' => 'ROG Zephyrus G14 GA401',
            'deskripsi' => 'Dinamis dan siap bepergian, Laptop pionir ROG Zephyrus G14 adalah laptop gaming 14 inci berbasis Microsoft Windows 10 Home terkuat. Mengungguli persaingan dengan prosesor hingga 8-core AMD Ryzen™ 9 4900HS series CPU dan GeForce RTX™ 2060 GPU yang kuat yang mempercepat melalui multitasking dan game sehari-hari.',
            'harga' => '19000000',
            'categories_id' => '3',
            'brands_id' => '1',
            'image' => '1638371264_ROG Zephyrus G14 GA401.jpg',
            'disc' => 0.15,
            'tahun_rilis' => '2019',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Legion 7 (16", Gen 6)',
            'deskripsi' => 'Dibalik eksterior alumunium aerospace-grade yang sempurna, laptop gaming Legion 7 Gen 6 (16 inci AMD) memiliki performa yang ganas. Ditenagai oleh prosesor AMD generasi terbaru dan NVIDIA®GeForce RTX, perangkat ini dioptimalkan dengan AI melalui Lenovo Legion AI Engine.',
            'harga' => '28000000',
            'categories_id' => '1',
            'brands_id' => '2',
            'image' => '1638371416_Legion 7.jfif',
            'disc' => 0.1,
            'tahun_rilis' => '2018',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'OMEN by HP Laptop 16-b0064TX',
            'deskripsi' => 'PC Laptop Gaming Victus 16,1 inci memiliki apa yang Anda butuhkan untuk bermain. Dilengkapi hingga AMD Ryzen™ 7 5800H processor1, NVIDIA® GeForce RTX™ graphics yang canggih, dan sistem pendingin yang ditingkatkan.',
            'harga' => '15000000',
            'categories_id' => '1',
            'brands_id' => '4',
            'image' => '1638371461_OMEN by HP Laptop 16-b0064TX.jfif',
            'disc' => 0,
            'tahun_rilis' => '2017',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Acer Nitro 5',
            'deskripsi' => 'Performa & durabilitas stabil, kinerja 25% lebih baik berteknologi CoolBoost Fan didukung Nitro sense untuk pengaturan temperature lebih optimal',
            'harga' => '20000000',
            'categories_id' => '1',
            'brands_id' => '5',
            'image' => '1638371513_Acer Nitro 5.jpg',
            'disc' => 0,
            'tahun_rilis' => '2016',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'MSI GS76-Stealth-11UX',
            'deskripsi' => 'Dilengkapi dengan prosesor Intel® Core™ i9 generasi ke-11 terbaru dan kartu grafis NVIDIA® GeForce RTX™ 3080 Laptop GPU, GS76 Stealth adalah laptop ultra tipis dan paling ringan yang dipadukan dengan baterai berkapasitas 99.9WHr tertinggi di dunia dan Wi-Fi 6E terbaru.',
            'harga' => '27000000',
            'categories_id' => '2',
            'brands_id' => '3',
            'image' => '1607848118_msi_stealth.png',
            'disc' => 0,
            'tahun_rilis' => '2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Lenovo IdeaPad 320-14AST',
            'deskripsi' => 'Lenovo meluncurkan laptop seri Lenovo IdeaPad 320-14AST yang dilengkapi dengan prosesor AMD A4-9120 yaitu prosesor AMD generasi ketujuh yang untuk laptop di bawah harga 4 juta merupakan sesuatu yang mewah.',
            'harga' => '4559000',
            'categories_id' => '1',
            'brands_id' => '2',
            'image' => '1607848233_lenovo_ideapad.jpg',
            'disc' => 0,
            'tahun_rilis' => '2017',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Asus TUF FX504GD',
            'deskripsi' => 'Asus memperkenalkan TUF FX504GD dan FX504GE. Kedua laptop gaming tersebut diklaim memiliki performa dan durabilitas yang tinggi serta harga Asus TUF FX504 yang lebih terjangkau.',
            'harga' => '13737000',
            'categories_id' => '3',
            'brands_id' => '1',
            'image' => '1638193039_spesifikasi-dan-harga-Asus-Tuf-FX504GD-350x300.jpg',
            'disc' => 0,
            'tahun_rilis' => '2018',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Acer Swift 3 SF313-52',
            'deskripsi' => 'Acer Swift 3 SF313-52 memiliki spesifikasi yang cukup mumpuni. Lihat saja layarnya yang memiliki resolusi 2K sehingga bisa menampilkan gamabar yang lebih tajam dan lebih detail. Sudut pandangnya pun lebih luas dengan rasio layar 3:2 dibanding layar standar.',
            'harga' => '9990000',
            'categories_id' => '1',
            'brands_id' => '5',
            'image' => '1678948411_acer_swift.webp',
            'disc' => 0,
            'tahun_rilis' => '2018',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Acer Nitro 5 AN515-44-R3Y8',
            'deskripsi' => 'Nitro 5 AN515-44 sendiri hadir dengan opsi prosesor AMD Ryzen 7 4800H dengan ketersediaan dua slot untuk M.2 PCIe SSD yang bisa dimaksimalkan hingga RAM 32 GB DDR4.',
            'harga' => '10000000',
            'categories_id' => '3',
            'brands_id' => '5',
            'image' => '1561088181_acer_5.webp',
            'disc' => 0,
            'tahun_rilis' => '2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'ASUS VivoBook S14 M433IA-EB704TS',
            'deskripsi' => 'Laptop harga terjangkau dengan spesifikasi tinggi lainnya adalah VivoBook S14 M433. Performanya ditenagai prosesor AMD Ryzen 7 4700U dengan arsitektur Zen2 terbaru dan fabrikasi 7nm.',
            'harga' => '10699000',
            'categories_id' => '2',
            'brands_id' => '1',
            'image' => '1256181891_vivobook.webp',
            'disc' => 0,
            'tahun_rilis' => '2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
//_______________________________________________________________________
        DB::table('products')->insert([
            'nama' => 'HP Chromebook 11',
            'deskripsi' => 'Dinamis dan siap bepergian, HP Chromebook 11 adalah laptop dengan harga yang rendah dengan spesifikasi tinggi, laptop ini sangat cocok digunakan untuk bekerja',
            'harga' => '2000000',
            'categories_id' => '1',
            'brands_id' => '4',
            'image' => '1561884841_chromebook.jpg',
            'disc' => 0.20,
            'tahun_rilis' => '2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'HP Spectre x360 14',
            'deskripsi' => 'Co-engineered with Intel for its Evo platform, the Spectre x360 14 we tested had zippy performance and more than 14 hours of battery life. Along with an assortment of privacy features, this HP laptop has a bright, 1,920x1,280-pixel-resolution, 13.5-inch',
            'harga' => '15000000',
            'categories_id' => '1',
            'brands_id' => '4',
            'image' => '189189189_hpsectre.jpg',
            'disc' => 0.15,
            'tahun_rilis' => '2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Lenovo Yoga 7i (14-inch)',
            'deskripsi' => 'Regularly available for less than $800, this thin, 3-pound convertible is a solid choice for anyone who needs a laptop for office or schoolwork. The all-metal chassis gives it a premium look and feel, and it has a comfortable keyboard and a responsive, smooth precision touchpad.',
            'harga' => '13000000',
            'categories_id' => '1',
            'brands_id' => '2',
            'image' => '1189489498_lenovoyoga.png',
            'disc' => 0.15,
            'tahun_rilis' => '2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Logitech G102 Gaming Mouse',
            'deskripsi' => 'Pencahayaan RGB LIGHTSYNC 6 tombol yang dapat diprogram Resolusi: 200 – 8.000 DPI',
            'harga' => '250000',
            'categories_id' => '6',
            'brands_id' => '4',
            'image' => '1638373514_g102.jfif',
            'disc' => 0,
            'tahun_rilis' => '2010',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Daxa M71 Pro keyboard',
            'deskripsi' => 'Spesifikasi Teknis Dimensi: 330(P) x 102(L) x 37 ± 2mm (T) Jumlah Tombol: 71 Tombol Lampu Latar: LED Material: Plastik ABS Merk Switch : Gateron Kapasitas baterai : 1000mAh. Daya tahan baterai : 10 jam dan 35 jam dalam kondisi siaga Konektor: Bluetooth, Kabel USB 3.0 Sistem operasi: Windows XP/VISTA/7/8/10, IOS, MacOS, Linux, Android',
            'harga' => '900000',
            'categories_id' => '6',
            'brands_id' => '7',
            'image' => '1638374305_daxa.jfif',
            'disc' => 0.1,
            'tahun_rilis' => '2018',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'ADATA SX8200 Pro 512GB NVME SSD',
            'deskripsi' => 'The SX8200 Pro M.2 2280 SSD is XPGs fastest SSD to date and is designed for avid PC enthusiasts, gamers, and overclockers. It features an ultra-fast PCIe Gen3x4 interface that offers sustained peak read/write speeds of 3500/3000MB per second, outpacing SATA 6Gb/s by a wide margin. Supporting NVMe 1.3, the SX8200 Pro delivers excellent random read/write performance and multi-tasking capabilities. With SLC caching, a DRAM Cache buffer, E2E Data Protection, and LDPC ECC,',
            'harga' => '1000000',
            'categories_id' => '6',
            'brands_id' => '2',
            'image' => '1638374508_ssd1.jpg',
            'disc' => 0,
            'tahun_rilis' => '2019',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'SAMSUNG SSD 860 EVO 500GB',
            'deskripsi' => 'Up to 550 MB/s Sequential Read * Performance may vary based on system hardware & configuration
            -Sequential Write Speed Up to 520 MB/s Sequential Write * Performance may vary based on system hardware & configuration',
            'harga' => '970000',
            'categories_id' => '6',
            'brands_id' => '8',
            'image' => '1638376990_3.png',
            'disc' => 0,
            'tahun_rilis' => '2015',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'RAM Laptop sodimm 8GB DDR4',
            'deskripsi' => '3200 Mhz',
            'harga' => '970000',
            'categories_id' => '6',
            'brands_id' => '8',
            'image' => '1638375165_ram.png',
            'disc' => 0,
            'tahun_rilis' => '2013',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'HyperX Furry 8GB DDR4 2666 MHz',
            'deskripsi' => 'Capacity : 8GB Type : 288-Pin DDR4 SDRAM Speed : DDR4 2666 (PC4-21300)
            CAS latency CL16 Low power consumption 1.2V Optimised for Intels X99 chipset',
            'harga' => '600000',
            'categories_id' => '6',
            'brands_id' => '9',
            'image' => '1638375555_ram2.jfif',
            'disc' => 0,
            'tahun_rilis' => '2019',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Adaptor Laptop Asus ',
            'deskripsi' => 'Jual laptop Adaptor Charger Asus Notebook X200',
            'harga' => '250000',
            'categories_id' => '6',
            'brands_id' => '1',
            'image' => '1638375742_asus.jpg',
            'disc' => 0,
            'tahun_rilis' => '2010',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Apple Macbook 12"Inch Gold',
            'deskripsi' => 'Apple M1 Chip with 8‑Core CPU and 7‑Core GPU, 256GB Storage, Apple M1 chip with 8‑core CPU, 7‑core GPU, and 16‑core Neural Engine, 8GB',
            'harga' => '20000000',
            'categories_id' => '5',
            'brands_id' => '6',
            'image' => '1638453185_macbook.jpeg',
            'disc' => 0,
            'tahun_rilis' => '2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'nama' => 'Hp Spectre 15-EB1043DX',
            'deskripsi' => 'Features:
            - Narrow Bezel Display
            - Precision Touchpad
            - Audio Supported by Bang & Olufsen
            - Backlit Keyboard
            - Convertible up to 360 Degrees',
            'harga' => '15000000',
            'categories_id' => '4',
            'brands_id' => '4',
            'image' => '1638453544_12.jpg',
            'disc' => 0,
            'tahun_rilis' => '2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
