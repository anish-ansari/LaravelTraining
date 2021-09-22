<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return('ok');
        // $pages = Student::all();
        // $pages = Student::get();
        // $pages = Student::select('roll_no')->latest()->get();
        $pages = Student::latest()->paginate(10);
        return view('student.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.create');
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
            'roll_no' => 'required|unique:students',
            'name' => 'required',
            'phone' => 'required',
        ]);

        $page = Student::create([
            'roll_no' => $request->roll_no,
            'name' => $request->name,
            'phone' => $request->phone,

        ]);
        if($page){
            return redirect('students');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $page = Student::where('id',$id)->first();
        return view('student.edit',compact('page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $page = Student::where('id',$id)->first();
        $page->update([
            'roll_no' => $request->roll_no,
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        if($page){
            return redirect('students')->with('success','Upadte Successfully');            
        } return redirect('students')->with('failed','Could not update');            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $page = Student::where('id',$id)->delete();
        if($page){
            return redirect('students')->with('deleted','Deleted Successfully');
        }return redirect('students')->with('delete-failed','Could not soft delete');
    }
}
