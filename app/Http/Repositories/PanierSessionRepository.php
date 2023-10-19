<?php

namespace App\Http\Repositories;
use App\Models\Product;

class PanierSessionRepository implements PanierInterfaceRepository  {

    # Afficher le panier
    public function show () {
        return view("panier.show");
    }

    # Ajouter/Mettre à jour un produit du panier
    public function add (Product $product, $quantity) {
        $panier = session()->get("panier"); // On récupère le panier en session

        // Les informations du produit à ajouter
        $product_details = [
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'quantity' => $quantity
        ];

        $panier[$product->id] = $product_details; // On ajoute ou on met à jour le produit au panier
        session()->put("panier", $panier); // On enregistre le panier
    }

    # Retirer un produit du panier
    public function remove (Product $product) {
        $panier = session()->get("panier"); // On récupère le panier en session
        unset($panier[$product->id]); // On supprime le produit du tableau $basket
        session()->put("panier", $panier); // On enregistre le panier
    }

    # Vider le panier
    public function empty () {
        session()->forget("panier"); // On supprime le panier en session
    }

}


