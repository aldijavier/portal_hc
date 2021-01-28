<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "directorate";
    protected $primaryKey = "directorate_id";

    protected $fillable = [
        'directorate_id', 'directorate_name',
    ];
}
