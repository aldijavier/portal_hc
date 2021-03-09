<?php

namespace App\Exports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Karyawan2Export implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array{
        return[
        'Status Karyawan', 
        'Nomor Karyawan', 
        'Nama Karyawan', 
        'Nama Panggilan', 
        'Jenis Kelamin', 
        'Status Pernikahan', 
        'Agama', 
        'Kategori Pajak', 
        'Tanggal Lahir (Years/Month/Day)', 
        'Kebangsaan', 
        'KTP', 
        'Alamat berdasarkan KTP', 
        'Provinsi', 
        'Kota', 
        'Kecamatan', 
        'Kelurahan', 
        'Kode Pos', 
        'Alamat saat ini',
        'Provinsi', 
        'Kota', 
        'Kecamatan', 
        'Kelurahan', 
        'Kode Pos', 
        'Email Pribadi', 
        'Email NAP', 
        'Bergabung Tanggal', 
        'Lokasi', 
        'Subregion', 
        'COA', 
        'Direktorat', 
        'Divisi', 
        'Departemen', 
        'Posisi', 
        'Hari Kerja', 
        'Nomor Rekening', 
        'Nama Akun', 
        'Bank Swift', 
        'Bank Branch', 
        'ID Pajak / Tax ID', 
        'Alamat Pajak', 
        'BPJS Ketenagakerjaan', 
        'BPJS Kesehatan', 
        'Tanggal Resign', 
        'No Telephone', 
        'No Handphone',
        'Emergency Contact Name', 
        'Relationship with Employee',
        'Emergency Number', 
        'Level',
        'Kendaraan', 
        'Type Transportasi', 
        'Report Line', 
        'NPWP Terdaftar',
        'Status'
        ];
    }

    public function query()
    {
        // return Karyawan::query();
        // /*you can use condition in query to get required result
        //  return Karyawan::query()->where('int_emp_statuss', '0');
        return Karyawan::select(
            'kode_generate.nama_kode',
            'karyawan.int_emp_number',
            'karyawan.int_emp_name',
            'karyawan.int_emp_pref_name',
            'karyawan.int_emp_gender',
            'karyawan.int_emp_marital',
            'karyawan.int_emp_religion',
            'karyawan.int_emp_tax_cat',
            'karyawan.int_emp_dob',
            'karyawan.int_emp_nation',
            'karyawan.int_emp_ktp',
            'karyawan.int_emp_add1',
            'indonesia_provinces.name as province1',
            'indonesia_cities.name as city1',
            'indonesia_districts.name as district1',
            'indonesia_villages.name as village1',
            'karyawan.int_emp_kode_pos1',
            'karyawan.int_emp_add2',
            'provinces2.name as province2',
            'cities2.name as city2',
            'districts2.name as district2',
            'villages2.name as village2',
            'karyawan.int_emp_kode_pos2',
            'karyawan.int_emp_email',
            'karyawan.int_emp_email_nap',
            'karyawan.int_emp_joindate',
            'karyawan.int_emp_location',
            'karyawan.int_emp_subregion',
            'karyawan.int_emp_coa',
            'directorate.directorate_name',
            'division.division_name',
            'department.department_name',
            'position.position_name',
            'karyawan.int_emp_workday',
            'karyawan.int_emp_accountno',
            'karyawan.int_emp_accountname',
            'karyawan.int_emp_bankswift',
            'karyawan.int_emp_bankbranch',
            'karyawan.int_emp_taxid',
            'karyawan.int_emp_taxadd',
            'karyawan.int_emp_bpjstk',
            'karyawan.int_emp_bpjsk',
            'karyawan.int_emp_resigndate',
            'karyawan.int_emp_phone_home',
            'karyawan.int_emp_phone_mobile',
            'karyawan.int_emp_emergency_contact_name',
            'karyawan.int_emp_relationship',
            'karyawan.int_emp_emergency_number',
            'karyawan.int_emp_level',
            'karyawan.int_emp_vehicle',
            'karyawan.int_emp_transtype',
            'karyawan.int_emp_reportline',
            'karyawan.int_emp_regisnpwp',
            'karyawan.int_emp_statuss')
            ->leftJoin('kode_generate', 'kode_generate.id_kode', 'karyawan.int_emp_status')
            ->leftJoin('directorate', 'directorate.directorate_id', 'karyawan.int_emp_directorate')
            ->leftJoin('department', 'department.department_id', 'karyawan.int_emp_department')
            ->leftJoin('division', 'division.division_id', 'karyawan.int_emp_division')
            ->leftJoin('position', 'position.position_id', 'karyawan.int_emp_position')
            ->leftjoin('indonesia_villages','indonesia_villages.id','karyawan.int_emp_villages1')
            ->leftjoin('indonesia_districts','indonesia_districts.id','karyawan.int_emp_districts1')
            ->leftjoin('indonesia_cities','indonesia_cities.id','karyawan.int_emp_regencies1')
            ->leftjoin('indonesia_provinces','indonesia_provinces.id','karyawan.int_emp_provinces1')
            ->leftjoin('indonesia_provinces as provinces2','provinces2.id','karyawan.int_emp_provinces2')
            ->leftjoin('indonesia_cities as cities2','cities2.id','karyawan.int_emp_regencies2')
            ->leftjoin('indonesia_districts as districts2','districts2.id','karyawan.int_emp_districts2')
            ->leftjoin('indonesia_villages as villages2','villages2.id','karyawan.int_emp_villages2')
            ->where('int_emp_statuss', '2');
    }
    

    public function map($karyawan): array
    {
        return [
            $karyawan->int_emp_status,
            $karyawan->int_emp_number,
            $karyawan->int_emp_name,
            $karyawan->int_emp_pref_name,
            $karyawan->int_emp_gender,
            $karyawan->int_emp_marital,
            $karyawan->int_emp_religion,
            $karyawan->int_emp_tax_cat,
            $karyawan->int_emp_dob,
            $karyawan->int_emp_nation,
            $karyawan->int_emp_ktp,
            $karyawan->int_emp_add1,
            $karyawan->int_emp_provinces1,
            $karyawan->int_emp_regencies1,
            $karyawan->int_emp_districts1,
            $karyawan->int_emp_villages1,
            $karyawan->int_emp_kode_pos1,
            $karyawan->int_emp_add2,
            $karyawan->int_emp_provinces2,
            $karyawan->int_emp_regencies2,
            $karyawan->int_emp_districts2,
            $karyawan->int_emp_villages2,
            $karyawan->int_emp_kode_pos2,
            $karyawan->int_emp_email,
            $karyawan->int_emp_email_nap,
            $karyawan->int_emp_joindate,
            $karyawan->int_emp_location,
            $karyawan->int_emp_subregion,
            $karyawan->int_emp_coa,
            $karyawan->int_emp_directorate,
            $karyawan->int_emp_division,
            $karyawan->int_emp_department,
            $karyawan->int_emp_position,
            $karyawan->int_emp_workday,
            $karyawan->int_emp_accountno,
            $karyawan->int_emp_accountname,
            $karyawan->int_emp_bankswift,
            $karyawan->int_emp_bankbranch,
            $karyawan->int_emp_taxid,
            $karyawan->int_emp_taxadd,
            $karyawan->int_emp_bpjstk,
            $karyawan->int_emp_bpjsk,
            $karyawan->int_emp_resigndate,
            $karyawan->int_emp_phone_home,
            $karyawan->int_emp_phone_mobile,
            $karyawan->int_emp_emergency_contact_name,
            $karyawan->int_emp_relationship,
            $karyawan->int_emp_emergency_number,
            // $karyawan->int_emp_worklength,
            $karyawan->int_emp_level,
            $karyawan->int_emp_vehicle,
            $karyawan->int_emp_transtype,
            $karyawan->int_emp_reportline,
            $karyawan->int_emp_regisnpwp,
            $karyawan->int_emp_statuss
        ];
    }
}
