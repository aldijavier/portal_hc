<?php

namespace App;

use App\Kode_generate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;
use DateTime;

class Karyawan extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "employee";
    protected $primaryKey = "int_emp_id";
    public $timestamps = false;
    public $incrementing = false;
 
    protected $fillable = [
        'int_emp_status', 
        'int_emp_number', 
        'int_emp_name', 
        'int_emp_pref_name', 
        'int_emp_gender', 
        'int_emp_marital', 
        'int_emp_religion', 
        'int_emp_tax_cat', 
        'int_emp_dob', 
        'int_emp_nation', 
        'int_emp_ktp', 
        'int_emp_add1', 
        'int_emp_provinces1', 
        'int_emp_regencies1', 
        'int_emp_districts1', 
        'int_emp_villages1', 
        'int_emp_kode_pos1', 
        'int_emp_add2', 
        'int_emp_provinces2', 
        'int_emp_regencies2', 
        'int_emp_districts2', 
        'int_emp_villages2', 
        'int_emp_kode_pos2', 
        'int_emp_email', 
        'int_emp_email_nap', 
        'int_emp_joindate', 
        'int_emp_location', 
        'int_emp_subregion', 
        'int_emp_coa', 
        'int_emp_directorate', 
        'int_emp_division', 
        'int_emp_department', 
        'int_emp_position', 
        'int_emp_workday', 
        'int_emp_accountno', 
        'int_emp_accountname', 
        'int_emp_bankswift', 
        'int_emp_bankbranch', 
        'int_emp_taxid', 
        'int_emp_taxadd', 
        'int_emp_bpjstk', 
        'int_emp_bpjsk', 
        'int_emp_resigndate', 
        'int_emp_phone_home', 
        'int_emp_phone_mobile',
        'int_emp_emergency_contact_name',
        'int_emp_relationship',
        'int_emp_emergency_number', 
        'int_emp_worklength', 
        'int_emp_level', 
        'int_emp_vehicle', 
        'int_emp_transtype', 
        'int_emp_reportline', 
        'int_emp_regisnpwp', 
        'int_emp_statuss'
    ];

    public function department(){
        return $this->belongsToMany('Department', 'department_name');
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function getWorkLength(){
        if(empty($this->int_emp_resigndate)){
            return Carbon::parse($this->int_emp_joindate)->diff(Carbon::now())->format('%y tahun %m bulan %d hari');
        }else{
            return Carbon::parse($this->int_emp_joindate)->diff(Carbon::parse($this->int_emp_resigndate))->format('%y tahun %m bulan %d hari');
        }
        return null;
    }

    public static function kode(int $status)
    {
        $datakode = DB::table('employee')->where('int_emp_status','=', $status)->get();
       
        $addNol = '';
        $kodeNum = DB::table('kode_generate')->where('id_kode', '=', $status)->first();
    	
    	$kode = (int) $datakode->count() + 1;
        $incrementKode = $kode;
    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode) == 3) {
    		$addNol = "0";
    	}
        


    	$kodeBaru = $kodeNum->nama_kode.$addNol.$incrementKode;
    	return $kodeBaru;
    }
}
