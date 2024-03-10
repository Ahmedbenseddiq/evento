<?php

namespace App\Http\Controllers\clientPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;
use App\Models\reservation;


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

    public function createReservation(Request $request){

        $eventId = $request->route('id');
        $userId = auth()->id();
        
        return view('client.createReservation', ['eventId' => $eventId, 'userId' => $userId]);
    }


    public function storeReservation(Request $request){
    
    $data = $request->validate([
        'client_id' => 'required|numeric',
        'event_id' => 'required|numeric',
    ]);

    $newReservation = Reservation::create($data);
    return redirect(route('client.home'));
}


       
    
    
}
