<?php

namespace App\Http\Controllers;

use App\Mail\StudentDetails;
use App\Models\StuClass;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\StuParent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
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
        $students = Student::with('get_class')->get()->all();
        return view('page.students.index')->with('records', $students);
    }

    public function create()
    {
        if(!$this->check_role()){
            return redirect('/home');
        }
        $class=StuClass::all()->pluck("name", 'id');
        $student=new  Student;
        $student_Columns=$student->getTableColumns();
        //print_r($class);
        return view('page.students.form',['classes'=>$class,'student'=>$student_Columns]);
    }


    public function store(Request $request)
    {
        if(!$this->check_role()){
            return redirect('/home');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'class_id' => 'required',
            'dob' => 'required',
            'city' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else{


            $student_id=$request->input('student_id');
            if($student_id){
                $student=Student::find($student_id);
                $student->name=$request->input('name');
                $student->class_id=$request->input('class_id');
                $student->dob=date('Y-m-d',strtotime($request->input('dob')));
                $student->city=$request->input('city');
                $student->save();
                session()->flash('success', 'Successfully Updated.');
                return redirect()->back();
            }else{
                $student=new Student();
                $student->name=$request->input('name');
                $student->class_id=$request->input('class_id');
                $student->dob=date('Y-m-d',strtotime($request->input('dob')));
                $student->city=$request->input('city');
                $student->save();
                session()->flash('success', 'Successfully Added.');
                return redirect()->back();
            }
        }

    }



    public function edit($id)
    {
        if(!$this->check_role()){
            return redirect('/home');
        }
        $class=StuClass::all()->pluck("name", 'id');
        $student = Student::find($id);

        return view('page.students.form',['classes'=>$class,'student'=>$student]);
    }

    public function delete($id)
    {
        if(!$this->check_role()){
            return redirect('/home');
        }
        $student = Student::find($id);
        $student->delete();

        session()->flash('success', 'Successfully Deleted.');
        return redirect()->back();
    }



    public function send_email_form(){
        return view('page.email.form');
    }
    public function send_mail(Request $request)
        {
            if(!$this->check_role()){
                return redirect('/home');
            }

            $validator = Validator::make($request->all(), [
                'email' => 'required',

            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }else{
               // $students=Student::with('get_parents')->with('get_class')->get()->all();

                $email=$request->input('email');
                $when = now()->addMinutes(10);

                Mail::to($email)
                    ->later($when, new StudentDetails());
                session()->flash('success', 'Successfully sent.');
                return redirect()->back();

            }
    }

}
