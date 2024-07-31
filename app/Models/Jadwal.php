<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'paket',
        'start_time',
        'end_time',
        'id_user' // Menambahkan id_user ke fillable
    ];

    protected $primaryKey = 'id_jadwal';

    // Menambahkan relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
