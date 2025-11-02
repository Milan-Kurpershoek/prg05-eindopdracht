<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        $genres = Genre::all();
        return view('books.index', compact('books', 'genres'));
    }

    public function show(Book $book){
        $review = Review::with('user')->where('book_id', $book->id)->get();

        return view('books.show', compact('book', 'review'));

    }

    public function create()
    {
        if (Auth::guest()){
            return redirect('/login');
        }

        if (!auth()->user()->canCreateBooks()){
            return redirect()->route('books.index')
            ->with('error', 'You need to write 3 reviews before you can add a book');
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
            'pages' => 'required|numeric',
            'genre_id' => 'required',
            'image'=> 'nullable|image|max:4096'

        ]);

        $bookImage = null;

        if ($request->hasFile('image')){
            $bookImage = $request->file('image')->storePublicly('book', 'public');
        }

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
        $book ->image = $bookImage;

        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {

        if ($book->image){
            Storage::disk('public')->delete($book->image);
        }

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
            'pages' => 'required|numeric',
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

        if ($search) {
            $books = Book::where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('author', 'LIKE', '%' . $search . '%')->get();
        }else{
            $books = Book::all();
        }
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
            return redirect('/dashboard');
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

    public function review($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('books.review', compact('book'));
    }

    public function storeReview(Request $request)
    {
        $request->validate([
            'opinion' => 'required'
        ]);

        $review = new Review();
        $review ->user_id = Auth::id();
        $review ->book_id = $request->input('book_id');
        $review ->opinion = $request->input('opinion');

        $review->save();

        return redirect()->route('books.show', $review->book_id);
    }
}






