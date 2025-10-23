<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{

//    public function index()
//    {
//
//    }
    //
    public function show(Book $book){
        return view('books.show', compact(var_name: 'book'));

    }

    public function create()
    {
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
            'description' => 'required'
        ]);
        //errors tonen
        //beveiliging
        //data terugschrijven in de form fields
        //INSERT INTO sql
        $book = new Book();
        $book ->title = $request->input('title');
        $book ->author = 'Thomas';
        $book ->description = $request->input('description');
        $book -> pages =  400;
        $book ->genre_id = $request->input('genre_id');

//        $book -> genres = 'Fantasy';


        $book->save();

//        return redirect()->route('books.index');
    }
}




