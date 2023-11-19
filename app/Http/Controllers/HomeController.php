<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
class HomeController extends Controller
{

    public function emailStore(Request $request){

        $data=$request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:newsletters'],
        ]);

        Newsletter::create($data);
        return back()->with('success','Email Inserted Successfulyy !');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
