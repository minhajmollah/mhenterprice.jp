<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('backend.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('backend.countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries',
        ]);

        Country::create($request->all());

        return redirect()->route('countries.index')
            ->with('success', 'Country created successfully');
    }

    public function edit(Country $country)
    {
        return view('backend.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|unique:countries,name,' . $country->id,
        ]);

        $country->update($request->all());

        return redirect()->route('countries.index')
            ->with('success', 'Country updated successfully');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')
            ->with('success', 'Country deleted successfully');
    }
}
