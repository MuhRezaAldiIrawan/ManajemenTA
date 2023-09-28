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
                'mahasiswa_id' => '1',
                'mahasiswa_username' => 'Muh Reza Aldi Irawan',
                'judul_id' => '1',
                'hasil_bimbingan' => 'Memperbaiki Judul kembali karena terlalu panjang dan memperbaiki larat belakang kerna terjadi kontradiksi pada latar belakang',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mahasiswa_id' => '2',
                'mahasiswa_username' => 'fauzy ahmad',
                'judul_id' => '2',
                'hasil_bimbingan' => 'memperbesar gambar',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        LaporanBimbingan::insert($laporan);
    }
}
