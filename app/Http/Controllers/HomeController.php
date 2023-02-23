<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // ce controller contient les methode d'affichage des vue de l'interface client

    // méthode ne retournant que les produit visible sur l'interface admin
    private function visibleProduct(){
        return Product::where('isActivated',1);
    }

    public function all(){
        //retourne tous les produits
        $products = $this->visibleProduct()->paginate(6);
        $categorie = Category::all();
        return view('home',compact(['products','categorie']));
    }

    public function isSale(){
        //retourne tous les produits en solde
        $products = $this->visibleProduct()->where('isSale',1)->paginate(6);
        $categorie = Category::all();
        return view('home',compact(['products','categorie']));
    }

    public function sortByCategorie($id){
        //trie les produit par categorie
        $products = $this->visibleProduct()->where('category_id',$id)->paginate(6);
        $categorie = Category::all();
        return view('home',compact(['products','categorie']));
    }

    public function show($id){
        //affiche un produit
        $product = Product::find($id);
        $categorie = Category::all();
        return view('show',compact(['product','categorie']));
    }
}
