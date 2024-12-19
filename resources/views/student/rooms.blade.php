@extends('layouts.student.index')

@section('content')
    <h1>Your Booked Rooms</h1>
    @if($rooms->isEmpty())
        <p>You haven't booked any rooms yet.</p>
    @else
        <div class="row mb-12 g-6 flex-wrap">
            @foreach($rooms as $room)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="d-flex flex-wrap">
                            <div class="col-12 col-md-5">
                                <!-- Image (Optional: Add an image URL from $room or a placeholder) -->
                                <img class="card-img card-img-left" src="{{ $room->image_url ?? '../assets/img/elements/12.jpg' }}" alt="Room image">
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $room->room_name }}</h5>  <!-- Room name -->
                                    <p class="card-text">
                                        Type: {{ $room->room_type }} <br>  <!-- Room type -->
                                        Room Capacity: {{ $room->capacity }}  <!-- Room capacity -->
                                    </p>
                                    <p class="card-text"><small class="text-muted">Last updated {{ $room->updated_at->diffForHumans() }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
