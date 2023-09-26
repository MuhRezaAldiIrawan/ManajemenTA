<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Models\LaporanBimbingan;

class LaporkanCommand extends Command
{
    protected string $name = 'laporkan';
    protected string $description = 'Memulai melaporkan hasil bimbingan TA yang dilakukan';
    protected $signature = 'telegram:getdata';


    public function handle()
    {

        $items = LaporanBimbingan::all();

        foreach ($items as $item) {
            // Kirim data ke pengguna bot
            $this->telegram->sendMessage([
                'chat_id' => $this->update->getMessage()->getChat()->getId(),
                'text' => "Laporan Hasil Data Bimbingan: \n\n ID Laporan : {$item->id}, \n\nHasil Bimbingan: {$item->hasil_bimbingan}, \n\nStatus Hasil Bimbingan: {$item->status}",
            ]);
        }

        
    }
}