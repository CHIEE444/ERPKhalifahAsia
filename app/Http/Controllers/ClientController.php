<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny');
        $clients = Client::latest()->get();
        return response()->json([
            'success' => true,
            'data' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:clients,email',
            'phone' => 'required|string|max:100',
            'referral_code' => 'required|string|max:10|exists:users,referral_code',
            'city' => 'required|string|max:100',
            'package' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'date' => 'required|date',
            'room_type' => 'required|string|max:100',
            'note' => 'nullable|string|max:250',
            'status' => 'required|in:active,in_progress,completed,cancelled',
        ]);
        $client = Client::create($validated);
        return response()->json([
            'success' => true,
            'data' => $client
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $this->authorize('view', $client);
        $client->load('user');
        return response()->json([
            'success' => true,
            'data' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $this->authorize('update', $client);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $this->authorize('update', $client);
        $validated = $request->validate([
            'name' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|max:100|unique:clients,email,' . $client->id,
            'phone' => 'sometimes|string|max:100',
            'referral_code' => 'sometimes|string|max:10|exists:users,referral_code',
            'city' => 'sometimes|string|max:100',
            'package' => 'sometimes|string|max:100',
            'duration' => 'sometimes|string|max:100',
            'date' => 'sometimes|date',
            'room_type' => 'sometimes|string|max:100',
            'note' => 'nullable|string|max:250',
            'status' => 'sometimes|in:active,in_progress,completed,cancelled',
        ]);
    $client->update($validated);
        return response()->json([
            'success' => true,
            'data' => $client
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);
        $client->delete();
        return response()->json([
            'success' => true,
            'message' => 'Client deleted successfully'
        ]);
    }
}
