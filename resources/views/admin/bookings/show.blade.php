@extends('layouts.admin.index')

@section('content')
<div class="container">
    <h1>Booking Details</h1>
    <table class="table">
        <tr>
            <th>Room</th>
            <td>{{ $booking->room->name }}</td>
        </tr>
        <tr>
            <th>User</th>
            <td>{{ $booking->user->name }}</td>
        </tr>
        <tr>
            <th>Start Time</th>
            <td>{{ $booking->start_time }}</td>
        </tr>
        <tr>
            <th>End Time</th>
            <td>{{ $booking->end_time }}</td>
        </tr>
    </table>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Back to Bookings</a>
</div>
@endsection
