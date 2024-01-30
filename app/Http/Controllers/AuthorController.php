<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $authors = Author::all();
        $authors = Author::paginate(5);
        return view('authors.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:45',
            'lastName' => 'required|string|max:45',
        ]);

        Author::create([
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
        ]);

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'firstName' => 'nullable|string|max:45',
            'lastName' => 'nullable|string|max:45',
        ]);

        if ($request->filled('firstName')) {
            $author->first_name = $request->input('firstName');
        }
        if ($request->filled('lastName')) {
            $author->last_name = $request->input('lastName');
        }

        $author->save();

        return back()->with('success', 'Author edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
