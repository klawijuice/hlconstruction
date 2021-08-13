<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Cette méthode retourne la page blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::with(['poster'])->latest()->online()->paginate(10);
        return view('guest.posts.index', compact('posts'));
    }

    /**
     * Cette méthode permet de lire un article en détails
     * @param int $id
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id, string $slug){
        $post = Post::with(['poster'])->online()->where(['id' => $id])->firstOrFail();
        return view('guest.posts.show', compact('post'));
    }
}
