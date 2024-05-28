<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','status'];
    public function products(){
        return $this->hasMany('App\Models\Product','grade_id','id')->where('status','active');
    }
    public static function getProductByBrand($slug){
        // dd($slug);
        return Grade::with('products')->where('slug',$slug)->first();
        // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    }
}
