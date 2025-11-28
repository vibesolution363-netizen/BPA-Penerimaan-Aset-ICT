<?php

namespace Database\Seeders;

use App\Models\Recipient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipientSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $recipients = [
            ['nama' => 'En. Ahmad Bin Abdullah', 'profil' => 'Ahmad'],
            ['nama' => 'Pn. Siti Binti Omar', 'profil' => 'Siti'],
            ['nama' => 'En. Mohammad Bin Hassan', 'profil' => 'Mohammad'],
            ['nama' => 'Cik Nurul Binti Ibrahim', 'profil' => 'Nurul'],
            ['nama' => 'Dr. Azman Bin Ali', 'profil' => 'Azman'],
        ];

        foreach ($recipients as $recipient) {
            Recipient::create($recipient);
        }
    }
}
