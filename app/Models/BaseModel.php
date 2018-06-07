<?php

namespace App\Models;




use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BaseModel extends Model
{


    public function getTableColumns()
    {


        $cols= Schema::getColumnListing($this->table);
        $column=array();
        foreach ($cols as $key=>$col){
            $column[$col]='';
        }

        return (object)$column;

    }


}
