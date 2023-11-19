<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Brand;
use App\Category;
class ProductController extends Controller
{
    public function index()
    {    if(!auth()->user()->can('product.view')){
            abort(403, 'Unauthorized action.');
        } 

        $query=Product::with('category','brand');

              $q=request('q');

              if (!empty($q)) {
                  $query->where('name','Like','%'.$q.'%');
              }
        $items=$query->paginate(25);
        return view('admin.products.index', compact('items'));
    }

    public function store(Request $request)
    {    if(!auth()->user()->can('product.create')){
            abort(403, 'Unauthorized action.');
        } 
      // dd(request()->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
            'tag' => '',
            'vedio_url' => '',
            'sell_price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
        ]);

        if (!empty(request('vedio_url'))) {
            $validatedData['vedio_url']= get_youtube_id_from_url(request('vedio_url'));
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $file_name = time().$name;
            $destinationPath = public_path('/images/product');
            $image->move($destinationPath, $file_name);

            $validatedData['image'] = $file_name;

        }

        
        $product=Product::create($validatedData);

        $images = $request->file('multi_images');
        $multi_image=[];

        if($images){
            foreach($images as $key => $image) {
              $name = $image->getClientOriginalName();
              $file_name = time().$name;
              $destinationPath = public_path('/images/product');
              $image->move($destinationPath, $file_name);

              $multi_image[] = [
                    'image'=>$file_name,
                    'product_id'=>$product->id
              ];
          }
        }
        

        if (!empty($multi_image)) {
            ProductImage::insert($multi_image);
        }

        
        return redirect()->route('admin.products.index')->with('success',' Product Added');
    }

    public function create()
    {    if(!auth()->user()->can('product.update')){
            abort(403, 'Unauthorized action.');
        } 
        $categories=Category::all();
        $brands=Brand::all();
        return view('admin.products.create' , compact('categories','brands'));
    }


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
    {    if(!auth()->user()->can('product.update')){
            abort(403, 'Unauthorized action.');
        } 
        $product=Product::find($id);
        $categories=Category::all();
        $brands=Brand::all();
        return  view('admin.products.edit', compact('product','brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    if(!auth()->user()->can('product.delete')){
            abort(403, 'Unauthorized action.');
        } 
        $product=Product::find($id);
         $url=$request->vedio_url;
        $validatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
            'tag' => '',
            'sell_price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
            'vedio_url'=> '',
        ]);

        if (($product->vedio_url != $url)  and (!empty($url)))
        {
            $validatedData['vedio_url']= get_youtube_id_from_url($url);
        }
    //   $validatedData['vedio_url']= get_youtube_id_from_url($url);

        if($request->hasFile('image')) {
            
            $path="images/product/";
            $this->UnlinkImage($path,$product->image);
        
        
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $file_name = time().$name;
            $destinationPath = public_path('/images/product');
            $image->move($destinationPath, $file_name);

            $validatedData['image'] = $file_name;

        }
        



        Product::where('id',$id)->update($validatedData);


        $images = $request->file('multi_images');
        $multi_image=[];

        if($images){
            foreach($images as $key => $image) {
              $name = $image->getClientOriginalName();
              $file_name = time().$name;
              $destinationPath = public_path('/images/product');
              $image->move($destinationPath, $file_name);

              $multi_image[] = [
                    'image'=>$file_name,
                    'product_id'=>$id
              ];
          }
        }
        

        if (!empty($multi_image)) {
            ProductImage::insert($multi_image);
        }

        return redirect()->route('admin.products.index')->with('success',' Product Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    if(!auth()->user()->can('product.delete')){
            abort(403, 'Unauthorized action.');
        } 
        $product=Product::find($id);
        
        $path="images/product/";
        $this->UnlinkImage($path,$product->image);
        
        
        $product->delete();
        return back()->with('success',' Product Deleted');

    }

   

}
