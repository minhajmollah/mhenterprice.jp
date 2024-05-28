<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Type;
use App\User;
use Auth;
use App\Models\Banner;
use App\Models\Freight;

use App\Models\Engine;
use App\Models\FuelType;
use App\Models\Color;
use App\Models\Settings;
use App\Models\TransMission;
use Session;
use Newsletter;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class FrontendController extends Controller
{

    public function index(Request $request){
        $settings=Settings::first();

        $categories=Category::where('is_parent',1)->get();
       $banners=Banner::get();
         $types=Type::all();
         $query = Product::with('engine', 'fuel_type', 'color', 'transmission');
         $products=  $query->orderBy('id','DESC')->limit(16)->get();
        return view('frontend.index',compact('settings','categories','products','types','banners'));
    }

    public function stockList($products=[]){
        $pageSize=request('pageSize', 20);

      if($products){
      $products=$products;
       }else{

        $query = Product::with('sub_cat_info', 'engine', 'fuel_type', 'color', 'transmission');
         $products=  $query->orderBy('id','DESC')->paginate($pageSize);

}





        $categories = Category::where('is_parent', 1)
        ->withCount('products')
        ->get();

        $fuel_types=FuelType::all();
        $colors=Color::all();
        $trans_missions=TransMission::all();
        return view(
            'frontend.pages.stock-list.stock-list',
            compact(
                'products',
                'categories',
                'fuel_types',
                'colors',
                'trans_missions'
            ));
    }
    public function howBuy(){
        return view('frontend.pages.how-to-buy');
    }
    public function companyProfile(){
        return view('frontend.pages.about');
    }

    public function faq(){
        return view('frontend.pages.faq');
    }
    public function vehicleInquiry(){
        return view('frontend.pages.vehicle_inquiry');
    }
    public function whyChoesUs(){
        return view('frontend.pages.why-choes-us');
    }
    public function freightTable(){
$freights = Freight::with('country')
    ->orderBy('continent')
    ->get()
    ->groupBy('continent');
        return view('frontend.pages.freight-table',compact('freights'));
    }
    public function bnakInformation(){
        return view('frontend.pages.bank-information');
    }
    public function endorsement(){
        return view('frontend.pages.endorsement');
    }

    public function productDetail($slug){
        $product_detail= Product::getProductBySlug($slug);
        // dd($product_detail);
        return view('frontend.pages.product_detail')->with('product_detail',$product_detail);
    }
   public function carDetails($id){
    $productViewsIncrement=Product::where('id',$id)->increment('views');

     $product=Product::with('accessories','cat_info','sub_cat_info','engine', 'fuel_type', 'color', 'transmission')
     ->where('id',$id)->first();

    return view('frontend.pages.car-details',compact('product'));
}

    public function productById($id){



$pageSize = request('pageSize', 20);

$categories = Category::where('is_parent', 1)->withCount('products')
->get();

$query = Product::with('cat_info', 'sub_cat_info',  'engine', 'fuel_type', 'color', 'transmission');

$products = $query
    ->select('products.*', DB::raw('(SELECT COUNT(*) FROM categories WHERE categories.id = products.cat_id) as product_count'))
    ->where('cat_id', $id)
    ->orWhere('child_cat_id', $id)
    ->orderBy('id', 'DESC')
    ->paginate($pageSize);



      $categoryChild=Category::getChildByParentID($id);

        $fuel_types=FuelType::all();
        $colors=Color::all();
        $trans_missions=TransMission::all();


        return view(
            'frontend.pages.category.stock-list',
            compact(
                'categoryChild',
                'categories',
                'products',
                'fuel_types',
                'colors',
                'trans_missions'
            ));
    }

    public function productByType($id){

$pageSize = request('pageSize', 20);

$categories = Category::where('is_parent', 1)->get();
$query = Product::with('cat_info', 'sub_cat_info',  'engine', 'fuel_type', 'color', 'transmission');

$products = $query
    ->select('products.*', DB::raw('(SELECT COUNT(*) FROM categories WHERE categories.id = products.cat_id) as product_count'))
    ->where('type_id', $id)

    ->paginate($pageSize);



      $categoryChild=Category::getChildByParentID($id);

        $fuel_types=FuelType::all();
        $colors=Color::all();
        $trans_missions=TransMission::all();

        return view(
            'frontend.pages.category.stock-list',
            compact(
                'categoryChild',
                'categories',
                'products',
                'fuel_types',
                'colors',
                'trans_missions'
            ));
    }

}