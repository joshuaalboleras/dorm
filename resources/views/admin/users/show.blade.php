@extends('layouts.admin.index')

@section('content')
<div class="container">
    <h1>User Details</h1>
    <table class="table">
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Role</th>
            <td>{{ $user->role->name }}</td>
        </tr>
    </table>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users</a>
</div>
@endsection
