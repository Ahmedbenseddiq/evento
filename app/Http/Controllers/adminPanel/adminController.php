<?php

namespace App\Http\Controllers\adminPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function users(){
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function restrictUser($id){
        $user = User::findOrFail($id);
        $user->update(['restricted' => !$user->restricted]);

        return redirect()->route('admin.users');
    }
    

}


