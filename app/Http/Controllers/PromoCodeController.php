<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function index()
    {
        $promoCodes = PromoCode::all();
        return view('promo_codes.index', compact('promoCodes'));
    }

    public function create()
    {
        return view('promo_codes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:promo_codes',
            'percentage' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        PromoCode::create($request->all());

        return redirect()->route('promo_codes.index');
    }

    public function edit(PromoCode $promoCode)
    {
        return view('promo_codes.edit', compact('promoCode'));
    }

    public function update(Request $request, PromoCode $promoCode)
    {
        $request->validate([
            'code' => 'required|unique:promo_codes,code,' . $promoCode->id,
            'percentage' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $promoCode->update($request->all());

        return redirect()->route('promo_codes.index');
    }

    public function destroy(PromoCode $promoCode)
    {
        $promoCode->delete();

        return redirect()->route('promo_codes.index');
    }

}
