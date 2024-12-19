<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display a listing of rooms
    public function index()
    {
        $rooms = Room::paginate(10); // Get all rooms
        return view('admin.rooms.index', compact('rooms'));
    }

    // Show the form for creating a new room
    public function create()
    {
        return view('admin.rooms.create');
    }

    // Store a newly created room
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'room_name' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'capacity' => 'required|integer',
        ]);

        // Use the validated data to create the new room
        Room::create([
            'room_name' => $request->input('room_name'), // 'room_name' field
            'room_type' => $request->input('room_type'), // 'room_type' field
            'capacity'  => $request->input('capacity'),  // 'capacity' field
        ]);

        // Redirect to the rooms index page with a success message
        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
    }



    // Show the form for editing a room
    public function edit(Room $room)
    {
        return view('admin.rooms.edit', ['room' => $room]);
    }

    // Update the specified room
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'room_type' => 'required|string|max:255',
        ]);

        $room->update($request->all());

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully.');
    }

    // Remove the specified room
    public function destroy(Room $room)
    {
        try {
            $room->delete();
            return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
        } catch (\Illuminate\Database\QueryException $exception) {
            // Check for foreign key constraint violation
            if ($exception->getCode() == '23000') {
                return redirect()->route('admin.rooms.index')->with('error', 'Cannot delete room: This room has associated records.');
            }

            // Re-throw the exception for other cases
            throw $exception;
        }
    }
}
