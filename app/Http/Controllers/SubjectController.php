<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = Subject::all();
        // return view('Subjects.index')->with('Subjects',$subjects);
        return response()->json($subjects);
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
            'name_subject' => 'required',
            'credits' => 'required|max:2',
            'area' => 'required',
            'category' => 'required'
        ]);

        $subjects = new Subject([
            'name_subject' => $request->name_subject,
            'description' => $request->description,
            'credits' => $request->credits,
            'area' => $request->area,
            'category' => $request->category
        ]);
        $subjects->save();
        return response()->json(['message' => 'Subject created!', 'status' => 200])
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
        $contact = Subject::findOrFail($id);
        return response()->json($contact)->header('X-Requested-With', 'XMLHttpRequest');;
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
        $subjects = Subject::findOrFail($id);
        $subjects->update($request->all());
        $subjects->subjects()->sync($request->subjects);
        return response()->json(['message' => 'Subject updated', 'status' => 200])
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
        $subjects = Subject::findOrFail($id);
        $subjects->delete();
        return response()->json(['message' => 'Subject deleted!', 'status' => 200])
            ->header('X-Requested-With', 'XMLHttpRequest');
    }
}
