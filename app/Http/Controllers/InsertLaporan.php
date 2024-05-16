<?php

namespace App\Http\Controllers;
use Telegram\Bot\Objects\Message;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Models\LaporanBimbingan;

use Illuminate\Http\Request;

class InsertLaporan extends Controller
{
    public function handleTelegramRequest(Request $request)
    {
        $update = Telegram::commandsHandler(true);

        if ($update->getMessage() && Telegram::getUserContext($update->getMessage()->getChat()->getId()) === 'waiting_for_report') {
            $messageText = $update->getMessage()->getText();

            // Simpan data laporan ke dalam database
            $username = $update->getMessage()->getFrom()->getUsername();
            $laporan = new LaporanBimbingan();
            $laporan->mahasiswa_username = $username;
            $laporan->hasil_bimbingan = $messageText;
            $laporan->status = 'Menunggu persetujuan'; // Atur status sesuai kebutuhan
            $laporan->save();

            // Kirim pesan konfirmasi bahwa data telah berhasil dimasukkan
            Telegram::sendMessage([
                'chat_id' => $update->getMessage()->getChat()->getId(),
                'text' => 'Data hasil bimbingan Anda berhasil disimpan dalam database.'
            ]);

            // Reset konteks pengguna
            Telegram::setUserContext($update->getMessage()->getChat()->getId(), null);
        }
    }
}
