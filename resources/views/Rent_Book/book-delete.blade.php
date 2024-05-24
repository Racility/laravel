@extends('Rent_Book.layout.mainlayout')

@section('title', 'Delete-Book')

@section('content')
   <h2>Are you sure to delete book {{ $book->title }} ?</h2>

   <div class="mt-5">
    <a href="/book-destroy/{{ $book->slug }}" class="btn btn-success me-5" style="width: 150px">Yes</a>
    <a href="/books" class="btn btn-danger" style="width: 150px">Cancel</a>
   </div>
@endsection