@extends('Rent_Book.layout.mainlayout')

@section('title', 'Users')

@section('content')
<h1>User List</h1>

<div class="my-3 d-flex justify-content-end">
    <a href="/registered-users" class="btn btn-primary me-3">New Registeres User</a>
    <a href="/user-banned" class="btn btn-danger">View Banned User</a>
</div>

<div class="mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>        
    @endif
</div>

<div class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                        @if ($item->phone)
                            {{ $item->phone }}
                            @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/user-detail/{{ $item->slug }}">Detail</a>
                        <a href="/user-ban/{{ $item->slug }}">Banned</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection