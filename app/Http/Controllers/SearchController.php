<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inquiry;
use App\Http\Controllers\FrontendController;

class SearchController extends Controller
{
    public function productById($id){
        $product = Product::find($id);
     $photosArray = array_filter(array_map('trim', explode(',', $product->photo)));

    return response()->json(['photo' => $photosArray]);
    }
 public function Search(Request $request){
     $pageSize=request('pageSize', 20);
    $keyword_search=$request->keyword;
    $request_make=$request->make;
    $request_model=$request->model;
    $request_model_code=$request->model_code;
    $reg_from_year=$request->reg_from_year;
    $reg_to_year=$request->reg_to_year;
    $reg_from_month=(int)$request->reg_form_month;
    $reg_to_month=(int)$request->reg_to_month;
    $millage_from= $request->millage_from;
    $millage_to= $request->millage_from;
    $fuel_type=$request->fuel_type;
    $transmission=$request->transmission;
    $color=$request->color;
    $price_from=$request->price_from;
    $price_to=$request->price_to;
    $steering=$request->stearing;
    $is_clearance=$request->clearance;
    $sold_out=$request->sold_out;
    $is_best_offer=$request->discount_stock;
    if($request->engine){
    $engine_cc=$request->engine;
    $engine_cc=explode('^',  $engine_cc);
    $engine_cc_from= (int) $engine_cc[0];
    $engine_cc_to=  (int)  $engine_cc[1];
    }

$query = Product::with('cat_info','sub_cat_info', 'engine', 'fuel_type', 'color', 'transmission');

if ($keyword_search) {
    $query->where(function ($mainQuery) use ($keyword_search) {
        $mainQuery->where('title', 'LIKE', '%' . $keyword_search . '%')
           ->orWhere('reg_date_year', 'LIKE', '%' . $keyword_search . '%')
           ->orWhere('reg_date_month', 'LIKE', '%' . $keyword_search . '%')
            ->orWhere('stock_code', 'LIKE', '%' . $keyword_search . '%')
              ->orWhere('millage', 'LIKE', '%' . $keyword_search . '%')
             ->orWhereHas('cat_info', function ($subQuery) use ($keyword_search) {

                $subQuery->where('title', 'LIKE', '%' . $keyword_search . '%');
            })
            ->orWhereHas('sub_cat_info', function ($subQuery) use ($keyword_search) {

                $subQuery->where('title', 'LIKE', '%' . $keyword_search . '%');
            })
   

            ->orWhereHas('engine', function ($subQuery) use ($keyword_search) {

                $subQuery->where('title', 'LIKE', '%' . $keyword_search . '%');
            })
            ->orWhereHas('fuel_type', function ($subQuery) use ($keyword_search) {

                $subQuery->where('title', 'LIKE', '%' . $keyword_search . '%');
            })
            ->orWhereHas('transmission', function ($subQuery) use ($keyword_search) {

                $subQuery->where('title', 'LIKE', '%' . $keyword_search . '%');
            })
              ->orWhereHas('color', function ($subQuery) use ($keyword_search) {

                $subQuery->where('title', 'LIKE', '%' . $keyword_search . '%');
            });
    });

}
else{
if ($request_make) {
    $query->where('cat_id', $request_make);
}
if ($request_model) {
    $query->where('child_cat_id', $request_model);
}
if ($request_model_code) {
    $query->where('model_code', $request_model_code);
}

if ($request->sold_out) {
    $query->where('sold_out','!=', $request->sold_out);
}

if ($price_from && $price_to) {
    $query->whereBetween('price', [$price_from,$price_to]);
}
if ($reg_from_year && $reg_to_year) {
    $query->whereBetween('reg_date_year', [$reg_from_year,$reg_to_year]);
}
if ($reg_from_month && $reg_to_month) {
 $query->whereBetween('reg_date_month', [$reg_from_month,$reg_to_month]);
}
if ($millage_from && $millage_to) {
$query->whereBetween('millage', [$millage_from,$millage_to]);
}


}


if ($request->engine) {

    $query->whereHas('engine', function ($subSubQuery) use ($engine_cc_from, $engine_cc_to) {
        $subSubQuery->whereBetween('title', [$engine_cc_from, $engine_cc_to]);
    });
}
if ($fuel_type) {
    $query->whereHas('fuel_type', function ($subSubQuery) use ($fuel_type) {
        $subSubQuery->where('title','LIKE', '%' . $fuel_type . '%');
    });
}
if ($transmission) {
    $query->whereHas('transmission', function ($subSubQuery) use ($transmission) {
        $subSubQuery->where('title','LIKE', '%' . $transmission . '%');
    });
}
if ($color) {
    $query->whereHas('color', function ($subSubQuery) use ($color) {
        $subSubQuery->where('title','LIKE', '%' . $color . '%');
    });
}
if ($steering) {
    $query->where('steering', $steering);
}
if ($is_clearance) {
    $query->where('is_clearance', $is_clearance);
}
if ($is_best_offer) {
    $query->where('is_discount', $is_best_offer);
}





 $products=$query->orderBy('id','DESC')->paginate($pageSize);
$frontendController=new FrontendController;

 return $frontendController->stockList( $products);


 }



public function sort($sortOption){

$query = Product::with('sub_cat_info', 'engine', 'fuel_type', 'color', 'transmission');

if ($sortOption === 'new_arrival') {
    // Sort by the creation date in descending order to get the latest products first
    $query->orderBy('created_at', 'desc');
} elseif ($sortOption === 'price_low_to_high') {
    $query->orderBy('price_jpy', 'asc');
} elseif ($sortOption === 'price_high_to_low') {
    $query->orderBy('price_jpy', 'desc');
} elseif ($sortOption === 'year_low_to_high') {
    $query->orderBy('reg_date_year', 'asc');
} elseif ($sortOption === 'year_high_to_low') {
    $query->orderBy('reg_date_year', 'desc');
} elseif ($sortOption === 'millage_low_to_high') {
   $query->orderBy('millage', 'asc');
} elseif ($sortOption === 'millage_high_to_low') {
    $query->orderBy('millage', 'desc');
} elseif ($sortOption === 'a_to_z_model') {
   $query->join('categories', 'products.cat_id', '=', 'categories.id')
          ->orderBy('categories.title');
} elseif ($sortOption === 'z_to_a_model') {
$query->join('categories', 'products.cat_id', '=', 'categories.id')
          ->orderByDesc('categories.title');
}

// Add more sorting options as needed

$results = $query->get();
return $results;

}

public function getModel($id){
$model=Category::where('parent_id',$id)->get();
return response()->json(['data'=>$model]);
}
public function getModelCode($id){
$model_code = Category::
    where('id', $id)
    ->get();
return response()->json(['data'=>$model_code]);
}
public function inquiry(){
$inquires=Inquiry::get();
return view('backend.inquiry.inquiry',compact('inquires'));
}
public function changeCurrency($value,$type){
if($type='JPY')
$product=Product::where('price_jpy',$value)->first();
}
}