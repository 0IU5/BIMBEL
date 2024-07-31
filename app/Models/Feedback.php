<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';
    protected $primaryKey = 'id_feedback';

    protected $fillable = ['id_user', 'id_service', 'name', 'email', 'feedback'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service', 'id_service');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
