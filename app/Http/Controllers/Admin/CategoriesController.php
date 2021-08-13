<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Requests\CategoryFormRequest;

class CategoriesController extends Controller
{

    public function index(){
        $categories=Category::latest()->get();
        // $listGroups=Group::select('id','name')->get();
        // dd($listGroups);
        return Inertia::render('Admin/Category/CategoryIndex',compact('categories'));
    }

    // Cette méthode permet de sauvegarder les catégories
    public function store(CategoryFormRequest $request)
    {
        // dd($request->all());
        $category=Category::create($request->all());
        return $category;
    }

    public function update($id,Request $request)
    {
        // dd($request->all());
        $category=Category::findOrFail($id);
        $category->update($request->all());
        return $category;
    }

    // suppression d'un groupe
    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function destroy($id){

        $category = Category::findOrFail($id);
        // $category->delete();
        return $category;
    }

    public function filterGroups($category_id)
    {
        $data= Category::where('id', $category_id)->with(['groups'=>function($query){
            $query->select('id','name');
        }
        ])->get();
        return $data[0]['groups'];
    }

    public function relogout()
    {
        auth()->logout();
    }
}
