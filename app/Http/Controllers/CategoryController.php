<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->withCategories($categories);
    }

    
    public function create()
    {
        return view('admin.categories.create');
    }

    
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->url = $request->url;
        $category->save();

        return redirect()->action('CategoryController@index')->with('success','Category Successfully Create');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->withCategory($category);
    }

    
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->url = $request->url;
        if($category->isClean()){
            return redirect()->back()->with('error','You need to specify any different value to update');
        }
        return redirect()->action('CategoryController@index')->with('success','Category Successfully Update');
    }

    
    public function destroy(Category $category)
    {
        
        $category->delete();
        return redirect()->action('CategoryController@index')->with('success','Category Successfully Delete');

    }
}
