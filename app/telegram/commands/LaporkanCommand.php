<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class LaporkanCommand extends Command
{
    protected string $name = 'laporkan';
    protected string $description = 'Memulai melaporkan hasil bimbingan TA yang dilakukan ';

    public function handle()
    {
        $this->replyWithMessage([
            'text' => "Perintah yang dapat dimasukan pada BOT Llen seperti berikut : \n/start\n/help\n/laporkan\n/lihat_laporan"
        ]);
        
    }
}