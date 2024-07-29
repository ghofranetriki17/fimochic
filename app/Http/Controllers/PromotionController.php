<?php
namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Produit;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $produits = Produit::all();

        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }

    public function create()
    {
        $produits = Produit::all();
        return view('promotions.create', compact('produits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produits,id',
            'new_price' => 'required|numeric'
        ]);

        Promotion::create($request->all());

        return redirect()->route('promotions.index');
    }

    public function edit(Promotion $promotion)
    {
        $produits = Produit::all();
        return view('promotions.edit', compact('promotion', 'produits'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'product_id' => 'required|exists:produits,id',
            'new_price' => 'required|numeric'
        ]);

        $promotion->update($request->all());

        return redirect()->route('promotions.index');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotions.index');
    }
}

