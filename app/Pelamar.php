<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pelamar extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = "pelamar";

    protected $fillable = [
        'nama_depan', 'nama_belakang', 'no_ktp', 'email', 'jenis_kelamin', 'tgl_lahir',
        'no_tlp', 'no_hp', 'informasi', 'job_title', 'alamat', 'provinces', 'regencies', 'districts', 'villages', 'kode_pos',
        'alamat2', 'provinces2', 'regencies2', 'districts2', 'villages2', 'kode_pos2',
        'pendidikan_terakhir', 'universitas', 'jurusan', 'ipk', 'pengalaman', 'file_cv', 'file_ktp', 'file_npwp',
        'file_bpjs_ketenagakerjaan', 'file_bpjs_kesehatan', 'file_transkrip_nilai', 'file_ijazah',
        'file_surat_keterangan_kerja', 'file_kartu_keluarga', 'foto', 'file_buku_nikah'
    ];

    public function getTglLahir()
    {
        return Carbon::parse($this->attributes['tgl_lahir'])
            ->translatedFormat('l, d F Y');
    }
}
