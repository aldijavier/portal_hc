<?php

namespace App\Http\Controllers;
use App\Karyawan;
use App\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_number_karyawan = $request->get('search_number_karyawan');
        $search_nama_karyawan = $request->get('search_nama_karyawan');
        $search_statuspernikahan_karyawan = $request->get('search_statuspernikahan_karyawan');
        $search_agama_karyawan = $request->get('search_agama_karyawan');
        $search_department_karyawan = $request->get('search_department_karyawan');
        $search_statuss_karyawan = $request->get('search_statuss_karyawan');
        $departments1 = department::all();
  
        $karyawan = DB::table('karyawan');

        $karyawan = Karyawan::leftJoin('department', 'department.department_id', 'karyawan.int_emp_department')
        ->select(
                'karyawan.*',
                'department.department_name as department_name'
            );            
            
        if($request->get('search_number_karyawan')){
            $karyawan=$karyawan->where('int_emp_number','like', '%'.$search_number_karyawan.'%');
        }
        
        if($search_nama_karyawan){
            $karyawan=$karyawan->where('int_emp_name','like', '%'.$search_nama_karyawan.'%');
        }
      
        if($search_statuspernikahan_karyawan){
            $karyawan=$karyawan->where('int_emp_marital','like','%'.$search_statuspernikahan_karyawan.'%');
        }

        if($search_agama_karyawan){
            $karyawan=$karyawan->where('int_emp_religion','like', '%'.$search_agama_karyawan.'%');
        }

        if($search_department_karyawan){
            $karyawan=$karyawan->where('int_emp_department','=',$search_department_karyawan);
        }
        
        if($search_statuss_karyawan){
            $karyawan=$karyawan->where('int_emp_statuss','=',$search_statuss_karyawan);
        }

        $karyawan = $karyawan->paginate(10000);
        $karyawan = $karyawan->appends($request->all());
        return view('HalamanDepan.data-karyawan', compact('karyawan', 'departments1'));

    }
    
    
    public function index2(Request $request)
    {
        $search_number_karyawan = $request->get('search_number_karyawan');
        $search_nama_karyawan = $request->get('search_nama_karyawan');
        $search_statuspernikahan_karyawan = $request->get('search_statuspernikahan_karyawan');
        $search_agama_karyawan = $request->get('search_agama_karyawan');
        $search_department_karyawan = $request->get('search_department_karyawan');
        $search_statuss_karyawan = $request->get('search_statuss_karyawan');
        $departments1 = department::all();
  
        $karyawan = DB::table('karyawan');

        $karyawan = Karyawan::leftJoin('department', 'department.department_id', 'karyawan.int_emp_department')
        ->select(
                'karyawan.*',
                'department.department_name as department_name'
            );            
            
        if($request->get('search_number_karyawan')){
            $karyawan=$karyawan->where('int_emp_number','like', '%'.$search_number_karyawan.'%');
        }
        
        if($search_nama_karyawan){
            $karyawan=$karyawan->where('int_emp_name','like', '%'.$search_nama_karyawan.'%');
        }
      
        if($search_statuspernikahan_karyawan){
            $karyawan=$karyawan->where('int_emp_marital','like','%'.$search_statuspernikahan_karyawan.'%');
        }

        if($search_agama_karyawan){
            $karyawan=$karyawan->where('int_emp_religion','like', '%'.$search_agama_karyawan.'%');
        }

        if($search_department_karyawan){
            $karyawan=$karyawan->where('int_emp_department','=',$search_department_karyawan);
        }
        
        if($search_statuss_karyawan){
            $karyawan=$karyawan->where('int_emp_statuss','=',$search_statuss_karyawan);
        }

        $karyawan = $karyawan->paginate(10000);
        $karyawan = $karyawan->appends($request->all());
        return view('HalamanDepan.filter-data-karyawan', compact('karyawan', 'departments1'));

    }    
        
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
