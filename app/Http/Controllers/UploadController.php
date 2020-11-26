<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gambar;
use DB;

class UploadController extends Controller
{
    //  

    function index()
    {
        $provinces_list = DB::table('indonesia_provinces')->get();
        // return $provinces_list;
        return view('upload')->with('provinces_list', $provinces_list);
    }

    function regencies(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('indonesia_cities')
            ->where('province_id', $value)
            ->get();
        $output = '<option value="">Pilih Kota</option>';
        foreach ($data as $row) {
            // var_dump($row->name);
            $output .= '<option value="' . $row->name . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }

    function districts(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('indonesia_districts')
            ->where('city_id', $value)
            ->get();
        $output = '<option value="">Pilih Kecamatan</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->name . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }

    function villages(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('indonesia_villages')
            ->where('district_id', $value)
            ->get();
        $output = '<option value="">Pilih Kelurahan</option>';
        // return $data;
        foreach ($data as $row) {
            $output .= '<option value="' . $row->name . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }

    public function upload()
    {
        $gambar = Gambar::leftJoin('indonesia_villages', 'indonesia_villages.id', 'gambar.villages')
            ->leftJoin('indonesia_districts', 'indonesia_districts.id', 'gambar.districts')
            ->leftJoin('indonesia_cities', 'indonesia_cities.id', 'gambar.regencies')
            ->leftJoin('indonesia_provinces', 'indonesia_provinces.id', 'gambar.provinces')
            // ->join('indonesia_districts', 'indonesia_districts.id', 'indonesia_villages.district_id')
            // ->join('indonesia_cities', 'indonesia_cities.id', 'indonesia_districts.city_id')
            // ->join('indonesia_provinces', 'indonesia_provinces.id', 'indonesia_cities.province_id')


            ->select(
                'gambar.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village'
            )
            ->get();
        //return view('data', ['gambar' => $gambar]);
        return view('HalamanDepan.data-pelamar', ['gambar' => $gambar]);
    }

    public function detail($id){
        //echo $id;
        $peg = Gambar::findorfail($id);
        return view('detail_data',compact('peg'));
    }

    public function berandaUtama(){
        return view('HalamanDepan.beranda-utama');   
    }

    public function berandaHC(){
        return view('HalamanDepan.beranda-hc');   
    }

    public function proses_upload(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'no_ktp' => 'required',
                'email' => 'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'no_tlp' => 'required',
                'no_hp' => 'required',
                'informasi' => 'required',
                'job_title' => 'required',
                'alamat' => 'required',
                'provinces' => 'required',
                'regencies' => 'required',
                'districts' => 'required',
                'villages' => 'required',
                'kode_pos' => 'required|min:5|max:5',
                'pendidikan_terakhir' => 'required',
                'universitas' => 'required',
                'jurusan' => 'required',
                'ipk' => 'required',
                'pengalaman' => 'required',
                'file_cv' => 'required|file|mimes:pdf|max:5000',
                'file_ktp' => 'required|file|mimes:pdf|max:5000',
                'file_npwp'  => 'required|file|mimes:pdf|max:5000',
                'file_bpjs_ketenagakerjaan' => 'required|file|mimes:pdf|max:5000',
                'file_bpjs_kesehatan' => 'required|file|mimes:pdf|max:5000',
                'file_transkrip_nilai'  => 'required|file|mimes:pdf|max:5000',
                'file_ijazah' => 'required|file|mimes:pdf|max:5000',
                'file_surat_keterangan_kerja' => 'required|file|mimes:pdf|max:5000',
                'file_kartu_keluarga'  => 'required|file|mimes:pdf|max:5000',
                'foto' => '|file|image|mimes:jpeg,png,jpg|max:5000',
                'file_buku_nikah'  => 'required|file|mimes:pdf|max:5000',
            ]
        );

        // Menyimpan data file yang di upload ke variabel $file
        $file1 = $request->file('file_cv');
        $file2 = $request->file('file_ktp');
        $file3 = $request->file('file_npwp');
        $file4 = $request->file('file_bpjs_ketenagakerjaan');
        $file5 = $request->file('file_bpjs_kesehatan');
        $file6 = $request->file('file_transkrip_nilai');
        $file7 = $request->file('file_ijazah');
        $file8 = $request->file('file_surat_keterangan_kerja');
        $file9 = $request->file('file_kartu_keluarga');
        $file10 = $request->file('foto');
        $file11 = $request->file('file_buku_nikah');


        $nama_file1 = time() . "_" . $file1->getClientOriginalName();
        $nama_file2 = time() . "_" . $file2->getClientOriginalName();
        $nama_file3 = time() . "_" . $file3->getClientOriginalName();
        $nama_file4 = time() . "_" . $file4->getClientOriginalName();
        $nama_file5 = time() . "_" . $file5->getClientOriginalName();
        $nama_file6 = time() . "_" . $file6->getClientOriginalName();
        $nama_file7 = time() . "_" . $file7->getClientOriginalName();
        $nama_file8 = time() . "_" . $file8->getClientOriginalName();
        $nama_file9 = time() . "_" . $file9->getClientOriginalName();
        $nama_file10 = time() . "_" . $file10->getClientOriginalName();
        $nama_file11 = time() . "_" . $file11->getClientOriginalName();

        // nama file
        echo 'File Name: ' . $file1->getClientOriginalName();
        echo '<br>';

        // ekstensi file
        echo 'File Extension: ' . $file1->getClientOriginalExtension();
        echo '<br>';

        // real path
        echo 'File Real Path: ' . $file1->getRealPath();
        echo '<br>';

        // ukuran file
        echo 'File Size: ' . $file1->getSize();
        echo '<br>';

        // tipe mime
        echo 'File Mime Type: ' . $file1->getMimeType();

        // isi dengan nama folder kemana akan di upload
        $tujuan_upload = 'data_file';
        $file1->move($tujuan_upload, $nama_file1);
        $file2->move($tujuan_upload, $nama_file2);
        $file3->move($tujuan_upload, $nama_file3);
        $file4->move($tujuan_upload, $nama_file4);
        $file5->move($tujuan_upload, $nama_file5);
        $file6->move($tujuan_upload, $nama_file6);
        $file7->move($tujuan_upload, $nama_file7);
        $file8->move($tujuan_upload, $nama_file8);
        $file9->move($tujuan_upload, $nama_file9);
        $file10->move($tujuan_upload, $nama_file10);
        $file11->move($tujuan_upload, $nama_file11);

        Gambar::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' =>  $request->nama_belakang,
            'no_ktp' => $request->no_ktp,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'no_tlp' => $request->no_tlp,
            'no_hp' => $request->no_hp,
            'informasi' =>  $request->informasi,
            'job_title' => $request->job_title,
            'alamat' => $request->alamat,
            'provinces' => $request->provinces,
            'regencies' => $request->regencies,
            'districts' => $request->districts,
            'villages' => $request->villages,
            'kode_pos' => $request->kode_pos,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
            'ipk' => $request->ipk,
            'pengalaman' => $request->pengalaman,
            'file_cv' => $nama_file1,
            'file_ktp' => $nama_file2,
            'file_npwp' => $nama_file3,
            'file_bpjs_ketenagakerjaan' => $nama_file4,
            'file_bpjs_kesehatan' => $nama_file5,
            'file_transkrip_nilai' => $nama_file6,
            'file_ijazah' => $nama_file7,
            'file_surat_keterangan_kerja' => $nama_file8,
            'file_kartu_keluarga' => $nama_file9,
            'foto' => $nama_file10,
            'file_buku_nikah' => $nama_file11
        ]);
        return redirect()->back();

        // upload file
        $file1->move($tujuan_upload, $file1->getClientOriginalName());
        $file2->move($tujuan_upload, $file2->getClientOriginalName());
        $file3->move($tujuan_upload, $file3->getClientOriginalName());
        $file4->move($tujuan_upload, $file4->getClientOriginalName());
        $file5->move($tujuan_upload, $file5->getClientOriginalName());
        $file6->move($tujuan_upload, $file6->getClientOriginalName());
        $file7->move($tujuan_upload, $file7->getClientOriginalName());
        $file8->move($tujuan_upload, $file8->getClientOriginalName());
        $file9->move($tujuan_upload, $file9->getClientOriginalName());
        $file10->move($tujuan_upload, $file10->getClientOriginalName());
        $file11->move($tujuan_upload, $file11->getClientOriginalName());
    }
}
