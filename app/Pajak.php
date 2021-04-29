<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "pajak";
    protected $primaryKey = "id";

    protected $fillable = [
        'id', 'jenis_pajak',
    ];

    public function karyawan(){
        return $this->hasMany(Karyawan::class);
    }
}
