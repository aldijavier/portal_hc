<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marital extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "bank_list";
    protected $primaryKey = "id";

    protected $fillable = [
        'id', 'nama_bank'
    ];

    protected $guarded = [];

    public function subcategories(){

        return $this->hasMany('App\Bank', 'id');

    }
}
