<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function index(){
        $user = User::all();
        return view('backend.dashboard',compact('user'));
    }
}
