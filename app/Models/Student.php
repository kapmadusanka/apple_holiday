<?php

namespace App\Models;


use Carbon\Carbon;

class Student extends BaseModel
{
    protected $table = 'students';

    protected $primaryKey = 'id';
    protected $fillable =  [
        'id','name','class_id','dob','city','created_at','updated_at'
    ];

    public function get_class(){
        return $this->belongsTo(StuClass::class,'class_id');
    }

    public function search_class(){
        return $this->belongsTo(StuClass::class,'class_id');
    }

    public function get_parents(){
        return $this->hasOne(StudentParent::class,'id','student_id');
    }

    public function age() {
        return $this->dob->diffInYears(Carbon::now());
    }

}
