<?php

namespace App\Models;

class StuClass extends BaseModel
{
    protected $table = 'class';

    protected $primaryKey = 'id';
    protected $fillable =  [
        'id','name','year','created_at','updated_at'
    ];
    public function students(){
        return $this->hasMany(Student::class,'class_id');
    }

}
