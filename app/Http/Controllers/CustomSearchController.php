<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomSearchController extends Controller
{
    //
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if($request->filter_test)
      {
       $data = DB::table('karyawan')
         ->select('int_emp_number', 'int_emp_name', 'int_emp_gender', 'int_emp_marital', 'int_emp_religion', 
         'int_emp_dob', 'int_emp_department', 'int_emp_statuss')
         ->where('int_emp_statuss', $request->filter_test)
         ->get();
      }
      if($request->filter_gender)
      {
       $data = DB::table('karyawan')
         ->select('int_emp_number', 'int_emp_name', 'int_emp_gender', 'int_emp_marital', 'int_emp_religion', 
         'int_emp_dob', 'int_emp_department', 'int_emp_statuss')
         ->where('int_emp_gender', $request->filter_gender)
         ->get();
      }
      if($request->filter_religion)
      {
       $data = DB::table('karyawan')
         ->select('int_emp_number', 'int_emp_name', 'int_emp_gender', 'int_emp_marital', 'int_emp_religion', 
         'int_emp_dob', 'int_emp_department', 'int_emp_statuss')
         ->where('int_emp_religion', $request->filter_religion)
         ->get();
      }
      else
      {
       $data = DB::table('karyawan')
         ->select('int_emp_number', 'int_emp_name', 'int_emp_gender', 'int_emp_marital', 'int_emp_religion', 
         'int_emp_dob', 'int_emp_department', 'int_emp_statuss')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
    //  $religion_name = DB::table('karyawan')
    //       ->select('int_emp_religion')
    //       ->groupBy('int_emp_religion')
    //       ->orderBy('int_emp_religion')
    //       ->get();
     return view('custom_search');
    }
}
