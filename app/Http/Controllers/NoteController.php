<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the notes.
     *
     * @return \Illuminate\Http\Response
     */
    public function notes()
    {
        $notes = Note::all();
        return response()->json($notes);
    }

    public function showNotesView()
    {
        return view('notes');
    }

    /**
     * Store a newly created note in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tag' => 'nullable|string|max:255',
            'user' => 'nullable|string|max:255',
            'thumb' => 'nullable|string|max:255',
        ]);

        $request->merge(['date' => Carbon::now()->format('Y-m-d H:i:s')]);
        $note = Note::create($request->all());

        return response()->json($note, 201);
    }

    /**
     * Display the specified note.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);
        return response()->json($note);
    }

    /**
     * Update the specified note in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tag' => 'nullable|string|max:255',
            'user' => 'nullable|string|max:255',
            'thumb' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        $note->update($request->all());

        return response()->json($note, 200);
    }

    /**
     * Remove the specified note from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return response()->json(null, 204);
    }
}
