<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display a listing of bookings
    public function index()
    {
        $bookings = Booking::with(['room', 'user'])->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    // Show the form for creating a new booking
    public function create()
    {
        $rooms = Room::all();
        $users = User::all();
        return view('admin.bookings.create', compact('rooms', 'users'));
    }

    // Store a newly created booking
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Check if the room is fully occupied
        $room = Room::findOrFail($request->input('room_id'));
        $currentOccupants = Booking::where('room_id', $room->id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->input('start_date'), $request->input('end_date')])
                    ->orWhereBetween('end_date', [$request->input('start_date'), $request->input('end_date')]);
            })->count();

        if ($currentOccupants >= $room->capacity) {
            return redirect()->back()->withErrors(['room_id' => 'The selected room is fully occupied during the chosen dates.']);
        }

        Booking::create($request->only(['room_id', 'user_id', 'start_date', 'end_date']));

        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully.');
    }

    // Show the form for editing a booking
    public function edit(Booking $booking)
    {
        $rooms = Room::all();
        $users = User::all();
        return view('admin.bookings.edit', compact('booking', 'rooms', 'users'));
    }

    // Update the specified booking
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Check if the room is fully occupied for the updated dates
        $room = Room::findOrFail($request->input('room_id'));
        $currentOccupants = Booking::where('room_id', $room->id)
            ->where('id', '!=', $booking->id) // Exclude the current booking
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->input('start_date'), $request->input('end_date')])
                    ->orWhereBetween('end_date', [$request->input('start_date'), $request->input('end_date')]);
            })->count();

        if ($currentOccupants >= $room->capacity) {
            return redirect()->back()->withErrors(['room_id' => 'The selected room is fully occupied during the chosen dates.']);
        }

        $booking->update($request->only(['room_id', 'user_id', 'start_date', 'end_date']));

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }

    // Remove the specified booking
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
