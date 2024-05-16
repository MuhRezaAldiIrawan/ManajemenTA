<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_interactions extends Model
{
    use HasFactory;

    protected $table = 'user_interactions';

    protected $fillable = [
        'user_id',
        'status',
    ];

}
