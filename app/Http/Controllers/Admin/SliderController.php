<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Slider;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {    if(!auth()->user()->can('slider.view')){
            abort(403, 'Unauthorized action.');
        } 
        $items=Slider::paginate(25);
        return view('admin.slider.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    if(!auth()->user()->can('slider.create')){
            abort(403, 'Unauthorized action.');
        } 
        $request->validate([
            'image' => 'required',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $file_name = time().$name;
            $destinationPath = public_path('/images/slider');
            $image->move($destinationPath, $file_name);
            $validatedData['image'] = $file_name;

        }

        Slider::create($validatedData);
        return back()->with('success',' Slider Added');
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
    public function edit($id)
    {    if(!auth()->user()->can('slider.update')){
            abort(403, 'Unauthorized action.');
        } 
        $brand=Slider::find($id);

        $html= view('admin.slider.edit', compact('brand'))->render();
        return response()->json(['status'=>1,'html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    if(!auth()->user()->can('slider.update')){
            abort(403, 'Unauthorized action.');
        } 
        $brand=Slider::find($id);

        if($request->hasFile('image')) {

            // delete old image
            $path="images/slider/";
            $this->UnlinkImage($path,$brand->image);
            // delete old image

            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $file_name = time().$name;
            $destinationPath = public_path('/images/slider');
            $image->move($destinationPath, $file_name);
            $brand->image = $file_name;

        }

        $brand->save();
        return back()->with('success',' Slider Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    if(!auth()->user()->can('slider.delete')){
            abort(403, 'Unauthorized action.');
        } 
        $slider=Slider::find($id);

        $path="images/slider/";
        $this->UnlinkImage($path,$slider->image);


        $slider->delete();
        return back()->with('success',' Slider Deleted');

    }

}
