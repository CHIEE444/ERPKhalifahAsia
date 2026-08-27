<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        return view('admin.users.index');
    }

    public function show(int $id)
    {
        // Logic to show a specific user
        $this->authorize('view', $id);
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function delete(int $id)
    {
        // Logic to delete a specific user
        $this->authorize('delete', $id);
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function edit(int $id)
    {
        // Logic to show the edit form for a specific user
        $this->authorize('update', $id);
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        // Logic to update a specific user
        $this->authorize('update',$id);
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'province' => ['required', 'string', 'max:100'],
            'regency' => ['required', 'string', 'max:100'],
            'district' => ['required', 'string', 'max:100'],
            'village' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            // Add other fields as necessary
        ]);

        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function store(Request $request)
    {
        // Logic to create a new user
        $this->authorize('create');
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'province' => ['required', 'string', 'max:100'],
            'regency' => ['required', 'string', 'max:100'],
            'district' => ['required', 'string', 'max:100'],
            'village' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'referral_code' => ['required', 'string', 'max:10', 'unique:users'],
            'role' => ['required', 'string', 'max:20'],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']); // Hash the password

        User::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }
}
