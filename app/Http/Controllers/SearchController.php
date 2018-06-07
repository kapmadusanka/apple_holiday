<?php

namespace App\Http\Controllers;

use App\Models\StuClass;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\StuParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Class_;

class SearchController extends Controller
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
    public function older_than($age)
    {
        $students = Student::selectRaw('*,(YEAR(CURDATE()) - YEAR(dob)) as age')->whereRaw('(YEAR(CURDATE()) - YEAR(dob))>='.$age)->with('get_class')->get()->all();
        return view('page.search.index')->with(['page_title'=> 'Students who are older than 18','records'=> $students]);
    }

    public function older_than_and_parents($student_age,$parent_age)
    {
        $students=StudentParent::with(['get_student' => function($query) use($student_age){
                $query->whereRaw('(YEAR(CURDATE()) - YEAR(dob))>='.$student_age)
                    ->selectRaw('*,(YEAR(CURDATE()) - YEAR(dob)) as student_age');
            }])->with(['get_parent' => function($query) use($parent_age){
                    $query->whereRaw('(YEAR(CURDATE()) - YEAR(dob))>='.$parent_age)
                        ->selectRaw('*,(YEAR(CURDATE()) - YEAR(dob)) as parent_age');
                }])->groupBy('student_id')->get()->all();
       // $students = Student::selectRaw('*,(YEAR(CURDATE()) - YEAR(dob)) as age')->whereRaw('(YEAR(CURDATE()) - YEAR(dob))>='.$age)->with('get_class')->get()->all();
        return view('page.search.older_than_and_parents')->with(['page_title'=> 'Students who are older than 18','records'=> $students]);
    }


    public function students_in_class($class,$year)
    {

        $students=StuClass::with('students')->where('year',$year)->where('name',$class)->get()->first();

        return view('page.search.class')->with(['page_title'=> 'Students in class 8 in 2010','records'=> $students]);
    }


    public function search_class_parents()
    {

        $students = Student::all()->pluck("name", 'id');
        return view('page.search.class_parents_form')->with('students', $students);
    }

    public function search_class_parent_submit(Request $request)
    {

        $students=StudentParent::with(['get_student' => function($query){
                $query->join('class', 'class.id', '=', 'students.class_id')
                    ->select('students.*', 'class.name as class_name');
            }])->with('get_parent')->where('student_id',$request->input('student_id'))->get()->all();
        return view('page.search.search_class_parents')->with(['page_title'=> 'class and the parents for '.$students[0]->get_student->name,'records'=> $students]);
    }






}
