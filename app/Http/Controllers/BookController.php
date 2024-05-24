<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('Rent_Book.book',['books' => $books]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('Rent_Book.book-add', ['categories' =>$categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:100',
            'title' => 'required|max:255'
        ]);

        $newName = '';
        if($request->file('image')){
            $extension  = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Books Added Successfully');
    }

    public function edit($slug){
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('Rent_Book.book-edit', ['categories' =>$categories, 'book' => $book]);
    }

    public function update(Request $request, $slug){
        
        if($request->file('image')){
            $extension  = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());
        
        if($request->categories){
            $book->categories()->sync($request->categories);
        }
        return redirect('books')->with('status', 'Books Update Successfully');
    }

    public function delete($slug){
        $book = Book::where('slug', $slug)->first();
        return view('Rent_Book.book-delete', ['book' =>$book]);
    }

    public function destroy($slug){
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book Deleted Successfully');

    }

    public function deletedBook(){
        $deletedBooks = Book::onlyTrashed()->get();
        return view('Rent_Book.book-delete-list', ['deletedBooks' => $deletedBooks]);
    }

    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Book Restored Successfully');
    }
}
