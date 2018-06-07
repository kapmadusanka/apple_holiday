<?php

namespace App\Http\Controllers;

use App\Models\StuClass;
use App\Models\Student;
use App\Models\StuParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParentController extends Controller
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
        $parents = StuParent::all();

        return view('page.parents.index')->with('records', $parents);
    }

    public function create()
    {
        if(!$this->check_role()){
            return redirect('/home');
        }
        $parent=new  StuParent;
        $parent_Columns=$parent->getTableColumns();
       //print_r($parent_Columns);

        return view('page.parents.form',['parent'=>$parent_Columns]);
    }


    public function store(Request $request)
    {

        if(!$this->check_role()){
            return redirect('/home');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'dob' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $parent_id=$request->input('parent_id');
            if($parent_id){
                $parent=StuParent::find($parent_id);
                $parent->name=$request->input('name');
                $parent->dob=date('Y-m-d',strtotime($request->input('dob')));
                $parent->type=$request->input('type');
                $parent->save();
                session()->flash('success', 'Successfully Updated.');
                return redirect()->back();
            }else{
                $parent=new StuParent();
                $parent->name=$request->input('name');
                $parent->dob=date('Y-m-d',strtotime($request->input('dob')));
                $parent->type=$request->input('type');
                $parent->save();
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
        $parent = StuParent::find($id);

        return view('page.parents.form')->with('parent', $parent);
    }

    public function delete($id)
    {
        if(!$this->check_role()){
            return redirect('/home');
        }
        $parent = StuParent::find($id);
        $parent->delete();

        session()->flash('success', 'Successfully Deleted.');
        return redirect()->back();
    }
}
