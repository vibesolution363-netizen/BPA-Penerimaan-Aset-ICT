<?php

namespace Database\Seeders;

use App\Models\AssetType;
use Illuminate\Database\Seeder;

class AssetTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nama' => 'AiO (Intel i7)'],
            ['nama' => 'AiO (Intel i5)'],
            ['nama' => 'Laptop'],
            ['nama' => 'Desktop'],
        ];

        foreach ($types as $type) {
            AssetType::create($type);
        }
    }
}
