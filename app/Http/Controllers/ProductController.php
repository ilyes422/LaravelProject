<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::All();
        return view('admin.index',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' ,
            'price',
            'categorie_id'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->categorie_id = $request->categorie_id;
        $product->save();
        return back()->with('message', "Le produit a bien été créée !");
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('admin.show',compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('admin.edit',compact('product'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name'  ,
            'description' ,
            'image' ,
            'price',
            'categorie_id'
        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->categorie_id = $request->categorie_id;
        $product->save();
        return back()->with('message', "Le produit a bien été créée !");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success','Le produit a bien été supprimer.');
    }


}
