<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $pattern = '{first_name}';
    protected string $description = 'Start Command to get you started';

    public function handle()
    {
        $fallbackUsername = $this->getUpdate()->getMessage()->from->first_name;
        
        $first_name = $this->argument(
            'username',
            $fallbackUsername
        );

        $this->replyWithMessage([
            'text' => "Hello {$first_name}, \n\nLlen merupakan BOT yang dapat digunakan untuk melalukan pelaporan Bimbingan TA yang telah dilakukan. \n\nuntuk melihat perintah apa saja yang dapat dimasukan silahkan memasukan perintah /help ",
        ]);
        
    }
}