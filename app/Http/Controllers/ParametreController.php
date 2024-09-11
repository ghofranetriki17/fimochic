<?php
namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    public function index()
    {
        $parametres = Parametre::all();
        return view('parametres.index', compact('parametres'));
    }

    public function create()
    {
        return view('parametres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:parametres',
            'value' => 'required',
        ]);

        Parametre::create($request->all());

        return redirect()->route('parametres.index')->with('success', 'Paramètre créé avec succès');
    }

    public function edit(Parametre $parametre)
    {
        return view('parametres.edit', compact('parametre'));
    }

    public function update(Request $request, Parametre $parametre)
    {
        $request->validate([
            'key' => 'required|unique:parametres,key,' . $parametre->id,
            'value' => 'required',
        ]);

        $parametre->update($request->all());

        return redirect()->route('parametres.index')->with('success', 'Paramètre mis à jour avec succès');
    }

    public function destroy(Parametre $parametre)
    {
        $parametre->delete();

        return redirect()->route('parametres.index')->with('success', 'Paramètre supprimé avec succès');
    }
}

