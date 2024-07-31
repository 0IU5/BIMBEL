<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id_payment';

    protected $fillable = [
        'package_type', 
        'amount', 
        'jenis_payment', 
        'payment_date', 
        'customer_name'
    ];
}
