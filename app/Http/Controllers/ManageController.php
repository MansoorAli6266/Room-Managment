<?php

namespace App\Http\Controllers;

use App\Models\Manage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{
    //

    public function index()
    {
        $users = User::all();
        $data=Manage::where("by_user",Auth::user()->name)->get();
        
        return view('dashboard', compact('data' , 'users'));
    
    }
    public function store(Request $request)
    {

        Manage::create([
            'user_id' => $request->input('user_id'),
            'by_user' => Auth::user()->name,
            'cost' => $request->input('cost'),
            'description' => $request->input('description'),
        ]);

        return redirect()->back();
    }

public function all(){

    $data=Manage::all();
    dd($data);
    return view('dashboard', compact('data'));

}

}
