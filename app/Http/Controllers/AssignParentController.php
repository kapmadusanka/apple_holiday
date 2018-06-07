<?php

namespace App\Http\Controllers;

use App\Models\StuClass;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\StuParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssignParentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = StudentParent::with('get_student')->with('get_parent')->get()->all();

        //print_r($students);

        return view('page.assign_parent.index')->with('records', $students);
    }

    public function create()
    {
        if(!$this->check_role()){
            return redirect('/home');
        }
        $students = Student::all()->pluck("name", 'id');
        $parents=StuParent::all()->pluck("name", 'id');
        return view('page.assign_parent.form',['parents'=>$parents,'students'=>$students]);

    }


    public function store(Request $request)
    {

        if(!$this->check_role()){
            return redirect('/home');
        }
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'parent_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else{

                $student=new StudentParent();
                $student->student_id=$request->input('student_id');
                $student->parent_id=$request->input('parent_id');
                $student->save();
                session()->flash('success', 'Successfully Added.');
                return redirect()->back();

        }

    }


    public function delete($id)
    {
        if(!$this->check_role()){
            return redirect('/home');
        }
        $student = StudentParent::find($id);
        $student->delete();

        session()->flash('success', 'Successfully Deleted.');
        return redirect()->back();

    }



}
