@extends('layouts.admin.index')

@section('content')
<div class="container">
    <h1>Room Details</h1>
    <table class="table">
        <tr>
            <th>Room Name</th>
            <td>{{ $room->name }}</td>
        </tr>
        <tr>
            <th>Capacity</th>
            <td>{{ $room->capacity }}</td>
        </tr>
    </table>
    <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Back to Rooms</a>
</div>
@endsection
