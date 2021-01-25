<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DynamicDependent2 extends Controller
{
    //
    function index()
    {
        $provinces_list2 = DB::table('indonesia_provinces')->get();
        // return $provinces_list;
        return view('dropdown2')->with('provinces_list2', $provinces_list2);
    }

    function regencies2(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('indonesia_cities')
            ->where('province_id', $value)
            ->get();
        $output = '<option value="">Pilih Kota</option>';
        foreach ($data as $row) {
            // var_dump($row->name);
            $output .= '<option value="' . $row->id . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }

    function districts2(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('indonesia_districts')
            ->where('city_id', $value)
            ->get();
        $output = '<option value="">Pilih Kecamatan</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }

    function villages2(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('indonesia_villages')
            ->where('district_id', $value)
            ->get();
        $output = '<option value="">Pilih Kelurahan</option>';
        // return $data;
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }
    
}
