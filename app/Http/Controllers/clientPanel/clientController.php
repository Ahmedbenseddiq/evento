<?php

namespace App\Http\Controllers\clientPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index(){
        return view('client.home');
    }
}
