<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "bank_swift";
    protected $primaryKey = "id";

    protected $fillable = [
        'id', 'swift', 'bank'
    ];

    public function karyawan(){
        return $this->hasMany(Karyawan::class);
    }
}
