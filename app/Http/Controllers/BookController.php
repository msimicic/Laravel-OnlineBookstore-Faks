<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books = Book::all();
        $books = Book::paginate(5);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();
        return view('books.create', compact('publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'price' => 'required|numeric',
            'publishmentDate' => 'required|date',
            'genre' => 'nullable|string|max:45',
            'publisherId' => 'required|exists:publishers,id',
        ]);

        Book::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'publishment_date' => $request->input('publishmentDate'),
            'genre' => $request->input('genre'),
            'publisher_id' => $request->input('publisherId'),
        ]);
        
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $publishers = Publisher::all();
        return view('books.edit', ['book' => $book, 'publishers' => $publishers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'nullable|string|max:100',
            'price' => 'nullable|numeric',
            'publishmentDate' => 'nullable|date',
            'genre' => 'nullable|string|max:45',
        ]);

        if ($request->filled('title')) {
            $book->title = $request->input('title');
        }
        if ($request->filled('price')) {
            $book->price = $request->input('price');
        }
        if ($request->filled('publishmentDate')) {
            $book->publishment_date = $request->input('publishmentDate');
        }
        if ($request->filled('genre')) {
            $book->genre = $request->input('genre');
        }

        $book->publisher_id = $request->input('publisherId');

        $book->save();

        return back()->with('success', 'Book edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
