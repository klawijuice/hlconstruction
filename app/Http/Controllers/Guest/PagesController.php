<?php

namespace App\Http\Controllers\Guest;

use App\App;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Product;
use App\Mail\IndexMessageCreated;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PagesController extends Controller
{
    /**
     * Home page
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::with(['poster'])->latest()->limit(3)->online()->get();
        $posts = Post::with(['poster'])->latest()->limit(3)->online()->get();
        $faqs=Faq::orderBy('sort_order', 'DESC')->limit(10)->get();
        $products->map(function ($item){
          return !empty($item->name) || !is_null($item->name);
        });
        return view('guest.pages.index', compact('products', 'posts','faqs'));
    }

    /**
     * Méhtode pour la soumission du formulaire de contact
     * @param ContactRequest $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submit(ContactRequest $request)
    {
        $mailable = new IndexMessageCreated($request->get('full_name'), $request->get('subject'), $request->get('email'), $request->get('telephone'), $request->get('message'));
        Mail::to('info@fienibini.com')->send($mailable);
        return redirect(route("guest.pages.index") . '#mh-contact')->with('status', __('guest/contact.message sent'));
    }

    /**
     * Affichage de la page about
     * @return Application|Factory|View
     */
    public function about()
    {
        return view('guest.pages.about');
    }


}
