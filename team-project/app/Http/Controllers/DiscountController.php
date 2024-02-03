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
    if(auth()->user()->User_Type !== 'Admin') {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'code' => 'required|unique:discountcodes,code',
        'percentage' => 'required|numeric',
        'expiry_date' => 'nullable|date',
        'active' => 'boolean',
    ]);

    // Try to find an existing DiscountCode
    $discountCode = DiscountCode::where('code', $request->code)->first();

    if ($discountCode) {
        // If found, update the existing record
        $discountCode->update([
            'percentage' => $request->percentage,
            'expiry_date' => $request->expiry_date,
            'active' => true,
        ]);
    } else {
        // If not found, create a new DiscountCode
        DiscountCode::create([
            'code' => $request->code,
            'percentage' => $request->percentage,
            'expiry_date' => $request->expiry_date,
            'active' => true,
        ]);
    }

    return redirect()->route('discountpage');
}
}
