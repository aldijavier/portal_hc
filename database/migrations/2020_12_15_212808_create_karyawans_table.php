<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('int_emp_id');
            $table->string('int_emp_status');
            $table->string('int_emp_number');
            $table->string('int_emp_name');
            $table->string('int_emp_pref_name');
            $table->string('int_emp_gender');
            $table->string('int_emp_marital');
            $table->string('int_emp_religion');
            $table->string('int_emp_tax_cat');
            $table->datetime('int_emp_dob');
            $table->string('int_emp_nation');
            $table->string('int_emp_ktp');
            $table->string('int_emp_add1');
            $table->string('int_emp_provinces1');
            $table->string('int_emp_regencies1');
            $table->string('int_emp_districts1');
            $table->string('int_emp_villages1');
            $table->string('int_emp_kode_pos1');
            $table->string('int_emp_add2');
            $table->string('int_emp_provinces2');
            $table->string('int_emp_regencies2');
            $table->string('int_emp_districts2');
            $table->string('int_emp_villages2');
            $table->string('int_emp_kode_pos2');
            $table->string('int_emp_email');
            $table->string('int_emp_email_nap');
            $table->datetime('int_emp_joindate');
            $table->string('int_emp_location');
            $table->string('int_emp_subregion');
            $table->string('int_emp_coa');
            $table->string('int_emp_directorate');
            $table->string('int_emp_division');
            $table->string('int_emp_department');
            $table->string('int_emp_position');
            $table->string('int_emp_workday');
            $table->string('int_emp_accountno');
            $table->string('int_emp_accountname');
            $table->string('int_emp_bankswift');
            $table->string('int_emp_bankbranch');
            $table->string('int_emp_taxid');
            $table->string('int_emp_taxadd');
            $table->string('int_emp_bpjstk');
            $table->string('int_emp_bpjsk');
            $table->datetime('int_emp_resigndate');
            $table->string('int_emp_phone_home');
            $table->string('int_emp_phone_mobile');
            $table->string('int_emp_worklength');
            $table->string('int_emp_level');
            $table->string('int_emp_grading');
            $table->string('int_emp_vehicle');
            $table->string('int_emp_transtype');
            $table->string('int_emp_reportline');
            $table->string('int_emp_regisnpwp');
            $table->string('int_emp_statuss');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
