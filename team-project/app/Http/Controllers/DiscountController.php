<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscountCode;

class DiscountController extends Controller
{
    public function index()
    {
        return view('discountpage');
    }

    public function create(Request $request)
    {
        if (auth()->user()->User_Type !== 'Admin') {
            abort(403, 'Unauthorized action.');
        }
    
        $request->validate([
            'code' => 'required|unique:discountcodes,code',
            'percentage' => 'required|numeric|min:0|max:100',
            'expiry_date' => 'nullable|date',
            'active' => 'boolean',
        ]);
    
        $discountCode = DiscountCode::where('code', $request->code)->first();
    
        if ($discountCode) {
            $discountCode->update([
                'percentage' => $request->percentage,
                'expiry_date' => $request->expiry_date,
                'status' => true, 
            ]);
        } else {
            DiscountCode::create([
                'code' => $request->code,
                'percentage' => $request->percentage,
                'expiry_date' => $request->expiry_date,
                'status' => true, 
            ]);
        }
    
        return redirect()->route('discountpage')->with('message', 'Discount code created successfully.');
    }
}
