<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Note::query();

    if ($request->search) {
        $query->where('title', 'like', "%{$request->search}%")
              ->orWhere('content', 'like', "%{$request->search}%");
    }

    $notes = $query->latest()->get();

    // NEW: detect view type (grid or list)
    $viewType = $request->get('view', 'grid'); // default = grid

    return view('notes.index', compact('notes', 'viewType'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'color'=>'required'
        ]);
        Note::create($request->all());
        return redirect('/notes')->with('success','Note recieved!');//success note
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->back()->with('success','Note removed!');//delete note

    }
}
