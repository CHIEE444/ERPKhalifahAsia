<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $agents = User::where('role', 'user')->get();
        return view('agent.index', compact('agents'), [
            'progress' => [
                'current' => Client::where('status', 'in_progress')->count(),
                'total' => Client::whereNot('status', 'cancelled')->count()
            ],

        ]);
    }

    public function getUsersReferralCodes()
    {
        $users = User::where('role', 'user')->get(['referral_code', 'phone']);
        return response()->json($users);
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('admin.create');
    }

    public function show(int $id)
    {
        // Logic to show a specific user
        $this->authorize('view', $id);
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        // Logic to delete a specific user
        $this->authorize('delete', $user);
        try{
            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Failed to delete user.' . $e->getMessage());
        }
    }

    public function edit()
    {
        $user = auth()->user();
        return view('setting.index', compact('user'));
    }

    public function update(Request $request)
    {
        // Logic to update a specific user
        $user = auth()->user();

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

        try{

            $user->update($validatedData);

            return redirect()->back()->with('success', 'User updated successfully.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage())->withInput();
        }
    }

    public function store(Request $request)
    {
        // Logic to create a new user
        $this->authorize('create', User::class);
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
            'referral_code' => ['required', 'string', 'size:10', 'unique:users'],
        ]);
        try{
            

            $validatedData['password'] = bcrypt($validatedData['password']); // Hash the password
            $validatedData['role'] = 'admin'; // Set the role to admin
            User::create($validatedData);

            return redirect()->route('dashboard.admin')->with('success', 'User created successfully.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage())->withInput();
        }
    }
}
