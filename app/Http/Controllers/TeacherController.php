<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::all();
        // return view('Teachers.index')->with('Teachers',$teachers);
        return response()->json($teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|max:10',
            'names' => 'required|max:50',
            'phone' => 'required|unique:teachers|max:10',
            'email' => 'required|unique:teachers|max:50|email',
        ]);

        $teachers = new Teacher([
            'document' => $request->document,
            'names' => $request->names,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city
        ]);
        $teachers->save();
        $teachers->subjects()->attach($request->subjects);
        return response()->json(['message' => 'Teacher created!', 'status' => 200])
            ->header('X-Requested-With', 'XMLHttpRequest');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Teacher::findOrFail($id);
        return response()->json($contact)->header('X-Requested-With', 'XMLHttpRequest');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'document' => 'required|max:10|unique:teachers,document,' . $id,
            'names' => 'required|max:50',
            'phone' => 'required|max:10|unique:teachers,phone,' . $id,
            'email' => 'required|max:50|email|unique:teachers,email,' . $id,
        ]);
        $teachers = Teacher::findOrFail($id);
        $teachers->update($request->all());
        $teachers->subjects()->sync($request->subjects);
        return response()->json(['message' => 'Teacher updated', 'status' => 200])
            ->header('X-Requested-With', 'XMLHttpRequest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teachers = Teacher::findOrFail($id);
        $teachers->delete();
        $teachers->subjects()->detach($id);
        return response()->json(['message' => 'Student deleted!', 'status' => 200])
            ->header('X-Requested-With', 'XMLHttpRequest');
    }
}
