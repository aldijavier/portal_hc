<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marital extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "coa";
    protected $primaryKey = "id";

    protected $fillable = [
        'id', 'name_coa',
    ];

    protected $guarded = [];

    public function subcategories(){

        return $this->hasMany('App\Coa', 'id');

    }
}
