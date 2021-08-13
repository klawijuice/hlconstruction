<?php


namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Inertia\Inertia;


class PagesController
{
    /**
     * Cette méthode retourne la vue du tableau de bord du client
     */
    public function index(){
        $stats = [
            'all' => number_format(Product::count()),
            'online' => number_format(Product::online()->count()),
            'offline' => number_format(Product::offline()->count()),
            'categories' => number_format(Category::count()),
        ];
        $posts=Product::latest()->get();
        return Inertia::render('Admin/Dashboard',compact('stats', 'posts'));
    }
}
