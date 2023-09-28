<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswa = [
            [
                'nama' => 'Muh Reza Aldi Irawan',
                'nim' => '42519039',
                'email' => 'rezaaldiirawan007@gmail.com',
                'hp' => '082393169811',
                'telegram_id' => '811746241',
                'telegram_username' => 'Muh Reza Aldi Irawan',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Mahasiswa::insert($mahasiswa);
    }
}
