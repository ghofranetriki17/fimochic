<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Pour les clients
    public function index()
    {
        $faqs = Faq::all()->groupBy('type_de_question');
        $topFaqs = Faq::orderBy('likes_count', 'desc')->take(3)->get();
        return view('faq.index', compact('faqs', 'topFaqs'));
    }

    public function like(Faq $faq)
    {
        $faq->increment('likes_count');
        return back();
    }

    // Pour l'administration
    public function manage()
    {
        $faqs = Faq::all();
        return view('faq.manage', compact('faqs'));
    }

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'type_de_question' => 'required|string|max:255',
            'question' => 'required|string',
            'reponse' => 'required|string',
            'video' => 'nullable|file|mimes:mp4,avi,mkv|max:10000',
        ]);
    
        // Initialiser le nom du fichier vidéo à null
        $videoName = null;
    
        // Traitement du fichier vidéo
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoName = time() . '_video.' . $videoFile->getClientOriginalExtension();
            $destinationPath = public_path('img');
    
            // Débogage : vérifier que le dossier existe
            if (!file_exists($destinationPath)) {
                return back()->withErrors(['error' => 'Le dossier de destination n\'existe pas.']);
            }
    
            // Débogage : essayer de déplacer le fichier
            if ($videoFile->move($destinationPath, $videoName)) {
                // Optionnel : message de succès pour débogage
                session()->flash('success', 'Fichier vidéo stocké avec succès.');
            } else {
                return back()->withErrors(['error' => 'Échec du stockage du fichier vidéo.']);
            }
        }
    
        // Création de la nouvelle FAQ
        $faq = new Faq();
        $faq->type_de_question = $validated['type_de_question'];
        $faq->question = $validated['question'];
        $faq->reponse = $validated['reponse'];
    
        // Enregistrer le chemin vidéo si présent
        if ($videoName) {
            $faq->video_url = 'img/' . $videoName;
        }
    
        $faq->save();
    
        return redirect()->route('faq.create')->with('success', 'Question ajoutée avec succès !');
    }
    
    
    
    
    public function edit(Faq $faq)
    {
        return view('faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'type_de_question' => 'required|string|max:255',
            'question' => 'required|string',
            'reponse' => 'required|string',
            'video_url' => 'nullable|url',
        ]);

        $faq->update($request->all());
        return redirect()->route('faq.manage')->with('success', 'FAQ mise à jour avec succès.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq.manage')->with('success', 'FAQ supprimée avec succès.');
    }
}
