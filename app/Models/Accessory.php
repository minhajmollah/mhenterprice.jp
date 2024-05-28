<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

protected $fillable = ['comfort', 'other_feature', 'selling_point', 'safety_measure', 'window_type', 'other_information','product_id','sound_system'];

public static function getAllAccessory(){
    return Accessory::with('product')->orderBy('id','desc')->paginate(10);
}
public function product()
{
    return $this->belongsTo(Product::class,'product_id','id');
}
}
