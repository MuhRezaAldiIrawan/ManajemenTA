<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LaporanBimbingan;

class LaporanBimbinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laporan = [
            [
                'username_telegram' => 'Rezaaldi007',
                'hasil_bimbingan' => 'Memperbaiki Judul kembali karena terlalu panjang dan memperbaiki larat belakang kerna terjadi kontradiksi pada latar belakang',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username_telegram' => 'Fauzyahmad169',
                'hasil_bimbingan' => 'memperbesar gambar',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        LaporanBimbingan::insert($laporan);
    }
}
