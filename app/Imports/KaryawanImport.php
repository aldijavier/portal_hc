<?php

namespace App\Imports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class KaryawanImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new karyawan_napinfo([
    //         //
    //         dd($row),
    //         "int_emp_number" => $row["int_emp_number"],
    //         "int_emp_status" => $row["int_emp_status"],
    //         "int_emp_name" => $row["int_emp_name"],
    //         "int_emp_pref_name" => $row["int_emp_pref_name"],
    //         "int_emp_gender" => $row["int_emp_gender"], 
    //         "int_emp_marital" => $row["int_emp_marital"], 
    //         'int_emp_religion' => $row["int_emp_religion"], 
    //         "int_emp_tax_cat" => $row["int_emp_tax_cat"], 
    //         "int_emp_dob" => Date::excelToDateTimeObject($row["int_emp_dob"]), 
    //         "int_emp_nation" => $row["int_emp_nation"], 
    //         "int_emp_ktp" => $row["int_emp_ktp"], 
    //         "int_emp_add1" => $row["int_emp_add1"], 
    //         "int_emp_provinces1" => $row["int_emp_provinces1"], 
    //         "int_emp_regencies1" => $row["int_emp_regencies1"], 
    //         "int_emp_districts1" => $row["int_emp_districts1"], 
    //         "int_emp_villages1" => $row["int_emp_villages1"], 
    //         "int_emp_kode_pos1" => $row["int_emp_kode_pos1"], 
    //         "int_emp_add2" => $row["int_emp_add2"], 
    //         "int_emp_provinces2" => $row["int_emp_provinces2"], 
    //         "int_emp_regencies2" => $row["int_emp_regencies2"], 
    //         "int_emp_districts2" => $row["int_emp_districts2"], 
    //         "int_emp_villages2" => $row["int_emp_villages2"], 
    //         "int_emp_kode_pos2" => $row["int_emp_kode_pos2"], 
    //         "int_emp_email" => $row["int_emp_email"], 
    //         "int_emp_email_nap" => $row["int_emp_email_nap"], 
    //         "int_emp_joindate" => Date::excelToDateTimeObject($row["int_emp_joindate"])->format('Y-m-d'), 
    //         "int_emp_location" => $row["int_emp_location"], 
    //         "int_emp_subregion" => $row["int_emp_subregion"], 
    //         "int_emp_coa" => $row["int_emp_coa"], 
    //         "int_emp_directorate" => $row["int_emp_directorate"], 
    //         "int_emp_division" => $row["int_emp_division"], 
    //         "int_emp_department" => $row["int_emp_department"], 
    //         "int_emp_position" => $row["int_emp_position"], 
    //         "int_emp_workday" => $row["int_emp_workday"], 
    //         "int_emp_accountno" => $row["int_emp_accountno"], 
    //         "int_emp_accountname" => $row["int_emp_accountname"], 
    //         "int_emp_bankswift" => $row["int_emp_bankswift"], 
    //         "int_emp_bankbranch" => $row["int_emp_bankbranch"], 
    //         "int_emp_taxid" => $row["int_emp_taxid"], 
    //         "int_emp_taxadd" => $row["int_emp_taxadd"], 
    //         "int_emp_bpjstk" => $row["int_emp_bpjstk"], 
    //         "int_emp_bpjsk" => $row["int_emp_bpjsk"], 
    //         "int_emp_resigndate" => $row["int_emp_resigndate"], 
    //         "int_emp_phone_home" => $row["int_emp_phone_home"], 
    //         "int_emp_phone_mobile" => $row["int_emp_phone_mobile"],
    //         "int_emp_emergency_contact_name" => $row["int_emp_emergency_contact_name"], 
    //         "int_emp_relationship" => $row["int_emp_relationship"], 
    //         "int_emp_emergency_number" => $row["int_emp_emergency_number"], 
    //         "int_emp_worklength" => $row["int_emp_worklength"], 
    //         "int_emp_level" => $row["int_emp_level"],
    //         "int_emp_vehicle" => $row["int_emp_vehicle"], 
    //         "int_emp_transtype" => $row["int_emp_transtype"], 
    //         "int_emp_reportline" => $row["int_emp_reportline"], 
    //         "int_emp_regisnpwp" => $row["int_emp_regisnpwp"], 
    //         "int_emp_statuss" => $row["int_emp_statuss"]
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        
    }
}
