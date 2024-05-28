<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'drive_type',
        'reg_year_from',
        'reg_year_to',
        'price_from',
        'price_to',
        'currency',
        'name',
        'email',
        'message',
        'country',
        'telephone',
        'email_type',
        'name_prefix',
        'port',
        'stock_number'
        // '_token', // Add _token to the fillable array
    ];
}