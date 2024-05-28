<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Settings;
use App\Mail\InquirySubmitted;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([


            'name' => 'required|string',
            'email' => 'required|email',
            'country'=>'required',
            'telephone' => 'required',
            'stock_number'=>'sometimes|required',
            'port'=>'sometimes|required',

            'message' => 'sometimes|required|string',



        ]);

        // Create a new inquiry
        $inquiry = Inquiry::create($request->all());
        $settings=Settings::first();
        Mail::to($settings->email)->send(new InquirySubmitted($inquiry));
        // You can send an email notification to the admin here if needed
        session()->flash('message', 'Inquiry Submitted Successfully');
        return redirect()->back();
    }
}