<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
class RoleController extends Controller
{
    public function index()
    {
        if(!auth()->user()->can('role.view')){
            abort(403, 'Unauthorized action.');
        }
        $roles=Role::all();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('role.view')){
            abort(403, 'Unauthorized action.');
        }
        $permissions=Permission::orderBy('name','asc')->get();
        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('role.view')){
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
                'name'=> 'required|unique:roles'
        ]);
        $role = Role::create(['name' => request()->name]);

        $per=request()->permission;

        if(!empty($per)){
            $role->syncPermissions($per);
        }
        return redirect()->route('admin.roles.index')->with('success','Permission is Assign successfully!');
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
        if(!auth()->user()->can('role.view')){
            abort(403, 'Unauthorized action.');
        }
        $role=Role::find($id);
        $permissions=Permission::orderBy('name','asc')->get();
        return view('admin.role.edit',compact('permissions','role'));
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
        if(!auth()->user()->can('role.view')){
            abort(403, 'Unauthorized action.');
        }
        $role = Role::findById($id);

        $per=request()->permission;

        if(!empty($per)){
            $role->syncPermissions($per);
        }
        return redirect()->route('admin.roles.index')->with('success','Permission is Assign successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
       
       Role::findOrFail($id)->delete();

       return back()->with('success', 'Role deleted success!');

    }

}
