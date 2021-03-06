<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Kode_generate;
use App\Directorate;
use App\Division;
use App\Department;
use App\Position;
use App\Marital;
use App\Pajak;
use App\Bank_Swift;
use App\Bank;
use App\Coa;
use App\Exports\KaryawanExport;
use App\Exports\Karyawan2Export;
use App\Imports\KaryawanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Shared\Date;
class ControllerKaryawan extends Controller
{
    public function index()
    {
        $provinces_list = DB::table('indonesia_provinces')->get();
        $provinces_list2 = DB::table('indonesia_provinces')->get();
        $kode_generate = DB::table('kode_generate')->get();
        $directorates = DB::table('directorate')->get();
        $divisions = DB::table('division')->get();
        $marital = DB::table('marital_status')->get();
        $pajak = DB::table('pajak')->get();
        $swift = DB::table('bank_swift')->get();
        // $states = DB::table('marital_status')->get();
        //$pajak = DB::table('pajak')->get();
        $coa = DB::table('coa')->pluck("name_coa","id");
        $bank_list = DB::table('bank_list')->pluck("nama_bank","id");
        $countries = DB::table('marital_status')->pluck("marital_status","id");
        $departments = DB::table('department')->get();
        $positions = DB::table('position')->get();
        // $worklength = karyawan::first()->getWorkLength();
        $kode = ''; /*karyawan::kode();*/
        return view('HalamanDepan.tambah-data-karyawan',compact('kode_generate','kode',
        'provinces_list', 'provinces_list2', 'directorates', 'countries', 'bank_list', 'coa', 'marital', 'pajak', 'divisions', 'departments', 'positions', 'kode', 'swift'));
    }

    // public function getCountries()
    // {
    //     $countries = DB::table('marital_status')->pluck("marital_status","id");
    //     return view('HalamanDepan.tambah-data-karyawan',compact('countries'));
    // }

    public function getStates($id) 
    {        
            $states = DB::table("pajak")->where("marital",$id)->pluck("jenis_pajak", "id");
            return json_encode($states);
    }

    public function getBank($id) 
    {        
            $states = DB::table("bank_swift")->where("bank",$id)->pluck("swift", "id");
            return json_encode($states);
    }

    public function getBankList($id) 
    {        
            $states = DB::table("bank_)list")->where("nama_bank",$id)->pluck("nama_bank", "id");
            return json_encode($states);
    }

    public function getCoa($id) 
    {        
            $states = DB::table("coa")->where("name_coa",$id)->pluck("name_coa", "id");
            return json_encode($states);
    }

//    public function myform()
//    {
//        $states = DB::table("marital_status")->lists("id","marital_status");
//        return view('HalamanDepan.tambah-data-karyawan',compact('states'));
//    }

//    public function myformAjax($id)
//    {
//        $cities = DB::table("pajak")
//                    ->where("marital",$id)
//                    ->lists("id","jenis_pajak");
//        return json_encode($cities);
//    }

    public function datakaryawan()
    {
        $departments1 = DB::table('department')->get();
        $marital = DB::table('marital_status')->get();
        $karyawan = Karyawan::leftJoin('department', 'department.department_id', 'employee.int_emp_department')
        ->leftJoin('marital_status', 'marital_status.id', 'employee.int_emp_marital')
        ->select(
            'employee.*',
            'department.department_name as department_name',
            'marital_status.marital_status as marital'
        )
        ->get();
        return view('HalamanDepan.data-karyawan', compact('karyawan', 'departments1', 'marital'));
    }
    
    public function findReportLineName(Request $request)
    {
		$p = Department::select('reportline_name')->where('department_id',$request->id)->first();
    	return response()->json($p);
	}

    public function filterdatakaryawan()
    {
        $departments1 = DB::table('department')->get();
        $marital = DB::table('marital_status')->get();
        $karyawan = Karyawan::leftJoin('department', 'department.department_id', 'employee.int_emp_department')
        ->leftJoin('marital_status', 'marital_status.id', 'employee.int_emp_marital')
        ->select(
            'employee.*',
            'department.department_name as department_name',
            'marital_status.marital_status as marital'
        )
        ->get();
        return view('HalamanDepan.filter-data-karyawan', compact('karyawan', 'departments1', 'marital'));    
    }

    public function datatables(Request $request)
    {
        $query = Karyawan::select([
            'employee.*',
            'department.deparment_name as nama_department'
        ])
        ->join('department','department.id','=','employee.int_emp_department')
        ;
        $query = Karyawan::all(['int_emp_number', 'int_emp_name', 'int_emp_gender', 'int_emp_marital', 
               'int_emp_religion', 'int_emp_dob', 'int_emp_department', 'int_emp_statuss'])
               ->sortBy('id');
        return datatables($query)->toJson();
    }

    public function datatablesIndex(Request $request)
    {
        $data ['list_department'] = Department::all();
        return view('HalamanDepan/filter-data-karyawan', $data);
    }

    public function export_excel()
	{
		return Excel::download(new KaryawanExport, 'Data Karyawan Aktif.xlsx');
    }
    
    public function export_excel2()
	{
		return Excel::download(new Karyawan2Export, 'Data Karyawan Tidak Aktif.xlsx');
    }
    
    public function detaildatakaryawan($id)
    {
    
        $peg = Karyawan::select('employee.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village',
                'marital_status.marital_status as marital',
                'pajak.jenis_pajak as pajak',
                'bank_list.nama_bank as bank_list',
                'bank_swift.swift as bank_swift',
                'coa.name_coa as coa'
                )
                ->leftjoin('indonesia_villages','indonesia_villages.id','employee.int_emp_villages1')
                ->leftjoin('indonesia_districts','indonesia_districts.id','employee.int_emp_districts1')
                ->leftjoin('indonesia_cities','indonesia_cities.id','employee.int_emp_regencies1')
                ->leftjoin('indonesia_provinces','indonesia_provinces.id','employee.int_emp_provinces1')
                ->leftJoin('marital_status', 'marital_status.id', 'employee.int_emp_marital')
                ->leftJoin('pajak', 'pajak.id', 'employee.int_emp_tax_cat')
                ->leftJoin('bank_list', 'bank_list.id', 'employee.int_name_bank')
                ->leftJoin('bank_swift', 'bank_swift.id', 'employee.int_emp_bankswift')
                ->leftJoin('coa', 'coa.id', 'employee.int_emp_coa')
                ->where('employee.int_emp_id','=',$id)
                ->get();
                
        $peg2 = Karyawan::select('employee.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village'
                )
                ->leftjoin('indonesia_villages','indonesia_villages.id','employee.int_emp_villages2')
                ->leftjoin('indonesia_districts','indonesia_districts.id','employee.int_emp_districts2')
                ->leftjoin('indonesia_cities','indonesia_cities.id','employee.int_emp_regencies2')
                ->leftjoin('indonesia_provinces','indonesia_provinces.id','employee.int_emp_provinces2')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        $kode_generate = Karyawan::select('employee.*',
                'kode_generate.keterangan_kode as keterangan_kode',
                )
                ->leftjoin('kode_generate','kode_generate.id_kode','employee.int_emp_status')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        //status pernikahan
        // $bank = Karyawan::select('employee.*',
        //         'bank_list.nama_bank as bank',
        //         )
        //         ->leftJoin('bank_list', 'bank_list.id', 'employee.int_name_bank')
        //         ->where('employee.int_emp_id','=',$id)
        //         ->get();
        $directorate = Karyawan::select('employee.*',
                'directorate.directorate_name as directorate_name',
                )
                ->leftjoin('directorate','directorate.directorate_id','employee.int_emp_directorate')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        $div = Karyawan::select('employee.*',
                'division.division_name as division_name'
                )
                ->leftjoin('division','division.division_id','employee.int_emp_division')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        $dept = Karyawan::select('employee.*',
                'department.department_name as department_name'
                )
                ->leftjoin('department','department.department_id','employee.int_emp_department')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        $position = Karyawan::select('employee.*',
                'position.position_name as position_name',
                )
                ->leftjoin('position','position.position_id','employee.int_emp_position')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        $awal = date("Y-m-d");
        return view('HalamanDepan.detail-data-karyawan',compact('peg', 'peg2', 'awal', 'kode_generate' , 'div', 'dept', 'directorate', 'position'));
   }

   public function getCntr()
    {
        $cntr = DB::table('marital_status')->pluck("marital_status","id");
        return view('HalamanDepan.edit-data-karyawan',compact('cntr'));
    }

    public function getSts($id) 
    {        
        $sts = DB::table("pajak")->where("marital",$id)->pluck("jenis_pajak");
        return json_encode($sts);
    }

   public function editdatakaryawan($id){
       $karyawans = Karyawan::findorfail($id);
       $provinces_list = DB::table('indonesia_provinces')->get();
       $cities_list = DB::table('indonesia_cities')->get();
       $districts_list = DB::table('indonesia_districts')->get();
       $villages_list = DB::table('indonesia_villages')->get();
       $marital = DB::table('marital_status')->get();
       $pajak = DB::table('pajak')->get();
       $bank = DB::table('bank_list')->get();
       $bankis = DB::table('bank_list')->pluck("nama_bank","id");
       $coa = DB::table('coa')->pluck("name_coa", "id");
       $bank_swift = DB::table('bank_swift')->pluck("swift", "bank");
       $directorates = DB::table('directorate')->get();
       $divisions = DB::table('division')->get();
       $countries = DB::table('marital_status')->pluck("marital_status","id");

       // $worklength = karyawan::first()->getWorkLength();
       $peg = Karyawan::select('employee.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village',
                'marital_status.marital_status as marital',
                'pajak.jenis_pajak as pajak',
                'bank_list.nama_bank as bank_list',
                'bank_swift.swift as bank_swift',
                'coa.name_coa as coa'
                )
                ->leftjoin('indonesia_villages','indonesia_villages.id','employee.int_emp_villages1')
                ->leftjoin('indonesia_districts','indonesia_districts.id','employee.int_emp_districts1')
                ->leftjoin('indonesia_cities','indonesia_cities.id','employee.int_emp_regencies1')
                ->leftjoin('indonesia_provinces','indonesia_provinces.id','employee.int_emp_provinces1')
                ->leftJoin('marital_status', 'marital_status.id', 'employee.int_emp_marital')
                ->leftJoin('pajak', 'pajak.id', 'employee.int_emp_tax_cat')
                ->leftJoin('bank_list', 'bank_list.id', 'employee.int_name_bank')
                ->leftJoin('bank_swift', 'bank_swift.id', 'employee.int_emp_bankswift')
                ->leftJoin('coa', 'coa.id', 'employee.int_emp_coa')
                ->where('employee.int_emp_id','=',$id)
                ->get();

       $provinces_list2 = DB::table('indonesia_provinces')->get();
       $cities_list2 = DB::table('indonesia_cities')->get();
       $districts_list2 = DB::table('indonesia_districts')->get();
       $villages_list2 = DB::table('indonesia_villages')->get();
       $peg2 = Karyawan::select('employee.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village'
                )
                ->leftjoin('indonesia_villages','indonesia_villages.id','employee.int_emp_villages2')
                ->leftjoin('indonesia_districts','indonesia_districts.id','employee.int_emp_districts2')
                ->leftjoin('indonesia_cities','indonesia_cities.id','employee.int_emp_regencies2')
                ->leftjoin('indonesia_provinces','indonesia_provinces.id','employee.int_emp_provinces2')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        $kode_generate = Karyawan::select('employee.*',
                'kode_generate.keterangan_kode as keterangan_kode',
                )
                ->leftjoin('kode_generate','kode_generate.id_kode','employee.int_emp_status')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        $kode_generates = Kode_generate::all();
        $direct = Karyawan::select('employee.*',
                'directorate.directorate_name as directorate_name',
                )
                ->leftjoin('directorate','directorate.directorate_id','employee.int_emp_directorate')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        //status pernikahan
        $marital = Karyawan::select('employee.*',
                'marital_status.marital_status as marital',
                )
                ->leftJoin('marital_status', 'marital_status.id', 'employee.int_emp_marital')
                ->where('employee.int_emp_id','=',$id)
                ->get();
        $marital = Karyawan::select('employee.*',
                'coa.name_coa as coa',
                )
                ->leftJoin('coa', 'coa.id', 'employee.int_emp_coa')
                ->where('employee.int_emp_id','=',$id)
                ->get();        
        $pajak = Karyawan::select('employee.*',
                'pajak.jenis_pajak as pajak',
                )
                ->leftJoin('pajak', 'pajak.id', 'employee.int_emp_tax_cat')
                ->where('employee.int_emp_id','=',$id)
                ->get();
       $directorates = Directorate::all(); 
       $div = Karyawan::select('employee.*',
                'division.division_name as division_name'
                )
                ->leftjoin('division','division.division_id','employee.int_emp_division')
                ->where('employee.int_emp_id','=',$id)
                ->get();
       $divisions = Division::all();
       $dept = Karyawan::select('employee.*',
                'department.department_name as department_name'
                )
                ->leftjoin('department','department.department_id','employee.int_emp_department')
                ->where('employee.int_emp_id','=',$id)
                ->get();
       $departments = Department::all();
       $position = Karyawan::select('employee.*',
                'position.position_name as position_name',
                )
                ->leftjoin('position','position.position_id','employee.int_emp_position')
                ->where('employee.int_emp_id','=',$id)
                ->get();
       $positions = Position::all();
       return view('HalamanDepan.edit-data-karyawan',compact('karyawans', 'provinces_list', 'cities_list', 'pajak',
       'districts_list', 'villages_list', 'peg', 'provinces_list2', 'cities_list2', 'districts_list2', 
       'cities_list2', 'peg2', 'kode_generate' , 'kode_generates' ,'direct' , 'directorates' ,'div', 'divisions', 
       'dept', 'departments', 'position', 'positions', 'countries', 'marital', 'bank', 'bankis', 'coa'));
   }

   public function proses_update(Request $request, $id)
   {
    //    dd($request->all());
        $this->validate(
        $request,
        [
             // 'int_emp_status' => 'required',
            // 'int_emp_number' => 'required',
            'int_emp_name' => 'required',
            'int_emp_pref_name' => 'required',
            'int_emp_gender' => 'required',
            'int_emp_marital' => 'required',
            'int_emp_religion' => 'required',
            'int_emp_tax_cat' => 'required',
            'int_emp_dob' => 'required',
            'int_emp_nation' => 'required',
            'int_emp_ktp' => 'required|min:16',
            'int_emp_add1' => 'required',
            'int_emp_provinces1' => 'required',
            'int_emp_regencies1' => 'required',
            'int_emp_districts1' => 'required',
            'int_emp_villages1' => 'required',
            'int_emp_kode_pos1' => 'required',
            'int_emp_add2' => 'required',
            'int_emp_provinces2' => 'required',
            'int_emp_regencies2' => 'required',
            'int_emp_districts2' => 'required',
            'int_emp_villages2' => 'required',
            'int_emp_kode_pos2' => 'required',
            'int_emp_email' => 'required',
            'int_emp_email_nap' => 'required',
            'int_emp_joindate' => 'required',
            'int_emp_location' => 'required',
            'int_emp_subregion' => 'required',
            'int_emp_coa' => 'required',
            'int_emp_directorate' => 'required',
            'int_emp_division' => 'required',
            'int_emp_department' => 'required',
            'int_emp_position' => 'required',
            'int_emp_workday' => 'required',
            'int_name_bank' => 'required',
            'int_emp_accountno' => 'required',
            'int_emp_accountname' => 'required',
            'int_emp_bankswift' => 'required',
            'int_emp_bankbranch' => 'required',
            'int_emp_taxid' => 'required',
            'int_emp_taxadd' => 'required',
            'int_emp_bpjstk' => 'required',
            'int_emp_bpjsk' => 'required',
            // 'int_emp_resigndate' => 'required',
            'int_emp_phone_home' => 'required',
            'int_emp_phone_mobile' => 'required',
            // 'int_emp_worklength' => 'required',
            'int_emp_level' => 'required',
            'int_emp_vehicle' => 'required',
            'int_emp_transtype' => 'required',
            'int_emp_reportline' => 'required',
            'int_emp_regisnpwp' => 'required',
            'int_emp_statuss' => 'required'
        ],
        [
            // 'int_emp_status.required' => 'Status Karyawan harus diisi.',
            // 'int_emp_number.required' => 'Nomor Karyawan harus diisi.',
            'int_emp_name.required' => 'Nama Karyawan harus diisi.',
            'int_emp_pref_name.required' => 'Nama Panggilan harus diisi.',
            'int_emp_gender.required' => 'Jenis Kelamin harus diisi.',
            'int_emp_marital.required' => 'Status Pernikahan harus diisi.',
            'int_emp_religion.required' => 'Agama harus diisi.',
            'int_emp_tax_cat.required' => 'Kategori Pajak harus diisi.',
            'int_emp_dob.required' => 'Tanggal Lahir harus diisi.',
            'int_emp_nation.required' => 'Kebangsaan harus diisi.',
            'int_emp_ktp.required' => 'KTP harus diisi.',
            'int_emp_ktp.min' => 'KTP kurang dari 16 digit, Silahkan dicek kembali.',
            'int_emp_add1.required' => 'Alamat berdasarkan KTP harus diisi.',
            'int_emp_provinces1.required' => 'Provinsi berdasarkan KTP harus diisi.',
            'int_emp_regencies1.required' => 'Kota berdasarkan KTP harus diisi.',
            'int_emp_districts1.required' => 'Kecamatan berdasarkan KTP harus diisi.',
            'int_emp_villages1.required' => 'Kelurahan berdasarkan KTP harus diisi.',
            'int_emp_kode_pos1.required' => 'Kode Pos berdasarkan KTP harus diisi.',
            'int_emp_add2.required' => 'Alamat saat ini harus diisi.',
            'int_emp_provinces2.required' => 'Provinsi saat ini harus diisi.',
            'int_emp_regencies2.required' => 'Kota saat ini harus diisi.',
            'int_emp_districts2.required' => 'Kecamatan saat ini harus diisi.',
            'int_emp_villages2.required' => 'Kelurahan saat ini harus diisi.',
            'int_emp_kode_pos2.required' => 'Kode Pos saat ini harus diisi.',
            'int_emp_email.required' => 'Email Pribadi harus diisi.',
            'int_emp_email_nap.required' => 'Email NAP harus diisi.',
            'int_emp_joindate.required' => 'Bergabung tanggal harus diisi.',
            'int_emp_location.required' => 'Lokasi harus diisi.',
            'int_emp_subregion.required' => 'Sub Region harus diisi.',
            'int_emp_coa.required' => 'COA harus diisi.',
            'int_emp_directorate.required' => 'Direktorat harus diisi.',
            'int_emp_division.required' => 'Divisi harus diisi.',
            'int_emp_department.required' => 'Departemen harus diisi.',
            'int_emp_position.required' => 'Posisi harus diisi.',
            'int_emp_workday.required' => 'Hari Kerja harus diisi.',
            'int_emp_accountno.required' => 'Nomor Rekening harus diisi.',
            'int_emp_accountname.required' => 'Nama Akun harus diisi.',
            'int_emp_bankswift.required' => 'Bank Swift harus diisi.',
            'int_emp_bankbranch.required' => 'Bank Branch harus diisi.',
            'int_emp_taxid.required' => 'ID Pajak harus diisi.',
            'int_emp_taxadd.required' => 'Alamat Pajak harus diisi.',
            'int_emp_bpjstk.required' => 'BPJS Ketenagakerjaan harus diisi.',
            'int_emp_bpjsk.required' => 'BPJS Kesehatan harus diisi.',
            'int_name_bank.required' => 'Nama Bank harus diisi.',
            // 'int_emp_resigndate.required' => 'Tanggal Resign harus diisi.',
            'int_emp_phone_home.required' => 'No Telephone harus diisi.',
            'int_emp_phone_mobile.required' => 'No Handphone harus diisi.',
            // 'int_emp_worklength.required' => 'Lama Kerja harus diisi.',
            'int_emp_level.required' => 'Level harus diisi.',
            'int_emp_vehicle.required' => 'Kendaraan harus diisi.',
            'int_emp_transtype.required' => 'Type Transportasi harus diisi.',
            'int_emp_reportline.required' => 'Report Line harus diisi.',
            'int_emp_regisnpwp.required' => 'NPWP Terdaftar harus diisi.',
            'int_emp_statuss.required' => 'Status harus diisi.'
        ]
    );
    
       DB::table('employee')->where('int_emp_id', $id)->update([
            // 'int_emp_status' => $request->int_emp_status,
            // 'int_emp_number' => $request->int_emp_number,
            'int_emp_name' => $request->int_emp_name,
            'int_emp_pref_name' => $request->int_emp_pref_name,
            'int_emp_gender' => $request->int_emp_gender,
            'int_emp_marital' => $request->int_emp_marital,
            'int_emp_religion' => $request->int_emp_religion,
            'int_emp_tax_cat' => $request->int_emp_tax_cat,
            'int_emp_dob' => $request->int_emp_dob,
            'int_emp_nation' => $request->int_emp_nation,
            'int_emp_ktp' => $request->int_emp_ktp,
            'int_emp_add1' => $request->int_emp_add1,
            'int_emp_provinces1' => $request->int_emp_provinces1,
            'int_emp_regencies1' => $request->int_emp_regencies1,
            'int_emp_districts1' => $request->int_emp_districts1,
            'int_emp_villages1' => $request->int_emp_villages1,
            'int_emp_kode_pos1' => $request->int_emp_kode_pos1,
            'int_emp_add2' => $request->int_emp_add2,
            'int_emp_provinces2' => $request->int_emp_provinces2,
            'int_emp_regencies2' => $request->int_emp_regencies2,
            'int_emp_districts2' => $request->int_emp_districts2,
            'int_emp_villages2' => $request->int_emp_villages2,
            'int_emp_kode_pos2' => $request->int_emp_kode_pos2,
            'int_emp_email' => $request->int_emp_email,
            'int_emp_email_nap' => $request->int_emp_email_nap,
            'int_emp_joindate' => $request->int_emp_joindate,
            'int_emp_location' => $request->int_emp_location,
            'int_emp_subregion' => $request->int_emp_subregion,
            'int_emp_coa' => $request->int_emp_coa,
            'int_emp_directorate' => $request->int_emp_directorate,
            'int_emp_division' => $request->int_emp_division,
            'int_emp_department' => $request->int_emp_department,
            'int_emp_position' => $request->int_emp_position,
            'int_emp_workday' => $request->int_emp_workday,
            'int_name_bank' => $request->int_name_bank,
            'int_emp_accountno' => $request->int_emp_accountno,
            'int_emp_accountname' => $request->int_emp_accountname,
            'int_emp_bankswift' => $request->int_emp_bankswift,
            'int_emp_bankbranch' => $request->int_emp_bankbranch,
            'int_emp_taxid' => $request->int_emp_taxid,
            'int_emp_taxadd' => $request->int_emp_taxadd,
            'int_emp_bpjstk' => $request->int_emp_bpjstk,
            'int_emp_bpjsk' => $request->int_emp_bpjsk,
            'int_emp_resigndate' => $request->int_emp_resigndate,
            'int_emp_phone_home' => $request->int_emp_phone_home,
            'int_emp_phone_mobile' => $request->int_emp_phone_mobile,
            'int_emp_emergency_contact_name' => $request->int_emp_emergency_contact_name,
            'int_emp_relationship' => $request->int_emp_relationship,
            'int_emp_emergency_number' => $request->int_emp_emergency_number,
            // 'int_emp_worklength' => $request->int_emp_worklength,
            'int_emp_level' => $request->int_emp_level,
            'int_emp_vehicle' => $request->int_emp_vehicle,
            'int_emp_transtype' => $request->int_emp_transtype,
            'int_emp_reportline' => $request->int_emp_reportline,
            'int_emp_regisnpwp' => $request->int_emp_regisnpwp,
            'int_emp_statuss' => $request->int_emp_statuss
        ]);
        return redirect()->back()->with('success', 'Data Karyawan Berhasil di Update');;
    }


    public function proses_tambah(Request $request)
    {
        $this->validate(
            $request,
            [
                'int_emp_status' => 'required',
                // 'int_emp_number' => 'required',
                'int_emp_name' => 'required',
                'int_emp_pref_name' => 'required',
                'int_emp_gender' => 'required',
                'int_emp_marital' => 'required',
                'int_emp_religion' => 'required',
                'int_emp_tax_cat' => 'required',
                'int_emp_dob' => 'required',
                'int_emp_nation' => 'required',
                'int_emp_ktp' => 'required|unique:employee|min:16',
                'int_emp_add1' => 'required',
                'int_emp_provinces1' => 'required',
                'int_emp_regencies1' => 'required',
                'int_emp_districts1' => 'required',
                'int_emp_villages1' => 'required',
                'int_emp_kode_pos1' => 'required',
                'int_emp_add2' => 'required',
                'int_emp_provinces2' => 'required',
                'int_emp_regencies2' => 'required',
                'int_emp_districts2' => 'required',
                'int_emp_villages2' => 'required',
                'int_emp_kode_pos2' => 'required',
                'int_emp_email' => 'required',
                'int_emp_email_nap' => 'required',
                'int_emp_joindate' => 'required',
                'int_emp_location' => 'required',
                'int_emp_subregion' => 'required',
                'int_emp_coa' => 'required',
                'int_emp_directorate' => 'required',
                'int_emp_division' => 'required',
                'int_emp_department' => 'required',
                'int_emp_position' => 'required',
                'int_emp_workday' => 'required',
                'int_name_bank' => 'required',
                'int_emp_accountno' => 'required',
                'int_emp_accountname' => 'required',
                'int_emp_bankswift' => 'required',
                'int_emp_bankbranch' => 'required',
                'int_emp_taxid' => 'required',
                'int_emp_taxadd' => 'required',
                'int_emp_bpjstk' => 'required',
                'int_emp_bpjsk' => 'required',
                // 'int_emp_resigndate' => 'required',
                'int_emp_phone_home' => 'required',
                'int_emp_phone_mobile' => 'required',
                // 'int_emp_worklength' => 'required',
                'int_emp_level' => 'required',
                'int_emp_vehicle' => 'required',
                'int_emp_transtype' => 'required',
                'int_emp_reportline' => 'required',
                'int_emp_regisnpwp' => 'required',
                'int_emp_statuss' => 'required',
            ],
            [
                'int_emp_status.required' => 'Status Karyawan harus diisi.',
                'int_emp_number.required' => 'Nomor Karyawan harus diisi.',
                'int_emp_name.required' => 'Nama Karyawan harus diisi.',
                'int_emp_pref_name.required' => 'Nama Panggilan harus diisi.',
                'int_emp_gender.required' => 'Jenis Kelamin harus diisi.',
                'int_emp_marital.required' => 'Status Pernikahan harus diisi.',
                'int_emp_religion.required' => 'Agama harus diisi.',
                'int_emp_tax_cat.required' => 'Kategori Pajak harus diisi.',
                'int_emp_dob.required' => 'Tanggal Lahir harus diisi.',
                'int_emp_nation.required' => 'Kebangsaan harus diisi.',
                'int_emp_ktp.required' => 'KTP harus diisi.',
                'int_emp_ktp.unique' => 'Untuk nomor KTP yang anda input sudah terdaftar, Silahkan dicek kembali.',
                'int_emp_ktp.min' => 'KTP kurang dari 16 digit, Silahkan dicek kembali.',
                'int_emp_add1.required' => 'Alamat berdasarkan KTP harus diisi.',
                'int_emp_provinces1.required' => 'Provinsi berdasarkan KTP harus diisi.',
                'int_emp_regencies1.required' => 'Kota berdasarkan KTP harus diisi.',
                'int_emp_districts1.required' => 'Kecamatan berdasarkan KTP harus diisi.',
                'int_emp_villages1.required' => 'Kelurahan berdasarkan KTP harus diisi.',
                'int_emp_kode_pos1.required' => 'Kode Pos berdasarkan KTP harus diisi.',
                'int_emp_add2.required' => 'Alamat saat ini harus diisi.',
                'int_emp_provinces2.required' => 'Provinsi saat ini harus diisi.',
                'int_emp_regencies2.required' => 'Kota saat ini harus diisi.',
                'int_emp_districts2.required' => 'Kecamatan saat ini harus diisi.',
                'int_emp_villages2.required' => 'Kelurahan saat ini harus diisi.',
                'int_emp_kode_pos2.required' => 'Kode Pos saat ini harus diisi.',
                'int_emp_email.required' => 'Email Pribadi harus diisi.',
                'int_emp_email_nap.required' => 'Email NAP harus diisi.',
                'int_emp_joindate.required' => 'Bergabung tanggal harus diisi.',
                'int_emp_location.required' => 'Lokasi harus diisi.',
                'int_emp_subregion.required' => 'Sub Region harus diisi.',
                'int_emp_coa.required' => 'COA harus diisi.',
                'int_emp_directorate.required' => 'Direktorat harus diisi.',
                'int_emp_division.required' => 'Divisi harus diisi.',
                'int_emp_department.required' => 'Departemen harus diisi.',
                'int_emp_position.required' => 'Posisi harus diisi.',
                'int_emp_workday.required' => 'Hari Kerja harus diisi.',
                'int_emp_accountno.required' => 'Nomor Rekening harus diisi.',
                'int_emp_accountname.required' => 'Nama Akun harus diisi.',
                'int_emp_bankswift.required' => 'Bank Swift harus diisi.',
                'int_emp_bankbranch.required' => 'Bank Branch harus diisi.',
                'int_emp_taxid.required' => 'ID Pajak harus diisi.',
                'int_emp_taxadd.required' => 'Alamat Pajak harus diisi.',
                'int_emp_bpjstk.required' => 'BPJS Ketenagakerjaan harus diisi.',
                'int_name_bank.required' => 'Nama Bank Ketenagakerjaan harus diisi.',
                'int_emp_bpjsk.required' => 'BPJS Kesehatan harus diisi.',
                // 'int_emp_resigndate.required' => 'Tanggal Resign harus diisi.',
                'int_emp_phone_home.required' => 'No Telephone harus diisi.',
                'int_emp_phone_mobile.required' => 'No Handphone harus diisi.',
                // 'int_emp_worklength.required' => 'Lama Kerja harus diisi.',
                'int_emp_level.required' => 'Level harus diisi.',
                'int_emp_vehicle.required' => 'Kendaraan harus diisi.',
                'int_emp_transtype.required' => 'Type Transportasi harus diisi.',
                'int_emp_reportline.required' => 'Report Line harus di isi.',
                'int_emp_regisnpwp.required' => 'NPWP Terdaftar harus di isi.',
                'int_emp_statuss.required' => 'Status harus diisi.'
            ]
        );
        $test = Karyawan::kode($request->int_emp_status);
        
        $postData = $request->all();
        
        Karyawan::create([
                'int_emp_status' => $request->int_emp_status,
                'int_emp_number' => $test,
                'int_emp_name' => $request->int_emp_name,
                'int_emp_pref_name' => $request->int_emp_pref_name,
                'int_emp_gender' => $request->int_emp_gender,
                'int_emp_marital' => $request->int_emp_marital,
                'int_emp_religion' => $request->int_emp_religion,
                'int_emp_tax_cat' => $request->int_emp_tax_cat,
                'int_emp_dob' => $request->int_emp_dob,
                'int_emp_nation' => $request->int_emp_nation,
                'int_emp_ktp' => $request->int_emp_ktp,
                'int_emp_add1' => $request->int_emp_add1,
                'int_emp_provinces1' => $request->int_emp_provinces1,
                'int_emp_regencies1' => $request->int_emp_regencies1,
                'int_emp_districts1' => $request->int_emp_districts1,
                'int_emp_villages1' => $request->int_emp_villages1,
                'int_emp_kode_pos1' => $request->int_emp_kode_pos1,
                'int_emp_add2' => $request->int_emp_add2,
                'int_emp_provinces2' => $request->int_emp_provinces2,
                'int_emp_regencies2' => $request->int_emp_regencies2,
                'int_emp_districts2' => $request->int_emp_districts2,
                'int_emp_villages2' => $request->int_emp_villages2,
                'int_emp_kode_pos2' => $request->int_emp_kode_pos2,
                'int_emp_email' => $request->int_emp_email,
                'int_emp_email_nap' => $request->int_emp_email_nap,
                'int_emp_joindate' => $request->int_emp_joindate,
                'int_emp_location' => $request->int_emp_location,
                'int_emp_subregion' => $request->int_emp_subregion,
                'int_emp_coa' => $request->int_emp_coa,
                'int_emp_directorate' => $request->int_emp_directorate,
                'int_emp_division' => $request->int_emp_division,
                'int_emp_department' => $request->int_emp_department,
                'int_emp_position' => $request->int_emp_position,
                'int_emp_workday' => $request->int_emp_workday,
                'int_name_bank' => $request->int_name_bank,
                'int_emp_accountno' => $request->int_emp_accountno,
                'int_emp_accountname' => $request->int_emp_accountname,
                'int_emp_bankswift' => $request->int_emp_bankswift,
                'int_emp_bankbranch' => $request->int_emp_bankbranch,
                'int_emp_taxid' => $request->int_emp_taxid,
                'int_emp_taxadd' => $request->int_emp_taxadd,
                'int_emp_bpjstk' => $request->int_emp_bpjstk,
                'int_emp_bpjsk' => $request->int_emp_bpjsk,
                'int_emp_resigndate' => $request->int_emp_resigndate,
                'int_emp_phone_home' => $request->int_emp_phone_home,
                'int_emp_phone_mobile' => $request->int_emp_phone_mobile,
                'int_emp_emergency_contact_name' => $request->int_emp_emergency_contact_name,
                'int_emp_relationship' => $request->int_emp_relationship,
                'int_emp_emergency_number' => $request->int_emp_emergency_number,
                'int_emp_worklength' => $request->int_emp_worklength,
                'int_emp_level' => $request->int_emp_level,
                'int_emp_vehicle' => $request->int_emp_vehicle,
                'int_emp_transtype' => $request->int_emp_transtype,
                'int_emp_reportline' => $request->int_emp_reportline,
                'int_emp_regisnpwp' => $request->int_emp_regisnpwp,
                'int_emp_statuss' => $request->int_emp_statuss
                
        ]);
        
        return redirect()->back()->with('success', 'Data Karyawan Berhasil di Tambah');;
    }

    public function importFormkaryawan()
    {
        return view('HalamanDepan.data-karyawan');
    }

    public function importkaryawan(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ],
        [
            'file.required' => 'File belum diimport, silahkan dicek kembali.',
            'file.mimes' => 'Type format file dalam bentuk .xlsx',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            $data = Excel::toArray(new KaryawanImport, $file); //IMPORT FILE
            $i = 0;
            foreach($data as $key => $value1){     // Looping Baris
                foreach($value1 as $key => $value2){ // Looping Column
                    if ($i > 0){
                        $kodeNum = DB::table('kode_generate')->where('nama_kode', '=', $value2[0])->first();
                        $test = Karyawan::kode($kodeNum->id_kode);
                        Karyawan::create([
                                'int_emp_status' => $kodeNum->id_kode,
                                'int_emp_number' => $test,
                                'int_emp_name' => $value2[2],
                                'int_emp_pref_name' => $value2[3],
                                'int_emp_gender' => $value2[4],
                                'int_emp_marital' => $value2[5],
                                'int_emp_religion' => $value2[6],
                                'int_emp_tax_cat' => $value2[7],
                                'int_emp_dob' => Date::excelToDateTimeObject($value2[8]),
                                'int_emp_nation' => $value2[9],
                                'int_emp_ktp' => $value2[10],
                                'int_emp_add1' => $value2[11],
                                'int_emp_provinces1' => $value2[12],
                                'int_emp_regencies1' => $value2[13],
                                'int_emp_districts1' => $value2[14],
                                'int_emp_villages1' => $value2[15],
                                'int_emp_kode_pos1' => $value2[16],
                                'int_emp_add2' => $value2[17],
                                'int_emp_provinces2' => $value2[18],
                                'int_emp_regencies2' => $value2[19],
                                'int_emp_districts2' => $value2[20],
                                'int_emp_villages2' => $value2[21],
                                'int_emp_kode_pos2' => $value2[22],
                                'int_emp_email' => $value2[23],
                                'int_emp_email_nap' => $value2[24],
                                'int_emp_joindate' => Date::excelToDateTimeObject($value2[25]),
                                'int_emp_location' => $value2[26],
                                'int_emp_subregion' => $value2[27],
                                'int_emp_coa' => $value2[28],
                                'int_emp_directorate' => $value2[29],
                                'int_emp_division' => $value2[30],
                                'int_emp_department' => $value2[31],
                                'int_emp_position' => $value2[32],
                                'int_emp_workday' => $value2[33],
                                'int_emp_accountno' => $value2[34],
                                'int_emp_accountname' => $value2[35],
                                'int_name_bank' => $value2[36],
                                'int_emp_bankswift' => $value2[37],
                                'int_emp_bankbranch' => $value2[38],
                                'int_emp_taxid' =>  $value2[39],
                                'int_emp_taxadd' =>  $value2[40],
                                'int_emp_bpjstk' =>  $value2[41],
                                'int_emp_bpjsk' =>  $value2[42],
                                'int_emp_resigndate' => $value2[43],
                                'int_emp_phone_home' => $value2[44],
                                'int_emp_phone_mobile' => $value2[45],
                                'int_emp_emergency_contact_name' => $value2[45],
                                'int_emp_relationship' => $value2[47],
                                'int_emp_emergency_number' => $value2[48],
                                'int_emp_worklength' =>  $value2[49],
                                'int_emp_level' =>  $value2[50],
                                'int_emp_vehicle' =>  $value2[51],
                                'int_emp_transtype' =>  $value2[52],
                                'int_emp_reportline' =>  $value2[53],
                                'int_emp_regisnpwp' => $value2[54],
                                'int_emp_statuss' => $value2[55]
                                
                        ]);
                    }
                    $i++;
                }
            }   
            return redirect()->back()->with('success', 'Data karyawan berhasil di Import');  
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}

