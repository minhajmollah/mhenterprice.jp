<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Engine;
use App\Models\FuelType;
use App\Models\Grade;
use App\Models\Color;
use App\Models\TransMission;
use App\Models\Type;
use Illuminate\Support\Facades\Validator;
use App\Models\Accessory;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        // Get all products or filter by stock_id if provided
        $products =Product::getAllProduct();

        return view('backend.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $engines=Engine::get();
        $fuel_types=FuelType::get();
        $grades=Grade::get();
        $colors=Color::get();
        $trans_missions=TransMission::get();
        $types=Type::get();
        $brands=Brand::get();
        $categories=Category::where('is_parent',1)->get();
        // return $category;
        return view('backend.product.create',compact('categories','brands','types','trans_missions','colors','grades','fuel_types','engines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'string|required',

            'photo' => 'string|required',

            'cat_id' => 'required|exists:categories,id',
            'model_code'=>'required',
            'status' => 'required|in:active,inactive',
            'chassis_no' => 'required',

            'steering' => 'required',
             'price_jpy' => 'required |digits_between:3,10',
             'price_usd' => 'required |digits_between:3,10',



            'seat' => 'required',
            'door' => 'required',


        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data=$request->all();

        $slug=Str::slug($request->title);
        $count=Product::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;

        $latestStockCode = Product::max('stock_code');

        // Check if there is a latest stock code
        if ($latestStockCode !== null) {
            // Increment the latest stock code
            $stockCode = $latestStockCode + 1;
        } else {
            // Generate a random 6-digit stock code
            $stockCode = mt_rand(100000, 999999);
        }
        $data['stock_code']=   $stockCode;

        // return $size;
        // return $data;
        $product=Product::create($data);
        if ($product) {
            $accessoryData = [];
            $accessoryFields = ['other_feature', 'comfort', 'selling_point', 'safety_measure', 'window_type', 'sound_system', 'other_information'];

            foreach ($accessoryFields as $field) {
                if ($request->has($field)) {
                    $accessoryData[$field] = $request->$field;
                } else {
                    $accessoryData[$field] = [];
                }
            }

            $valuesCount = count(reset($accessoryData)); // Assuming all arrays have the same count

            for ($i = 0; $i < $valuesCount; $i++) {
                $row = [];
                foreach ($accessoryFields as $field) {
                    $row[$field] = $accessoryData[$field][$i] ?? null;
                }
                $product->accessories()->create($row);
            }

            request()->session()->flash('success', 'Product Successfully added');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }


            request()->session()->flash('success','Product Successfully added');


        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $product=Product::with(['cat_info','sub_cat_info','engine','fuel_type','garde','transmission','color','type'])->where('id',$id)->first();

    return view('backend.product.details',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::get();
        $product=Product::with(['cat_info','sub_cat_info','engine','fuel_type','garde','transmission','color','type'])->where('id',$id)->first();
        $category=Category::where('is_parent',1)->get();
        $items=Product::where('id',$id)->get();

        $engines=Engine::get();
        $fuel_types=FuelType::get();
        $grades=Grade::get();
        $colors=Color::get();
        $trans_missions=TransMission::get();
        $types=Type::get();
        $brands=Brand::get();
        $categories=Category::where('is_parent',1)->get();
        // return $items;
        return view('backend.product.edit',compact('product','categories','brands','types','trans_missions','colors','grades','fuel_types','engines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product=Product::findOrFail($id);
         // return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'string|required',

            'photo' => 'string|required',

            'cat_id' => 'required|exists:categories,id',
            'model_code'=>'required',
            'status' => 'required|in:active,inactive',
            'chassis_no' => 'required',

            'steering' => 'required',
             'price_jpy' => 'required |digits_between:3,10',
             'price_usd' => 'required |digits_between:3,10',



            'seat' => 'required',
            'door' => 'required',


        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data=$request->all();




        // return $data;
        $status=$product->fill($data)->update();
        if ($status) {
            $accessoryData = [];
            $accessoryFields = ['other_feature', 'comfort', 'selling_point', 'safety_measure', 'window_type', 'sound_system', 'other_information'];

            foreach ($accessoryFields as $field) {
                if ($request->has($field)) {
                    $accessoryData[$field] = $request->$field;
                } else {
                    $accessoryData[$field] = [];
                }
            }

            $valuesCount = count(reset($accessoryData)); // Assuming all arrays have the same count

            // Delete existing accessories
            $product->accessories()->delete();

            // Create new accessories
            for ($i = 0; $i < $valuesCount; $i++) {
                $row = [];
                foreach ($accessoryFields as $field) {
                    $row[$field] = $accessoryData[$field][$i] ?? null;
                }
                $product->accessories()->create($row);
            }

            // Flash success message
            request()->session()->flash('success', 'Product Successfully updated');
        } else {
            // Flash error message
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();

        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }
    public function SearchByStockId(Request $request){
             $stockId = $request->input('stock_id');

        // Get all products or filter by stock_id if provided
        $products = ($stockId)
            ? Product::getAllProduct($stockId)
            : Product::getAllProduct();

        return view('backend.product.search')->with('products', $products);

    }
}