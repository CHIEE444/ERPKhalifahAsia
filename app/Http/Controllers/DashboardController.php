<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(){

    $agents = User::where('role', 'user')->get();
        return view('dashboard.admin', compact('agents'),[
            'admin' => [
                'name' => 'Dashboard Admin',
                'id' => 'KHA-2023-0042',
                // 'avatar' => asset('images/admin.jpg'),
            ],
            'progress' => [
                'current' => Client::where('status', 'in_progress')->count(), 
                'total' => Client::whereNot('status', 'cancelled')->count()
                ],
            
        ]);
    }
}
