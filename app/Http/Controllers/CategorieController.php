<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;

class CategorieController extends Controller
{
      public function show($id)
    {
        // Recherche de la catégorie par ID
        $categories = Categorie::find($id);
        // Récupérez les produits associés à cette catégorie
        $products = Product::where('categorie_id', $categories->id)->get();

        return view('categories.show', compact('categories', 'products'));
    }
}
