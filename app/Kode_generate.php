<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kode_generate extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "kode_generate";
    protected $primaryKey = "id_kode";

    protected $fillable = [
        'id_kode', 'nama_kode', 'keterangan_kode'
    ];
}
