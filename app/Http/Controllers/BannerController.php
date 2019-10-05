<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index')->withBanners($banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
        
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $imageName = time() . '.' . $extension;

                $image_path = 'images/backend/banners/' . $imageName;
                

               
                Image::make($image_tmp)->save(public_path($image_path));

                
                Banner::create([
                    'image' => $imageName,
                    'title' => $request->title,
                    'link' => $request->link,
                    'status' => $request->status ? 1 : 0,
                ]);

                return redirect()->action('BannerController@index')->with('success', 'Successfully Created');
            }

        }
        return redirect()->action('BannerController@index')->with('error', 'Image is invalid');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit')->withBanner($banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        if ($request->hasFile('image')) {
        
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                if(file_exists(public_path('images/backend/banners/'.$banner->image))){
                    unlink(public_path('images/backend/banners/'.$banner->image));
                }

                $extension = $image_tmp->getClientOriginalExtension();
                $imageName = time() . '.' . $extension;

                $image_path = 'images/backend/banners/' . $imageName;
                

               
                Image::make($image_tmp)->save(public_path($image_path));

                
                $banner->update([
                    'image' => $imageName,
                    'title' => $request->title,
                    'link' => $request->link,
                    'status' => $request->status ? 1 : 0,
                ]);

                return redirect()->action('BannerController@index')->with('success', 'Successfully Updated');
            }

        }
        return redirect()->action('BannerController@index')->with('error', 'Image is invalid');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if(file_exists(public_path('images/backend/banners/'.$banner->image))){
            unlink(public_path('images/backend/banners//'.$banner->image));
        }
        $banner->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }
}
