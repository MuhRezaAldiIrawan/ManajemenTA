<?php

namespace App\Telegram\Commands;

use Illuminate\Support\Facades\DB;
use App\Models\LaporanBimbingan;
use Telegram\Bot\Laravel\Facades\Telegram;

use Telegram\Bot\Commands\Command;

class BuatLaporanCommand extends Command
{
    protected string $name = 'buat_laporan';
    protected string $description = 'Start Command to get you started';

    public function handle()
    {
        $fallbackUsername = $this->getUpdate()->getMessage()->from->username;
        $username = $this->argument('username', $fallbackUsername);

        // Memulai interaksi dengan pengguna
        $this->replyWithMessage([
            'text' => 'Silahkan masukkan Laporan bimbingan anda atau ketik /cancel untuk membatalkan.',
        ]);

        // Menyimpan status interaksi dengan pengguna
        DB::table('user_interactions')->insert([
            'user_id' => $this->update->getMessage()->from->username,
            'status' => 'waiting_for_report',
        ]);

        // Mengatur keyboard untuk memungkinkan pengguna membatalkan jika diperlukan
        $keyboard = [
            ['/cancel']
        ];

        // Mengirim keyboard
        $this->replyWithMessage([
            'text' => 'Ketikkan laporan anda:',
            'reply_markup' => json_encode([
                'keyboard' => $keyboard,
                'resize_keyboard' => true,
                'one_time_keyboard' => true,
            ]),
        ]);
    }

    public function reportHandler()
    {
        // Mengambil pesan dari pengguna
        $messageText = $this->update->getMessage()->getText();
        $fallbackUsername = $this->getUpdate()->getMessage()->from->username;
        $username = $this->argument('username', $fallbackUsername);

        // Mengambil status interaksi pengguna
        $interaction = DB::table('user_interactions')
            ->where('user_id', $this->update->getMessage()->from->username)
            ->where('status', 'waiting_for_report')
            ->first();
       

        // Jika pengguna memasukkan /cancel, batalkan interaksi
        if ($messageText === '/cancel') {
            DB::table('user_interactions')
                ->where('user_id', $this->update->getMessage()->from->id)
                ->delete();
            $this->replyWithMessage([
                'text' => 'Interaksi dibatalkan.',
            ]);
        } else {
            // Simpan laporan ke dalam database
            LaporanBimbingan::create([
                'username_telegram' => $interaction->username,
                'hasil_bimbingan' => $messageText,
                'status' => 'pending'
            ]);

            // Mengirim konfirmasi ke pengguna
            Telegram::sendMessage([
                'chat_id' => $this->update->getMessage()->getChat()->getId(),
                'text' => 'Laporan telah disimpan di database.',
            ]);

            // Menghapus status interaksi
            DB::table('user_interactions')
                ->where('user_id', $this->update->getMessage()->from->id)
                ->delete();
        }
    }


    // public function handle()
    // {
    //     $fallbackUsername = $this->getUpdate()->getMessage()->from->username;

    //     $username = $this->argument(
    //         'username',
    //         $fallbackUsername
    //     );

    //     $this->replyWithMessage([
    //         'text' => 'Silahkan masukan Laporan bimbingan anda',
    //     ]);


    //     $messageText = $this->update->getMessage()->getText();


    //     LaporanBimbingan::create([
    //         'username_telegram' => $username,
    //         'hasil_bimbingan' => $messageText,
    //         'status' => 'pending'
    //     ]);

    //     Telegram::sendMessage([
    //         'chat_id' => $this->update->getMessage()->getChat()->getId(),
    //         'text' => 'Data telah dimasukkan ke dalam database.',
    //     ]);
    // }
}
