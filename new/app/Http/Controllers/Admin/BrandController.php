<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('brand.view')){
            abort(403, 'Unauthorized action.');
        } 
        $items=Brand::paginate(25);
        return view('admin.brand.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('brand.create')){
            abort(403, 'Unauthorized action.');
        } 
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('brand.create')){
            abort(403, 'Unauthorized action.');
        } 
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $file_name = time().$name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/brand');
            $image->move($destinationPath, $file_name);
            $validatedData['image'] = $file_name;

        }

        Brand::create($validatedData);
        return back()->with('success',' Brand Added');
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
    {
        if(!auth()->user()->can('brand.update')){
            abort(403, 'Unauthorized action.');
        } 
        $brand=Brand::find($id);

        $html= view('admin.brand.edit', compact('brand'))->render();
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
    {
        if(!auth()->user()->can('brand.update')){
            abort(403, 'Unauthorized action.');
        } 
        $brand=Brand::find($id);
        $brand->name=request('name');

        if($request->hasFile('image')) {
            
            $path="images/brand/";
            $this->UnlinkImage($path,$brand->image);
        
        
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $file_name = time().$name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/brand');
            $image->move($destinationPath, $file_name);
            $brand->image = $file_name;

        }

        $brand->save();
        return back()->with('success',' Brand Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('brand.delete')){
            abort(403, 'Unauthorized action.');
        } 
        $brand=Brand::find($id);
        
        $path="images/brand/";
        $this->UnlinkImage($path,$brand->image);
        
        
        $brand->delete();
        return back()->with('success',' Brand Deleted');

    }
}
