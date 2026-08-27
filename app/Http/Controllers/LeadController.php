<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Lead::class);
        $leads = Lead::latest()->paginate(15);
        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Lead::class);
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Lead::class);
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'max:100', 'unique:leads,email'],
            'phone'         => ['required', 'string', 'max:20'],
            'city'          => ['required', 'string', 'max:100'],
            'package'       => ['required', 'string', 'max:100'],
            'duration'      => ['required', 'string', 'max:100'],
            'date'          => ['required', 'date'],
            'room_type'     => ['required', 'string', 'max:100'],
            'notes'         => ['nullable', 'string', 'max:255'],
            'status'        => ['nullable', 'in:new,contacted,confirmed,cancelled'],
            'referral_code' => ['nullable', 'string', 'exists:users,referral_code'],
        ]);

        $validated['status'] = $validated['status'] ?? 'new';

        Lead::create($validated);

        return redirect()->route('leads.index')->with('success', 'Lead berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        $this->authorize('view', $lead);
        return view('leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        $this->authorize('update', $lead);
        return view('leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $this->authorize('update', $lead);
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'max:100', 'unique:leads,email,' . $lead->id],
            'phone'         => ['required', 'string', 'max:20'],
            'city'          => ['required', 'string', 'max:100'],
            'package'       => ['required', 'string', 'max:100'],
            'duration'      => ['required', 'string', 'max:100'],
            'date'          => ['required', 'date'],
            'room_type'     => ['required', 'string', 'max:100'],
            'notes'         => ['nullable', 'string', 'max:255'],
            'status'        => ['required', 'in:new,contacted,confirmed,cancelled'],
            'referral_code' => ['nullable', 'string', 'exists:users,referral_code'],
        ]);

        $lead->update($validated);

        return redirect()->route('leads.index')->with('success', 'Lead berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $this->authorize('delete', $lead);
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead berhasil dihapus.');
    }
}
