<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()->orderBy('created_at','desc')->paginate();
        return view('note.index',['notes'=> $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mydata=$request->validate([
            'note'=>['required','string'],
        ]);

        $mydata['user_id']=1;
        $note=Note::create($mydata);

        return to_route('note.show',$note)->with('message','note was created...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('note.show',['note'=>$note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('note.edit' ,['note'=>$note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $mydata=$request->validate([
            'note'=>['required','string'],
        ]);

        $note->update($mydata);

        return to_route('note.show',$note)->with('message','note was updated...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return to_route('note.index')->with('message','note was deleted...');
    }
}