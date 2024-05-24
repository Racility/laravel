@extends('Rent_Book.layout.mainlayout')

@section('title', 'Delete-Category')

@section('content')
   <h2>Are you sure to delete category {{ $category->name }} ?</h2>

   <div class="mt-5">
    <a href="/category-destroy/{{ $category->slug }}" class="btn btn-success me-5" style="width: 150px">Yes</a>
    <a href="/categories" class="btn btn-danger" style="width: 150px">Cancel</a>
   </div>
@endsection