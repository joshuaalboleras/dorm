@extends('layouts.admin.index')

@section('content')
<div class="container">
    <h1>Edit Room</h1>
    <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Room Name</label>
            <input type="text" name="room_name" id="name" class="form-control" value="{{ $room->room_name }}" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $room->capacity }}" required>
        </div>
        <div class="form-group">
            <label for="room_type">Room Type</label>
            <select name="room_type" id="room_type" class="form-control">
                <option @if ($room->room_type == 'luxury')
                    selected
                    @endif value="luxury">Luxury</option>
                <option @if ($room->room_type == 'high end')

                    selected
                    @endif value="high end">High End</option>
                <option @if ($room->room_type == 'basic')
                    selected

                    @endif value="basic">Basic</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection