<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freight extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'port',
        'ship_time',
        'frequency',
        'volume_range',
        'container_rate',
        'continent',
     
    ];

    protected $casts = [
        'ship_time' => 'json',
        'frequency' => 'json',
        'volume_range' => 'json',
        'container_rate' => 'json',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
