<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marital extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "marital_status";
    protected $primaryKey = "id";

    protected $fillable = [
        'id', 'marital_status',
    ];

    protected $guarded = [];

    public function subcategories(){

        return $this->hasMany('App\Marital', 'id');

    }
}
