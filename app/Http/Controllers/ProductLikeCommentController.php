<?php

namespace App\Http\Controllers;

use App\Models\ProductLikeComment;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductLikeCommentController extends Controller
{
    public function index()
    {
        $comments = ProductLikeComment::all();
        return view('product_like_comments.index', compact('comments'));
    }

    public function create()
    {
        return view('product_like_comments.create');
    }

  
    public function show(ProductLikeComment $productLikeComment)
    {
        return view('product_like_comments.show', compact('productLikeComment'));
    }
    public function getLikesCount($produit_id)
    {
        return ProductLikeComment::where('produit_id', $produit_id)
                                  ->where('like', true)
                                  ->count();
    }
    
    public function edit(ProductLikeComment $productLikeComment)
    {
        return view('product_like_comments.edit', compact('productLikeComment'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter un commentaire.');
        }
    
        $validated = $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'commentaire' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajout de la validation pour le fichier photo
        ]);
    
        $photoName = null;
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('img'), $photoName);
        }
    
        // Vérifiez si l'utilisateur a déjà commenté ce produit
        $existingComment = ProductLikeComment::where('produit_id', $validated['produit_id'])
                                             ->where('client_id', Auth::id())
                                             ->whereNotNull('commentaire')
                                             ->first();
    
        if ($existingComment) {
            return redirect()->back()->with('error', 'Vous avez déjà commenté ce produit.');
        }
    
        $comment = new ProductLikeComment([
            'produit_id' => $validated['produit_id'],
            'client_id' => Auth::id(),
            'commentaire' => $validated['commentaire'],
            'image' => $photoName,
        ]);
    
        $comment->save();
    
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }
    
    
    public function update(Request $request, ProductLikeComment $productLikeComment)
    {
        $validated = $request->validate([
            'commentaire' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $productLikeComment->update($validated);
    
        if ($request->hasFile('image')) {
            if ($productLikeComment->image) {
                \Storage::disk('public')->delete($productLikeComment->image);
            }
            $imagePath = $request->file('image')->store('comment_images', 'public');
            $productLikeComment->image = $imagePath;
        }
    
        $productLikeComment->save();
    
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }
    
    public function destroy(ProductLikeComment $productLikeComment)
    {
        if ($productLikeComment->image) {
            \Storage::disk('public')->delete($productLikeComment->image);
        }
        $productLikeComment->delete();

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }

    // Méthode pour liker ou disliker un produit
    public function like(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour liker un produit.');
        }

        $validated = $request->validate([
            'produit_id' => 'required|exists:produits,id',
        ]);

        $produit_id = $validated['produit_id'];
        $client_id = Auth::id();

        // Vérifiez si l'utilisateur a déjà liké ce produit
        $existingLike = ProductLikeComment::where('produit_id', $produit_id)
                                         ->where('client_id', $client_id)
                                         ->first();

        if ($existingLike) {
            // Si déjà liké, désaimez
            if ($existingLike->like) {
                $existingLike->delete();
            } else {
                $existingLike->like = true;
                $existingLike->save();
            }
        } else {
            // Sinon, aimez
            ProductLikeComment::create([
                'produit_id' => $produit_id,
                'client_id' => $client_id,
                'like' => true,
            ]);
        }

        return redirect()->back()->with('success', 'Action effectuée avec succès.');
    }
}
