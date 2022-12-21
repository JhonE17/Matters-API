<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return response()->json($students);
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
            'phone' => 'required|unique:students|max:10',
            'email' => 'required|unique:students|max:50|email',
            'semester' => 'required|max:2',
            'subjects' => 'required|array'
        ]);

        $students = new Student([
            'document' => $request->document,
            'names' => $request->names,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'semester' => $request->semester
        ]);

        foreach ($students->subjects as $item) {

            print_r($item);
        }
        $students->save();
        $students->subjects()->attach($request->subjects);
        return response()->json(['message' => 'Student created!', 'status' => 200])
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
        $contact = Student::findOrFail($id);
        return response()->json($contact, 200)
            ->header('X-Requested-With', 'XMLHttpRequest');
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
            'document' => 'required|max:10|unique:students,document,' . $id,
            'names' => 'required|max:50',
            'phone' => 'required|max:10|unique:students,phone,' . $id,
            'email' => 'required|max:50|email|unique:students,email,' . $id,
            'semester' => 'required|max:2'
        ]);

        $students = Student::findOrFail($id);
        $students->update($request->all());
        $students->subjects()->sync($request->subjects);
        return response()->json(['message' => 'Student updated', 'status' => 200])
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
        $students = Student::findOrFail($id);
        $students->delete();
        $students->subjects()->detach();
        return response()->json(['message' => 'Student deleted!', 'status' => 200])
            ->header('X-Requested-With', 'XMLHttpRequest');
    }
}
