@extends('Rent_Book.layout.mainlayout')

@section('title', 'Category')

@section('content')
    <h1>Category List</h1>
    
    <div class="my-3 d-flex justify-content-end">
        <a href="category-add" class="btn btn-primary me-3">Add Category</a>
        <a href="category-deleted" class="btn btn-danger">Restore Data</a>
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
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $categories as $item )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="category-edit/{{ $item -> slug }}"><i class="bi bi-pencil-fill" style="font-size: 20px;"></i></a>
                        <a href="category-delete/{{ $item -> slug }}"><i class="bi bi-trash" style="font-size: 20px;"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection