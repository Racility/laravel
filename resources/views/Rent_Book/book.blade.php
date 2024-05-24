@extends('Rent_Book.layout.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>Book List</h1>

    <div class="my-3 d-flex justify-content-end">
        <a href="book-add" class="btn btn-primary me-3">Add Data</a>
        <a href="book-deleted" class="btn btn-danger">Restore Data</a>
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
                    <th>Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @foreach ($item->categories as $category)
                                {{ $category->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/book-edit/{{ $item->slug }}"><i class="bi bi-pencil-fill" style="font-size: 20px;"></i></a>
                            <a href="/book-delete/{{ $item->slug }}"><i class="bi bi-trash" style="font-size: 20px;"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection