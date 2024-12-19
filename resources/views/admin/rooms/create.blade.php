@extends('layouts.admin.index')

@section('content')
<div class="container">
    <h1>Create Room</h1>
    <form action="{{ route('admin.rooms.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="room_name">Room Name</label>
            <input type="text" name="room_name" id="room_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" id="capacity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="room_type">Room Type</label>
            <select name="room_type" id="room_type" class="form-control">
                <option value="luxury">Luxury</option>
                <option value="high end">High End</option>
                <option value="basic">Basic</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
