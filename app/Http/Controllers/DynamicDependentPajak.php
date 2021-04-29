<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Marital;

class DynamicDependentPajak extends Controller
{
   //pajak
   public function myform()
   {
       $states = DB::table("marital_status")->lists("id","marital_status");
       return view('HalamanDepan.tambah-data-karyawan',compact('states'));
   }

   public function myformAjax($id)
   {
       $cities = DB::table("pajak")
                   ->where("marital",$id)
                   ->lists("id","jenis_pajak");
       return json_encode($cities);
   }

}
