<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        $initialData = [
            ['id' => 1, 'nama' => 'Pengerusi', 'profil' => 'Pengerusi', 'jenis' => 'AiO (Intel i7)', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 2, 'nama' => 'PB', 'profil' => 'PB', 'jenis' => 'AiO (Intel i7)', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 3, 'nama' => 'PPBK', 'profil' => 'PPBK', 'jenis' => 'AiO (Intel i7)', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 4, 'nama' => 'Kapt. Haji Zakhir Khan Bin Yusop', 'profil' => 'Zakhir Khan', 'jenis' => 'AiO (Intel i7)', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 5, 'nama' => 'Pn. Hida Bt Jerman', 'profil' => 'Hida', 'jenis' => 'AiO (Intel i7)', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 6, 'nama' => 'Pn. Hajah Norkartiny Nawawi', 'profil' => 'Norkartiny', 'jenis' => 'AiO (Intel i7)', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 52, 'nama' => 'En. Hidayatullah Sardy Bin Sanyut', 'profil' => 'Hidayatullah', 'jenis' => 'Laptop', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 53, 'nama' => 'En. Alif Bin Salim', 'profil' => 'Alif', 'jenis' => 'Laptop', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 54, 'nama' => 'Cik Nurhafiza Binti Hazmi', 'profil' => 'Nurhafiza', 'jenis' => 'Laptop', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 63, 'nama' => 'Pemandu LPB', 'profil' => 'Pemandu', 'jenis' => 'Laptop', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 67, 'nama' => 'IT Kiosk 1', 'profil' => 'IT Kiosk 1', 'jenis' => 'AiO (Intel i5)', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
            ['id' => 68, 'nama' => 'IT Kiosk 2', 'profil' => 'IT Kiosk 2', 'jenis' => 'AiO (Intel i5)', 'siri_device' => '', 'siri_adapter' => '', 'siri_cord' => '', 'siri_dongle' => '', 'diterima' => false, 'signature' => null],
        ];

        foreach ($initialData as $data) {
            Asset::create($data);
        }
    }
}
