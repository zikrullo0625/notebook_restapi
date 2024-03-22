<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Note::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $note = new Note();
        $note->full_name = $request->input('full_name');
        $note->company = $request->input('company');
        $note->phone = $request->input('phone');
        $note->email = $request->input('email');
        $note->birth_date = $request->input('birth_date');
        $note->photo_path = $request->input('photo_path');

        $note->save();

        return response()->json($note);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $note = DB::table('notes')->find($id);
        return response()->json($note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $note = Note::find($id);

        $note->full_name = $request->input('full_name');
        $note->company = $request->input('company');
        $note->phone = $request->input('phone');
        $note->email = $request->input('email');
        $note->birth_date = $request->input('birth_date');
        $note->photo_path = $request->input('photo_path');

        $note->save();
        return response()->json($note);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $note = Note::find($id)->delete();
        return response()->json(null);
    }
}
