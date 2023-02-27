<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    /*
     * Présente la liste de tout les produits, le même processus que celui des produits du controller ProductsController
     */
    public function index() 
    {
        $categories = Category::all();
        return view('admin.dashboard_categories', compact('categories'));
    }

    /*
     * Renvoie les élements de creation de categorie
     */
    public function create() 
    {
        return view('admin.category_add');
    }

    /*
     * sauvegarde la catégorie dans la base de donnée
     */
    public function store(Request $request) 
    {
        Category::create([
            'name' => $request->name, 
        ]);

        return redirect()->route('dashboard.categorie_list');
    }

    /*
     * Renvoie les éléments de la modification de categorie
     */
    public function edit(Request $request) 
    {
        $categorie = Category::find($request->id);
        return view('admin.category_edit', compact('categorie'));

    }

    /*
     * mise a jour de catégorie en envoyant les nouvelle données
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
     * Destruction de  la categorie
     */
    public function destroy(Request $request) 
    {
        $categorie = Category::find($request->id);
        $categorie->delete(); 
        return redirect()->back()->with('error', 'la catégorie '.$categorie->name.' ainsi que tous les produits associés ont été supprimé')->withInput();

    }

}
