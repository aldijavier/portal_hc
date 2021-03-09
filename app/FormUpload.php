<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormUpload extends Model
{
    //
    protected $table = "form_uploads";

    protected $fillable = ['nama_perusahaan','jabatan','deskripsi_job', 
    'start_date', 'end_date', 'masih_aktif_bekerja'];

    protected $cats =
    [
        'nama_perusahaan' => 'array',
        'jabatan' => 'array',
        'deskripsi_job' => 'array',
        'start_date' => 'array',
        'end_date' => 'array',
        'masih_aktif_bekerja' => 'array'
    ];

    public function setNamaPerusahaanAttribute($value)
    {
        $this->attributes['nama_perusahaan'] = json_encode($value);
    }

    public function getNamaPerusahaanAttribute($value)
    {
        return $this->attributes['nama_perusahaan'] = json_decode($value);
    }

    public function setJabatanAttribute($value)
    {
        $this->attributes['jabatan'] = json_encode($value);
    }

    public function getJabatanAttribute($value)
    {
        return $this->attributes['jabatan'] = json_decode($value);
    }
    
    public function setDeskripsiJobAttribute($value)
    {
        $this->attributes['deskripsi_job'] = json_encode($value);
    }

    public function getDeskripsiJobAttribute($value)
    {
        return $this->attributes['deskripsi_job'] = json_decode($value);
    } 

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = json_encode($value);
    }

    public function getStartDateAttribute($value)
    {
        return $this->attributes['start_date'] = json_decode($value);
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = json_encode($value);
    }

    public function getEndDateAttribute($value)
    {
        return $this->attributes['end_date'] = json_decode($value);
    }

    public function setMasihAktifBekerjaAttribute($value)
    {
        $this->attributes['masih_aktif_bekerja'] = json_encode($value);
    }

    public function getMasihAktifBekerjaAttribute($value)
    {
        return $this->attributes['masih_aktif_bekerja'] = json_decode($value);
    } 
}
