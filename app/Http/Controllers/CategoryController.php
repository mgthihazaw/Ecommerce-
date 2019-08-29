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
        //Get parent_id of Category is zero
        $levels = Category::ofParent('0')->get();
        // dd($levels);
        return view('admin.categories.create')->withLevels($levels);
    }

    
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->url = $request->url;
        if($request->status){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        
        $category->save();

        return redirect()->action('CategoryController@index')->with('success','Category Successfully Create');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Category $category)
    {
        $levels = Category::ofParent('0')->where('id', '!=', $category->id)->get();
        return view('admin.categories.edit')->withCategory($category)->withLevels($levels);
    }

    
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->url = $request->url;
        $category->parent_id = $request->parent_id;
        if($request->status){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        if($category->isClean()){
            return redirect()->back()->with('error','You need to specify any different value to update');
        }
        $category->save();
        return redirect()->action('CategoryController@index')->with('success','Category Successfully Update');
    }

    
    public function destroy(Category $category)
    {
        
        $category->delete();
        return redirect()->action('CategoryController@index')->with('success','Category Successfully Delete');

    }
    
}
