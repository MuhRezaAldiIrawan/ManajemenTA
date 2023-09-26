<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Start Command to get you started';

    public function handle()
    {
        $response = $this->getUpdate();       
        $chat_id = $response->getChat()->getId();

        $btn = Keyboard::button([           
            'text' => 'Share Phone Number',           
            'request_contact' => true,       
        ]);

        $keyboard = Keyboard::make([           
            'keyboard' => [[$btn]],           
            'resize_keyboard' => true,           
            'one_time_keyboard' => true       
        ]);

        return $this->telegram->sendMessage([           
            'chat_id' => $chat_id,           
            'text' => 'Silahkan tekan Share Phone Number kemudian share!',           
            'reply_markup' => $keyboard       
        ]);
    }
}