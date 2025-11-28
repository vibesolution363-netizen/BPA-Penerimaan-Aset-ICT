<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ImportRecipientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data dari fail CSV yang anda berikan
        $data = [
            ['nama' => 'Pengerusi', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'PB', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'PPBK', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'Kapt. Haji Zakhir Khan Bin Yusop', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'Pn. Hida Bt Jerman', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'Pn. Hajah Norkartiny Nawawi', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'Pn. Rajunawati Bt Abdul Rajid', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'Pn. Khatizah Bt Hanapi', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'Pn. Hajah Zuraidah Bt Mohd Rais', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'Pn. Khartina Bt Abu Bakar', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'En. Awg Jahmari Bin Awg Junaidi', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'En. Mohammad Yoshikatriezan Bin Abeng', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'En. Abg Afzanizam Syam Bin Abg Junaidi', 'jenis' => 'AiO (Intel i7)'],
            ['nama' => 'Pn. Rafidah Bt Abdul Samad', 'jenis' => 'Laptop'],
            ['nama' => 'Cik Jennifer Ak Samin', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Norhayati Bt Ramli', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Zarina Bt Mohd Brohanudin', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Noorashikin Bt Rosli', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Zulaikha Bt Liman', 'jenis' => 'Laptop'],
            ['nama' => 'En. Aleva Ak Stephen Lek', 'jenis' => 'Laptop'],
            ['nama' => 'En. Mohd Azlan Bin Kiprawi', 'jenis' => 'Laptop'],
            ['nama' => 'En. Noorfadzli Bin Zainon', 'jenis' => 'Laptop'],
            ['nama' => 'En. Nazarudin Bin Nawi', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Zailina Bt Sapuan', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Nursufeenah Bt Yausop', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Noranim Bt Abdul Rahman', 'jenis' => 'Laptop'],
            ['nama' => 'En. Abg Hood Bin Abg Shariee', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Norhasimah Bt Narudin', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Dayangku Megawati Bt Awg Salleh', 'jenis' => 'Laptop'],
            ['nama' => 'Pegawai Tadbir (Kewangan)', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Suryani Bt Mahrif', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Norlen Bt Jamahari', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Katijah Bt Siji', 'jenis' => 'Laptop'],
            ['nama' => 'Pegawai Khidmat Pelanggan', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Norina Bt Zaini', 'jenis' => 'Laptop'],
            ['nama' => 'En. Azhar Bin Nasir', 'jenis' => 'Laptop'],
            ['nama' => 'En. Muhammad Sahlan Abdullah', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Sharifah Norwahidah Bt Wan Aderus', 'jenis' => 'Laptop'],
            ['nama' => 'En. Azlan Bin Wasli', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Maria Bt Bakar', 'jenis' => 'Laptop'],
            ['nama' => 'En. Ahmad Zakaria Bin Hasmoney', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Nurul Ain Bt Marzuki', 'jenis' => 'Laptop'],
            ['nama' => 'En. Mahafeya Bin Mahraf', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Dorothy Ak Ingan', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Norain Bt Samin', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Aida Bt Junaidi', 'jenis' => 'Laptop'],
            ['nama' => 'Cik Jubika Ak Sait', 'jenis' => 'Laptop'],
            ['nama' => 'En. Zimasham Bin Azahari', 'jenis' => 'Laptop'],
            ['nama' => 'En. Faizan Bin Sauni', 'jenis' => 'Laptop'],
            ['nama' => 'En. Mohd. Solleh Bin Osman', 'jenis' => 'Laptop'],
            ['nama' => 'Cik Kelimi Anak Undau', 'jenis' => 'Laptop'],
            ['nama' => 'En. Hidayatullah Sardy Bin Sanyut', 'jenis' => 'Laptop'],
            ['nama' => 'En. Alif Bin Salim', 'jenis' => 'Laptop'],
            ['nama' => 'Cik Nurhafiza Binti Hazmi', 'jenis' => 'Laptop'],
            ['nama' => 'En. Syahril Afwan Bin Bujang', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Nur Aidil Zawani Binti Ibrahim', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Safiyyah Binti Kamil', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Fiffy Aiza Binti Azmi', 'jenis' => 'Laptop'],
            ['nama' => 'En. Mohamad Saifullizam Bin Rosli', 'jenis' => 'Laptop'],
            ['nama' => 'Cik Lydia Anak Michael Pak', 'jenis' => 'Laptop'],
            ['nama' => 'Pn. Ravila Anak Matu', 'jenis' => 'Laptop'],
            ['nama' => 'En. Fazilah Bin Abdullah', 'jenis' => 'Laptop'],
            ['nama' => 'Pemandu LPB', 'jenis' => 'Laptop'],
            ['nama' => 'BTM 1', 'jenis' => 'Laptop'],
            ['nama' => 'BTM 2', 'jenis' => 'Laptop'],
            ['nama' => 'BTM 3', 'jenis' => 'Laptop'],
            ['nama' => 'IT Kiosk 1', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'IT Kiosk 2', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'IT Kiosk 3', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'IT Kiosk 4', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'IT Kiosk 5', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'IT Kiosk 6', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'IT Kiosk 7', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'IT Kiosk 8', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'Attendance Kiosk-Pentadbiran', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'BizChannel-Kewangan', 'jenis' => 'AiO (Intel i5)'],
            ['nama' => 'PC Editing IT', 'jenis' => 'Desktop'],
            ['nama' => 'PC Video Conference (Bilik Pengurusan)', 'jenis' => 'Desktop'],
            ['nama' => 'PC Video Conference (Bilik Mesy. Ting.10)', 'jenis' => 'Desktop'],
            ['nama' => 'PC Video Conference 1', 'jenis' => 'Desktop'],
            ['nama' => 'PC Video Conference 2', 'jenis' => 'Desktop'],
            ['nama' => 'Auditorium LPB', 'jenis' => 'Desktop'],
        ];

        // Mula Transaction untuk memastikan data konsisten
        DB::transaction(function () use ($data) {
            foreach ($data as $item) {
                
                // 1. Masukkan data ke table recipients
                // Menggunakan insertGetId untuk mendapatkan ID penerima baru
                $recipientId = DB::table('recipients')->insertGetId([
                    'nama' => trim($item['nama']),
                    'profil' => trim($item['nama']), // Menggunakan nama sebagai profil default
                    'tahun' => '2025',
                    'signature' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // 2. Masukkan data ke table assets berpandukan recipient_id tadi
                DB::table('assets')->insert([
                    'recipient_id' => $recipientId,
                    'tahun' => '2025',
                    'jenis' => trim($item['jenis']),
                    // Column siri dibiarkan NULL (atau kosong) seperti dalam fail SQL
                    'siri_device' => null,
                    'siri_adapter' => null,
                    'siri_cord' => null,
                    'siri_dongle' => null,
                    'siri_mouse' => null,
                    'siri_keyboard' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        });
    }
}