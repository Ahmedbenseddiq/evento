<?php

namespace App\Http\Controllers\clientPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;

class clientController extends Controller
{
    public function index(){
        $events = Event::where('approved', true)->get();
        return view('client.home', ['events'=>$events]);
    }


    public function single($id){
        $event = Event::find($id);
        return view('client.single', ['event' => $event]);
    }
}
