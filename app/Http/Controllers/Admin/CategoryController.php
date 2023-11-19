<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    
    public function index()
    {
         if(!auth()->user()->can('category.view')){
            abort(403, 'Unauthorized action.');
        } 
        $query=Category::orderBy('categories.name')
                ->leftjoin('categories as parent','parent.id','categories.parent_id')
                ->select('parent.name as parent_category','categories.*');
            $q=request('q');
            if (!empty($q)) {
                $query->where('categories.name','Like','%'.$q.'%');
            }
        $items=$query->paginate(20);
        
     
        
        $categories=Category::whereNull('parent_id')->get();
        return view('admin.categories.index', compact('items','categories'));
    }

    public function store(Request $request)
    {
         if(!auth()->user()->can('category.create')){
            abort(403, 'Unauthorized action.');
        } 
        $validatedData = $request->validate([
            'name' => 'required',
            'parent_id' => '',
        ]);

        Category::create($validatedData);
        return back()->with('success',' Category Added');
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
         if(!auth()->user()->can('category.update')){
            abort(403, 'Unauthorized action.');
        } 
        $category=Category::find($id);
        
        $categories=Category::whereNull('parent_id')->get();
        $html= view('admin.categories.edit', compact('category','categories'))->render();
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
         if(!auth()->user()->can('category.update')){
            abort(403, 'Unauthorized action.');
        } 
        $category=Category::find($id);
        $category->name=request('name');
        $category->parent_id=request('parent_id');
        $category->save();
        return back()->with('success',' Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(!auth()->user()->can('category.delete')){
            abort(403, 'Unauthorized action.');
        } 
        $brand=Category::find($id);
        $brand->delete();
        return back()->with('success',' Category Deleted');

    }

}
