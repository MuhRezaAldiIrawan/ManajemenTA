<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBimbingan extends Model
{
    use HasFactory;


    protected $table = 'laporan_bimbingans';

    protected $fillable = [
        'username_telegram',
        'hasil_bimbingan',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
