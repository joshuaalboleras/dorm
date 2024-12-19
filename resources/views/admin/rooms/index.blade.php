@extends('layouts.admin.index')

@section('content')
<div class="container">
    <h1>Manage Rooms</h1>

    <!-- Success and Error Alerts -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary mb-3">Create Room</a>

    <div class="card">
        <h5 class="card-header">Rooms List</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Room Type</th>
                        <th>Capacity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($rooms as $room)
                        <tr>
                            <td>{{ $room->room_name }}</td>
                            <td>{{ $room->room_type }}</td>
                            <td>{{ $room->capacity }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.rooms.edit', $room->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this room?')">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
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
                                <li class="page-item {{ $rooms->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $rooms->previousPageUrl() }}">
                                        <i class="tf-icon bx bx-chevron-left bx-sm"></i>
                                    </a>
                                </li>

                                {{-- Loop through the pages --}}
                                @foreach($rooms->getUrlRange(max(1, $rooms->currentPage() - 2), min($rooms->lastPage(), $rooms->currentPage() + 2)) as $page => $url)
                                    <li class="page-item {{ $page == $rooms->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                <li class="page-item {{ $rooms->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $rooms->nextPageUrl() }}">
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
