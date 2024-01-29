<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{
    //

    public function index(){
        $users = User::all();
    //    dd($users);
        return view("dashboard",compact("users"));
    }



}
