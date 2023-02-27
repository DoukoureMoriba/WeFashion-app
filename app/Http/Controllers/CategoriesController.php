<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    /*
     * afficher la liste des produits
     */
    public function index() 
    {
        $categories = Category::all();
        return view('admin.dashboard_categories', compact('categories'));
    }

    /*
     * retourne le formulaire de creation de categorie
     */
    public function create() 
    {
        return view('admin.category_add');
    }

    /*
     * enregistrer la catégorie en base de donnée
     */
    public function store(Request $request) 
    {
        Category::create([
            'name' => $request->name, 
        ]);

        return redirect()->route('dashboard.categorie_list');
    }

    /*
     * retourne le formulaire d'edition de categorie
     */
    public function edit(Request $request) 
    {
        $categorie = Category::find($request->id);
        return view('admin.category_edit', compact('categorie'));

    }

    /*
     * Mettre à jour une categorie
     */
    public function update(Request $request) 
    {
        $categorie = Category::find($request->id);
        $categorie->update([
            'name' => $request->name
        ]);
        return redirect()->route('dashboard.categorie_list');

    }

    /*
     * Suprimmer une categorie
     */
    public function destroy(Request $request) 
    {
        $categorie = Category::find($request->id);
        $categorie->delete(); 
        return redirect()->back()->with('error', 'la catégorie '.$categorie->name.' ainsi que tous les produits associés ont été supprimé')->withInput();

    }

}
