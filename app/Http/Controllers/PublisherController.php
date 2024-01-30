<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $publishers = Publisher::all();
        $publishers = Publisher::paginate(5);
        return view('publishers.index', ['publishers' => $publishers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:45',
            'publisherName' => 'required|string|max:255',
        ]);

        Publisher::create([
            'city' => $request->input('city'),
            'publisher_name' => $request->input('publisherName'),
        ]);

        return redirect()->route('publishers.index')->with('success', 'Publisher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', ['publisher' => $publisher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'city' => 'nullable|string|max:45',
            'publisherName' => 'nullable|string|max:255',
        ]);

        if ($request->filled('city')) {
            $publisher->city = $request->input('city');
        }
        if ($request->filled('publisherName')) {
            $publisher->publisher_name = $request->input('publisherName');
        }

        $publisher->save();

        return back()->with('success', 'Publisher edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publishers.index')->with('success', 'Publisher deleted successfully.');
    }
}
