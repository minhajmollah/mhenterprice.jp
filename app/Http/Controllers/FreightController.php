<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Freight;
use App\Models\Country;

class FreightController extends Controller
{
    public function index()
    {
        $freights = Freight::with('country')->get();
        return view('backend.freights.index', compact('freights'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('backend.freights.create', compact('countries'));
    }

    public function store(Request $request)
    {  

        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'port' => 'required',
            'volume_range' => 'required',
            'continent' => 'required',
            'container_rate' => 'required|array',
            'frequency' => 'required|array',
            'ship_time' => 'required|array',
        ]);
     
        Freight::create($request->all());

        return redirect()->route('freights.index')
            ->with('success', 'Freight created successfully');
    }

    public function edit(Freight $freight)
    {
        $countries = Country::all();
        return view('backend.freights.edit', compact('freight', 'countries'));
    }

    public function update(Request $request, Freight $freight)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'port' => 'required',
            'volume_range' => 'required',
            'continent' => 'required',
            'container_rate' => 'required|array',
            'frequency' => 'required|array',
            'ship_time' => 'required|array',
        ]);

        $freight->update($request->all());

        return redirect()->route('freights.index')
            ->with('success', 'Freight updated successfully');
    }

    public function destroy(Freight $freight)
    {
        $freight->delete();

        return redirect()->route('freights.index')
            ->with('success', 'Freight deleted successfully');
    }
}
