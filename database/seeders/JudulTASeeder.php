<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JudulTA;

class JudulTASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $judulta = [
            [
                'mahasiswa_id' => '1',
                'judul' => 'Deteksi objek dalam IP CAM dengan menggunakan Algoritma YOLOv5 dan DeepSORT untuk pengawasan keamanan',
                'pbb_1' => '1',
                'pbb_2' => '1',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mahasiswa_id' => '2',
                'judul' => 'Cyber Security pada kampus PNUP',
                'pbb_1' => '1',
                'pbb_2' => '1',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ];
        JudulTA::insert($judulta);
    }
}
