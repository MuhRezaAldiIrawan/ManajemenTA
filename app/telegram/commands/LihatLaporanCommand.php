<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use App\Models\Mahasiswa;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Models\LaporanBimbingan;

class LihatLaporanCommand extends Command
{
    protected string $name = 'lihat_laporan';
    protected string $description = 'Melihat hasil laporan yang telah dibuat';
    protected $signature = 'telegram:getdata';


    public function handle()
    {
        $fallbackUsername = $this->getUpdate()->getMessage()->from->username;

        $username = $this->argument(
            'username',
            $fallbackUsername
        );

        // $items = LaporanBimbingan::all();
        $items = LaporanBimbingan::where('username_telegram', $username)->get();

        if ($items->isEmpty()) {
            $this->replyWithMessage([
                'text' => 'Tidak ada laporan bimbingan yang tersedia untuk Anda atau periksa kembali nama yang anda daftarkan pada database.'
            ]);
        } else {
            foreach ($items as $item) {
                // Kirim data ke pengguna bot
                $this->telegram->sendMessage([
                    'chat_id' => $this->update->getMessage()->getChat()->getId(),
                    'text' => "Laporan Hasil Data Bimbingan: \n\n ID Laporan : {$item->id}, \n\nHasil Bimbingan: {$item->hasil_bimbingan}, \n\nStatus Hasil Bimbingan: {$item->status}",
                ]);
            }
        }
    }
}
