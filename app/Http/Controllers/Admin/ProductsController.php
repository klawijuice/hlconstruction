<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Formats pour le refimensionnement d'image
     * @var \int[][]
     */
    private $formats = [
        [
            'width' => 80,
            'height' => 80
        ],
        [
            'width' => 372,
            'height' => 262,
            'ratio' => "height"
        ]
    ];
    /**
     * Cette méthode permet de rendre la vue, pour le listing des articles
     *
     * @return \Inertia\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $title = "Liste des produits enregistrés";
        //$this->authorize('viewAnyAdmin', Product::class);
        $posts = Product::usingLocale('fr')->get();
        $stats = [
            'all' => number_format($posts->count()),
            'online' => number_format(Product::online()->count()),
            'offline' => number_format(Product::offline()->count()),
            'drafts' => number_format(Product::drafts()->count()),
        ];
        return Inertia::render('Admin/Products/Index', compact('posts', 'stats', 'title'));
    }

    /**
     * Cette méthode permet de rendre la vue, pour le listing des articles
     *
     * @return \Inertia\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function online()
    {
        $title = "Liste des produits en ligne";
        //$this->authorize('viewAnyAdmin', Product::class);
        $posts = Product::online()->get();
        $stats = [
            'all' => number_format(Product::count()),
            'online' => number_format($posts->count()),
            'offline' => number_format(Product::offline()->count()),
            'drafts' => number_format(Product::drafts()->count()),
        ];
        return Inertia::render('Admin/Products/Index', compact('posts', 'stats', 'title'));
    }

    /**
     * Cette méthode permet de rendre la vue, pour le listing des articles
     *
     * @return \Inertia\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function offline()
    {
        $title = "Liste des produits hors ligne";
        $this->authorize('viewAnyAdmin', Product::class);
        $posts = Product::offline()->get();
        $stats = [
            'all' => number_format(Product::count()),
            'online' => number_format(Product::online()->count()),
            'offline' => number_format($posts->count()),
            'drafts' => number_format(Product::drafts()->count()),
        ];
        return Inertia::render('Admin/Products/Index', compact('posts', 'stats', 'title'));
    }

    /**
     * Cette méthode permet de rendre la vue, pour le listing des articles
     *
     * @return \Inertia\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function drafts()
    {
        $title = "Liste des produits brouillon";
        $this->authorize('viewAnyAdmin', Product::class);
        $posts = Product::drafts()->get();
        $stats = [
            'all' => number_format(Product::count()),
            'online' => number_format(Product::online()->count()),
            'offline' => number_format(Product::offline()->count()),
            'drafts' => number_format($posts->count()),
        ];
        return Inertia::render('Admin/Products/Index', compact('posts', 'stats', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category){
            $cats[] = $category->setLocale(app()->getLocale());
        }
        $categories = collect($cats);
        return Inertia::render('Admin/Products/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Post
     */
    public function store(ProductRequest $request)
    {
        //$this->authorize('create', Product::class);
        // $group = Group::select('id', 'name')->where(['name' => 'web'])->firstOrFail();
        $data = $this->getData($request);
        $data['user_id'] = auth()->user()->id;
        // dd($data);
        $post = Product::create($data);
        if($request->hasFile('poster')){
            $poster = $request->file('poster');
            $this->uploadGetSaveFile($poster, $post, 'products', [
                'formats' => $this->formats,
                //'fit' => "810x900"
            ]);
        }
        if($request->has('categories')){
            $categories = $this->getCategories($request->get('categories'));
            $post->categories()->sync($categories);
        }
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        $post = Product::with(['categories', 'poster'])
            ->where(['id' => $id])->firstOrFail();
        //$this->authorize('update', $post);
        $categories = Category::all();
        return Inertia::render('Admin/Products/Create', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ProductRequest $request, int $id)
    {
        $post = Product::where(['id' => $id])->firstOrFail();
        $this->authorize('update', $post);
        $data = $this->getData($request);
        $post->update($data);
        if($request->hasFile('poster')){
            $poster = $request->file('poster');
            $post->poster()->delete();
            $this->deleteDirectory('products/'.$post->id);
            $this->uploadGetSaveFile($poster, $post, 'products', [
                'formats' => $this->formats,
                //'fit' => "810x900"
            ]);
        }
        if($request->has('categories')){
            $categories = $this->getCategories($request->get('categories'));
            $post->categories()->sync($categories);
        }

        /**
         * $post->fresh();
         * Permet de rafraichir les données du model pour l'instance courante
         */
        //$post = $post->fresh();
        return $post;
    }

    /**
     * Supprimer un article
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $post = Product::with(['poster'])->where(['id' => $id])->firstOrFail();
        if ($this->deleteDirectory("products/".$post->id)){
            $post->poster()->delete();
        }
        $post->delete();
        return $post;
    }

    /**
     * Retourne les données du formulaire sous forme de tableau
     * @param ProductRequest $request
     * @return array
     */
    private function getData(ProductRequest $request)
    {
        $data = $request->except(['categories', 'poster', 'posterObject']);
        if (isset($data['name'])){
            $data['slug'] = Str::slug($data['name']);
        }
        if ($data['state'] === null || $data['state'] === "null"){
            $data['state'] = 0;
        }
        if ($data['confirmed'] === null || $data['confirmed'] === "null"){
            $data['confirmed'] = 0;
        }

        if ($data['commentable'] === null || $data['commentable'] === "null"){
            $data['commentable'] = 1;
        }
        return $data;
    }

    /**
     * Cette méthode permet de formater les catégories soumis dans le formulaire
     * @param array $categories
     * @return \Illuminate\Support\Collection
     */
    private function getCategories(array $categories){
        $categories = collect($categories);
        $categories = $categories->pluck('id');
        $categories = $categories->filter(function ($item){
            return $item !== null;
        });
        $categories = $categories->map(function ($item){
            return [
                'category_id' => $item,
                'created_at' => Carbon::now()
            ];
        });
        return $categories;
    }
}
