<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $produits = Product::All();
        return view('produit.index',compact('produits'));
    }


}
