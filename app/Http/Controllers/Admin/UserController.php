<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;
class UserController extends Controller
{
    public function index()
    {
        if(!auth()->user()->can('user.view')){
            abort(403, 'Unauthorized action.');
        } 

        $query=User::where('type','admin');
        
        if(request('q') !=''){
            $query->where('name','Like','%'.request('q').'%')
                ->orwhere('phone','Like','%'.request('q').'%')
                ->orwhere('email','Like','%'.request('q').'%');
        }
        $users=$query->latest()->get();
        
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('user.create')){
            abort(403, 'Unauthorized action.');
        } 

        $roles=Role::all();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('user.view')){
            abort(403, 'Unauthorized action.');
        } 

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user=User::create([
            'type' => 'admin',
            'address' => request()->address,
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'password' => Hash::make(request()->password),
        ]);

        if (!empty(request()->roles)) {
            $user->assignRole(request()->roles);
        }
        return redirect()->route('admin.users.index')->with('success','User is Created successfully!');
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
        if(!auth()->user()->can('user.update')){
                abort(403, 'Unauthorized action.');
        } 
        $roles=Role::all();
        $user=User::find($id);
        return view('admin.user.edit',compact('user','roles'));
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
        if(!auth()->user()->can('user.update')){
            abort(403, 'Unauthorized action.');
        } 

        $user=User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);

        $user->name=request()->name;
        $user->email=request()->email;
        $user->phone=request()->phone;
        if(request()->password){
           $user->password= Hash::make(request()->password);
        }

        $user->save();

        $user->roles()->detach();
        if (!empty(request()->roles)) {
            $user->assignRole(request()->roles);
        }
        return redirect()->route('admin.users.index')->with('success','User is Updated successfully!');
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
    
    
    public function customerList(){
         if(!auth()->user()->can('customer.view')){
            abort(403, 'Unauthorized action.');
        } 
        
        $query=User::where('type','user');
        
        if(request('q') !=''){
            $query->where('name','Like','%'.request('q').'%')
                ->orwhere('phone','Like','%'.request('q').'%')
                ->orwhere('email','Like','%'.request('q').'%');
        }

        if (request('button') =='excel') {
            $data['users']=$query->latest()->get();
            return Excel::download(new CustomerExport($data), 'customer_list.xls');
        }else{
            $users=$query->latest()->paginate(30);
        }


        return view('admin.user.customer', compact('users'));
    }
}
