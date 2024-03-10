<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class eventController extends Controller
{
    public function index()
    {
        $totalCategoryCount = Category::count();
        $userId = Auth::id();
        $eventCount = Event::where('organizer_id', $userId)->count();
        
        $events = Event::where('organizer_id', $userId)->withCount('reservation')->get();
    
        $reservationCount = 0;
        foreach ($events as $event) {
            $reservationCount += $event->reservations_count;
        }
    
        return view('organizer.home', [
            'events' => $events,
            'totalCategoryCount' => $totalCategoryCount,
            'eventCount' => $eventCount,
            'reservationCount' => $reservationCount
        ]);
    }

    public function create()
    {
        $organizerId = Auth::user()->id;
        $categories = Category::pluck('name', 'id'); 
        return view('organizer.createEvent', compact('organizerId', 'categories'));
    }

    public function store(Request $request){
        // dd($request);
        $data = $request->validate([
            'title' =>'required',
            'description' =>'required',
            'date' =>'required',
            'location' =>'required',
            'category_id' =>'required',
            'available_seats' =>'required',
            'organizer_id' =>'required',
        ]);

        $newEvent = Event::create($data);
        return redirect()->route('organizer.home');
    }

    public function edit(Event $event){
        // dd($event);
        $categories = Category::pluck('name', 'id');
        $organizerId = Auth::user()->id; 
        return view('organizer.editEvent', ['event'=>$event], compact('organizerId', 'categories'));
    }

    public function update(Event $event, Request $request){
    //    dd($request);
        $data = $request->validate([
            'title' =>'required',
            'description' =>'required',
            'date' =>'required',
            'location' =>'required',
            'category_id' =>'required',
            'available_seats' =>'required',
            'organizer_id' =>'required',
        ]);

        $event->update($data);
        return redirect(route('organizer.home'))->with('success','Event Updated Successfully');
    }

    public function destroy(Event $event){
        $event->delete();
        return redirect(route('organizer.home'))->with('success','Event Deleted Successfully');
    }
}
