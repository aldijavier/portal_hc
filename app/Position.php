<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "position";
    protected $primaryKey = "position_id";

    protected $fillable = [
        'position_id', 'position_name',
    ];
}
