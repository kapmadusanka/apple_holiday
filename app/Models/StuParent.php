<?php

namespace App\Models;




class StuParent extends BaseModel
{

    protected $table = 'parents';

    protected $primaryKey = 'id';
    protected $fillable =  [
        'id','name','type','dob','created_at','updated_at'
    ];


}
