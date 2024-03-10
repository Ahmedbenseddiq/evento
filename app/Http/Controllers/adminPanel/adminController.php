<?php

namespace App\Http\Controllers\adminPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\category;
use App\Models\reservation;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $eventCount = Event::count();
        $reservationCount = Reservation::count();
        $userCount = User::count();
        $categoryCount = Category::count();
    
        return view('admin.home', compact('eventCount', 'reservationCount', 'userCount', 'categoryCount'));
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
    
    public function events(){
        $events = event::all();
        return view('admin.events', ['events' => $events]);
    }

    public function approveEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->update(['approved' => !$event->approved]);
    
        return redirect()->route('admin.events')->with('success', 'Event approval status toggled successfully');
    }
    

    

}


