<?php


namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.home');
                break;
            case 'organizer':
                return redirect()->route('organizer.home');
                break;
            case 'client':
                return redirect()->route('client.home');
                break;
        }
        
        return view('dashboard');
    }
}



