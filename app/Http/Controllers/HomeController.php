<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    // Affichage des produits visible chez l'admin
    private function visibleProduct(){
        return Product::where('isActivated',1);
    }

    public function all(){
        //Renvoie le contenue de tout les produits('products')
        $products = $this->visibleProduct()->paginate(6);
        $categorie = Category::all();
        return view('home',compact(['products','categorie']));
    }

    public function isSale(){
        //Renvoie les produits en solde('isSale')
        $products = $this->visibleProduct()->where('isSale',1)->paginate(6);
        $categorie = Category::all();
        return view('home',compact(['products','categorie']));
    }

    public function sortByCategorie($id){
        //separation des produit par categorie
        $products = $this->visibleProduct()->where('category_id',$id)->paginate(6);
        $categorie = Category::all();
        return view('home',compact(['products','categorie']));
    }

    public function show($id){
        //Publie un produit
        $product = Product::find($id);
        $categorie = Category::all();
        return view('show',compact(['product','categorie']));
    }
}
