@extends('layouts.admin.index')

@section('content')
<div class="container">
    <h1>Edit Booking</h1>
    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="room_id">Room</label>
            <select name="room_id" id="room_id" class="form-control" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" @if($room->id == $booking->room_id) selected @endif>{{ $room->room_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($user->id == $booking->user_id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Time</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $booking->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Time</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $booking->end_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
