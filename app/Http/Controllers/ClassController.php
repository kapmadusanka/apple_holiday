<?php

namespace App\Http\Controllers;

use App\Models\StuClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
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
        $class = StuClass::all();
        return view('page.class.index')->with('records', $class);
    }

    public function create()
    {
        if(!$this->check_role()){
            return redirect('/home');
        }
            $class=new  StuClass;
            $class_Columns=$class->getTableColumns();
            return view('page.class.form',['class'=>$class]);



    }


    public function store(Request $request)
    {

        if(!$this->check_role()){
            return redirect('/home');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'year' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else{

            $class_id=$request->input('class_id');
            if($class_id){
                $student=StuClass::find($class_id);
                $student->name=$request->input('name');
                $student->year=$request->input('year');
                $student->save();
                session()->flash('success', 'Successfully Updated.');
                return redirect()->back();
            }else{
                $class=new StuClass();
                $class->name=$request->input('name');
                $class->year=$request->input('year');
                $class->save();
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
            $class = StuClass::find($id);

            return view('page.class.form',['class'=>$class]);


    }

    public function delete($id)
    {
        if(!$this->check_role()){
            return redirect('/home');
        }
            $this->check_role();
            $student = StuClass::find($id);
            $student->delete();

            session()->flash('success', 'Successfully Deleted.');
            return redirect()->back();


    }
}
