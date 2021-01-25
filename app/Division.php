<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "division";
    protected $primaryKey = "division_id";

    protected $fillable = [
        'division_id', 'division_name',
    ];

    public function karyawan(){
        return $this->hasMany(Karyawan::class);
    }
}
