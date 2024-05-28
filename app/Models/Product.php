<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
class Product extends Model
{
    protected $fillable=[
        'title',
        'slug',
       'mfg_date_month',
       'mfg_date_year',
        'cat_id',
        'child_cat_id',
        'price_jpy',
        'price_usd',
        'status',
         'photo',
         'stock_code',
         'seat',
         'door',
         'model_code',
         'sold_out',
         'exit_condition',
         'init_condition',
         'chassis_no',
         'dimension',
         'steering',
         'is_best_offer',
         'is_clearance',
         'is_discount',
         'discount',
         'reg_date_year',
         'reg_date_month',
         'grade',
         'expired_date',
         'point',
         'type_id',
         'transmission_id',
         'fuel_id',
         'engine_id',
         'millage',
         'color_id',



        ];

    public function cat_info(){
        return $this->hasOne('App\Models\Category','id','cat_id');
    }
    public function sub_cat_info(){
        return $this->hasOne('App\Models\Category','id','child_cat_id');
    }
    public static function getAllProduct($stockId = null){
        $query = Product::with(['cat_info','sub_cat_info','engine','fuel_type','garde','transmission','color','type'])->orderBy('id','desc');

        if ($stockId) {
            $query->where('stock_code', 'LIKE', "%$stockId%");
        }

        return $query->paginate(10);
    }

    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->orderBy('id','DESC')->limit(8);
    }
    public function getReview(){
        return $this->hasMany('App\Models\ProductReview','product_id','id')->with('user_info')->where('status','active')->orderBy('id','DESC');
    }
    public static function getProductBySlug($slug){
        return Product::with(['cat_info','rel_prods','getReview'])->where('slug',$slug)->first();
    }
    public static function countActiveProduct(){
        $data=Product::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function carts(){
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }

    public function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }
    public function type(){
        return $this->hasOne(Type::class,'id','type_id');
    }

    public function engine(){
        return $this->hasOne(Engine::class,'id','engine_id');
    }
    public function fuel_type(){
        return $this->hasOne(FuelType::class,'id','fuel_id');
    }
    public function garde(){
        return $this->hasOne(Grade::class,'id','grade_id');
    }

    public function transmission(){
        return $this->hasOne(TransMission::class,'id','transmission_id');
    }
    public function color(){
        return $this->hasOne(Color::class,'id','color_id');
    }
    public function accessories()
    {
        return $this->hasMany(Accessory::class);
    }

}