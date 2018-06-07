<?php

namespace App\Models;

class StudentParent extends BaseModel
{
    protected $table = 'student_parent';

    protected $primaryKey = 'id';
    protected $fillable =  [
        'id','student_id','parent_id','created_at','updated_at'
    ];

    public function get_student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function get_parent(){
        return $this->belongsTo(StuParent::class,'parent_id');
    }

}
