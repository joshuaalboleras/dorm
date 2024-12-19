@extends('layouts.admin.index')

@section('content')
<div class="container">
    <h1>Manage Bookings</h1>
    <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary mb-3">Create Booking</a>
    <div class="card">
        <h5 class="card-header">Bookings List</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Room</th>
                        <th>User</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->room->room_name }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->start_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin.bookings.edit', $booking->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="card mb-6 mt-1">
        <h5 class="card-header">Pagination</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <small class="text-light fw-medium">Basic</small>
                    <div class="demo-inline-spacing">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                <li class="page-item {{ $bookings->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $bookings->previousPageUrl() }}">
                                        <i class="tf-icon bx bx-chevron-left bx-sm"></i>
                                    </a>
                                </li>

                                {{-- Loop through the pages --}}
                                @foreach($bookings->getUrlRange(max(1, $bookings->currentPage() - 2), min($bookings->lastPage(), $bookings->currentPage() + 2)) as $page => $url)
                                    <li class="page-item {{ $page == $bookings->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                <li class="page-item {{ $bookings->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $bookings->nextPageUrl() }}">
                                        <i class="tf-icon bx bx-chevron-right bx-sm"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
