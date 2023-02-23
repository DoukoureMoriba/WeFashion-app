<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        // Récupération de toute les tables liée aux produits
        'name',
        'description',
        'price',
        'image',
        'isActivated',
        'isSale',
        'reference',
        'category_id',
        
    ];
    // Récupération de toute les tailles liée aux produits
    public function sizes(){
        return $this->belongsToMany(Size::class, 'pivot', 'product_id', 'size_id');
    }

    // Récupération de toute les catégories liée aux produits
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

}
