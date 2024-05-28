<?php

namespace App\Http\Controllers;
use App\Models\Accessory;
use App\Models\Product;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
  // Display a listing of the accessories.
  public function index()
  {
    $accessories = Accessory::getAllAccessory();

    return view('backend.accessories.index', compact('accessories'));

  }

  // Show the form for creating a new accessory.
  public function create()
  {

    $products = Product::select('id', 'title')->get();
      return view('backend.accessories.create',compact('products'));
  }

  // Store a newly created accessory in the database.
  public function store(Request $request)
  {

    $request->validate([
        'product_id' => 'required|exists:products,id',
        'comfort'=>'required',
        'other_feature'=>'required',
        'selling_point'=>'required',
        'safety_measure'=>'required',
        'window_type'=>'required',
        'other_information'=>'required',

    ]);

      $accessory = Accessory::create($request->all());

      if($accessory){
          request()->session()->flash('success','Accessory Successfully added');
      }
      else{
          request()->session()->flash('error','Please try again!!');
      }
      return redirect()->route('accessories.index');

  }

  // Display the specified accessory.
  public function show($id)
  {
      $accessory = Accessory::find($id);
      return view('accessories.show', compact('accessory'));
  }

  // Show the form for editing the specified accessory.
  public function edit($id)
  {
      $products  = Product::select('id', 'title', 'stock')->get();
      $accessory = Accessory::with('product')->find($id);
      return view('backend.accessories.edit', compact('accessory','products'));
  }

  // Update the specified accessory in the database.
  public function update(Request $request, $id)
  {
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'comfort'=>'required',
        'other_feature'=>'required',
        'selling_point'=>'required',
        'safety_measure'=>'required',
        'window_type'=>'required',
        'other_information'=>'required',

    ]);
      $accessory = Accessory::find($id);
      $accessory->update($request->all());

      if($accessory){
        request()->session()->flash('success','Accessory Successfully Updated');
    }
    else{
        request()->session()->flash('error','Please try again!!');
    }
    return redirect()->route('accessories.index');
  }

  // Remove the specified accessory from the database.
  public function destroy($id)
  {
      $accessory = Accessory::find($id);
      $accessory->delete();
      return redirect()->route('accessories.index')->with('success', 'Accessory deleted successfully!');
  }
}
