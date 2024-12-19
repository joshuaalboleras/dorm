<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display a listing of users
    public function index()
    {
        $users = User::with('role')->paginate(10); // Get all users with their roles
        return view('admin.users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        $roles = Role::all(); // Get all roles
        return view('admin.users.create', compact('roles'));
    }

    // Store a newly created user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => bcrypt('password'), // You can adjust this to your needs
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    // Show the form for editing a user
    public function edit(User $user)
    {
        $roles = Role::all(); // Get all roles
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Update the specified user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        } catch (\Illuminate\Database\QueryException $exception) {
            // Check for foreign key constraint violation
            if ($exception->getCode() == '23000') {
                return redirect()->route('admin.users.index')->with('error', 'Cannot delete user: This user has associated records.');
            }
    
            // Re-throw the exception for other cases
            throw $exception;
        }
    }
    
}
