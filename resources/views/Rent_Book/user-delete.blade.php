@extends('Rent_Book.layout.mainlayout')

@section('title', 'Delete User')

@section('content')
   <h2>Are you sure to delete user {{ $user->username }} ?</h2>

   <div class="mt-5">
    <a href="/user-destroy/{{ $user->slug }}" class="btn btn-success me-5" style="width: 150px">Yes</a>
    <a href="/users" class="btn btn-danger" style="width: 150px">Cancel</a>
   </div>
@endsection