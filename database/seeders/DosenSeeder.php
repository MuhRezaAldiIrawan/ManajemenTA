<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dosen = [
            [
                'nama' => 'Eddy Tungadi, S.T.,M.T.',
                'nidn' => '45368920',
                'email' => 'Eddy@gmail.com',
                'hp' => '08239317811',
                'telegram_id' => '811746242',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Dosen::insert($dosen);
    
    }
}
