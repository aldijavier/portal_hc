<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "department";

    protected $fillable = [
        'department_id', 'department_name', 'reportline_name'
    ];
}
