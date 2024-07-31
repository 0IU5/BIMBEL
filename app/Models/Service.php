<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'id_service';

    protected $fillable = ['service', 'email', 'kelas', 'paket'];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_service', 'id_service');
    }
}
