<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        $genres = Genre::all();
        return view('books.index', compact('books', 'genres'));
    }

    public function show(Book $book){
        return view('books.show', compact(var_name: 'book'));

    }

    public function create()
    {
        if (Auth::guest()){
            return redirect('/login');
        }

        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    //database tabel -> migration
    //model
    //meesturen aan de view
    //<select>

    public function store(Request $request)
    {
        //Validatie
        $request->validate([
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'description' => 'required',
            'pages' => 'required',
            'genre_id' => 'required'

        ]);
        //errors tonen
        //beveiliging
        //data terugschrijven in de form fields
        //INSERT INTO sql
        $book = new Book();
        $book ->title = $request->input('title');
        $book ->author = $request->input('author');
        $book ->description = $request->input('description');
        $book -> pages = $request->input('pages');
        $book ->genre_id = $request->input('genre_id');
        $book ->user_id = Auth::id();

        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
//       \Gate::define('edit-book', function (User $user, Book $book){
//           return $book->user()->is($user);
//       });

//        if (Auth::guest()){
//            return redirect('/login');
//        }
        \Gate::authorize('edit-book', $book);

        $genres = Genre::all();
        return view('books.update', compact('book', 'genres'));
    }

    public function update (Book $book){

        request()->validate([
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'description' => 'required',
            'pages' => 'required',
            'genre_id' => 'required'
            ]);

        $book->update([
            'title' => request('title'),
            'author' => request('author'),
            'description' => request('description'),
            'pages' => request('pages'),
            'genre_id' => request('genre_id'),
        ]);

        return redirect()->route('books.index');

    }

    public function search(Request $request){
        $genres = Genre::all();

        $search = $request->search;

        $books = Book::where('title', 'LIKE', '%'.$search. '%')->get();

        return view('books.index', compact('books', 'genres'));

    }

    public function filter(Request $request){
        $genres = Genre::all();

        $filter = Book::query()->with('genre');

        if ($request->filled('genre_id')){
            $filter->where('genre_id', $request->genre_id);
        }
        $books = $filter->get();

        return view('books.index', compact('books', 'genres'));
    }

    public function admin()
    {

        if (Auth::guest() || Auth::user()->role !== 1){
            return redirect('/login');
        }

        $books = Book::all();
        $genres = Genre::all();
        $users = User::all();
        return view('books.admin', compact('books', 'genres', 'users'));
    }

    public function status(Book $book)
    {
        if ($book->status === 0){
            $book->update(['status' => 1]);
        }
        else if ($book->status === 1){
            $book->update(['status' => 0]);
        }

        return redirect()->back();
    }
}






