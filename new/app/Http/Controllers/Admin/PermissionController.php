<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        if(!auth()->user()->can('permission.index')){
            abort(403, 'Unauthorized action.');
        }
       $rows=Permission::orderBy('name','asc')->get();
       return view('admin.permission.index',compact('rows'));
    }

 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if(!auth()->user()->can('permission.create')){
            abort(403, 'Unauthorized action.');
        }
       return view('admin.permission.create');
    }

  /**
     * Store a newly created resource in storage.
  *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if(!auth()->user()->can('permission.create')){
            abort(403, 'Unauthorized action.');
        }
       	$request->validate([
             'name'=> 'required|unique:permissions,name'
     	]);
        Permission::create(['name' => request()->name]);
     return redirect()->route('admin.permissions.index')->with('success','Permission is Craete successfully!');
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
    public function edit($id){
        if(!auth()->user()->can('permission.update')){
            abort(403, 'Unauthorized action.');
        }
       $permissions=Permission::find($id);
     return view('admin.permission.edit',compact('permissions'));
    }

 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
     
    if(!auth()->user()->can('permission.update')){
            abort(403, 'Unauthorized action.');
    }

    $request->validate([
             'name'=> 'required|unique:permissions,name,'.$id
     ]);
    $permission=Permission::find($id);
    $permission->name=request()->name;
    $permission->save();

    return redirect()->route('admin.permissions.index')->with('success','Permission is Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
