<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DynamicDependentLogbook extends Controller
{
    //
    function index()
    {
        $lokasi = DB::table('lokasi')->get();
        // return $provinces_list;
        return view('logbook')->with('lokasi', $lokasi);
    }

    function lantai(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('lantai')
            ->where('id_lokasi', $value)
            ->get();
        $output = '<option value="">Pilih Lantai</option>';
        foreach ($data as $row) {
            // var_dump($row->name);
            $output .= '<option value="' . $row->id . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }

    function ruangan(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('ruangan')
            ->where('id_lantai', $value)
            ->get();
        $output = '<option value="">Pilih Ruangan</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }
}
