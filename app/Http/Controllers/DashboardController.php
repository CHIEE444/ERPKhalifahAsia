<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {

        $admin = auth()->user();
        // dd($admin);
        $agents = User::where('role', 'user')->get();
        return view('dashboard.admin', compact('agents', 'admin'), [
            'progress' => [
                'current' => Client::where('status', 'in_progress')->count(),
                'total' => Client::whereNot('status', 'cancelled')->count()
            ],

        ]);
    }

    public function index()
    {
        $user = auth()->user();

        $clients = Client::where('referral_code', $user->referral_code)->get();
        $leads = Lead::where('referral_code', $user->referral_code)->count();

        $successfulClients = $clients->where('status', '!=', 'cancelled')->count();

        $total = $successfulClients + $leads;

        $stats = [
            'total' => $clients->count(),
            'aktif' => $clients->where('status', 'in_progress')->count(),
            'rate' => $total > 0
                ? ($successfulClients / $total) * 100
                : 0,
        ];

        return view('dashboard.index', compact('user', 'clients', 'stats'));
    }
}
