<?php

namespace App\Http\Controllers\Guest;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class ProductsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        View::share('categories', Category::with(['product'])->get());
    }

    /**
     * Cette méthode retourne la page blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        $posts = Product::with(['poster'])->latest()->online()->paginate(10);
        return view('guest.pages.all-products');
    }

    /**
     * Cette méthode permet de lire un article en détails
     * @param int $id
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id, string $slug){
        $post = Product::with(['poster'])->online()->where(['id' => $id])->firstOrFail();
        return view('guest.products.show', compact('post'));
    }
}
