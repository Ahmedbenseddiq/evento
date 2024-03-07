<?php

namespace App\Http\Controllers\organizerPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class organizerController extends Controller
{
    public function index(){
        return view('organizer.home');
    }
}
