<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelamar;
use App\Karyawan;
use DB;
use Carbon\Carbon;

class UploadController extends Controller
{
    function index()
    {
        $provinces_list = DB::table('indonesia_provinces')->get();
        $provinces_list2 = DB::table('indonesia_provinces')->get();
        return view('upload')->with('provinces_list', $provinces_list)->with('provinces_list2', $provinces_list2);
    }

    public function upload()
    {
        $pelamar = Pelamar::leftJoin('indonesia_villages', 'indonesia_villages.id', 'pelamar.villages')
            ->leftJoin('indonesia_districts', 'indonesia_districts.id', 'pelamar.districts')
            ->leftJoin('indonesia_cities', 'indonesia_cities.id', 'pelamar.regencies')
            ->leftJoin('indonesia_provinces', 'indonesia_provinces.id', 'pelamar.provinces')
            // ->join('indonesia_districts', 'indonesia_districts.id', 'indonesia_villages.district_id')
            // ->join('indonesia_cities', 'indonesia_cities.id', 'indonesia_districts.city_id')
            // ->join('indonesia_provinces', 'indonesia_provinces.id', 'indonesia_cities.province_id')
            ->select(
                'pelamar.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village'
            )
            ->get();
        return view('HalamanDepan.data-pelamar', ['pelamar' => $pelamar]);
    }

    public function detail($id){
        $peg = Pelamar::select('pelamar.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village'
                )
                ->leftjoin('indonesia_villages','indonesia_villages.id','pelamar.villages')
                ->leftjoin('indonesia_districts','indonesia_districts.id','pelamar.districts')
                ->leftjoin('indonesia_cities','indonesia_cities.id','pelamar.regencies')
                ->leftjoin('indonesia_provinces','indonesia_provinces.id','pelamar.provinces')
                ->where('pelamar.id','=',$id)
                ->get();
        
        $peg2 = Pelamar::select('pelamar.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village'
                )
                ->leftjoin('indonesia_villages','indonesia_villages.id','pelamar.villages2')
                ->leftjoin('indonesia_districts','indonesia_districts.id','pelamar.districts2')
                ->leftjoin('indonesia_cities','indonesia_cities.id','pelamar.regencies2')
                ->leftjoin('indonesia_provinces','indonesia_provinces.id','pelamar.provinces2')
                ->where('pelamar.id','=',$id)
                ->get();

        $awal = date("Y-m-d");
        return view('detail_data',compact('peg', 'peg2', 'awal'));
   }

    public function berandaUtama(){
        return view('HalamanDepan.beranda-utama');   
    }

    public function berandaHC(){
        $count = Karyawan::count();
        $count1 = Pelamar::count();
        return view('HalamanDepan.beranda-hc',compact('count', 'count1'));   
    }

    public function data_form(){
        return view('data_form');
    }

    public function datakaryawan(){
        $pelamar = Pelamar::leftJoin('indonesia_villages', 'indonesia_villages.id', 'pelamar.villages')
            ->leftJoin('indonesia_districts', 'indonesia_districts.id', 'pelamar.districts')
            ->leftJoin('indonesia_cities', 'indonesia_cities.id', 'pelamar.regencies')
            ->leftJoin('indonesia_provinces', 'indonesia_provinces.id', 'pelamar.provinces')
            // ->join('indonesia_districts', 'indonesia_districts.id', 'indonesia_villages.district_id')
            // ->join('indonesia_cities', 'indonesia_cities.id', 'indonesia_districts.city_id')
            // ->join('indonesia_provinces', 'indonesia_provinces.id', 'indonesia_cities.province_id')

            ->select(
                'pelamar.*',
                'indonesia_provinces.name as province',
                'indonesia_cities.name as city',
                'indonesia_districts.name as district',
                'indonesia_villages.name as village'
            )
            ->get();
        return view('HalamanDepan.data-karyawan', ['pelamar' => $pelamar]);
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
                'alamat2' => 'required',
                'provinces2' => 'required',
                'regencies2' => 'required',
                'districts2' => 'required',
                'villages2' => 'required',
                'kode_pos2' => 'required|min:5|max:5',
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
                'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
                'file_buku_nikah'  => 'file|mimes:pdf|max:5000|nullable',
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
        //$file11 = $request->file('file_buku_nikah');

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
        //$nama_file11 = time() . "_" . $file11->getClientOriginalName();
        
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
        //$file11->move($tujuan_upload, $nama_file11);

        if($request->hasFile('file_buku_nikah')){
            $file = $request->file_buku_nikah->getClientOriginalName();
            $request->file('file_buku_nikah')->move('data_file', $file);
            //var_dump($file);
            //return ($file);
            } else {
                $file = null;
            }

            // $tgl = $request->tgl_lahir;
            // $tgl1 = Carbon::parse($tgl)->format('d-m-Y');

            // $tgl = Carbon::parse($item['tgl_lahir']);  

            $datein = $request->get('tgl_lahir');
            // //dd($datein);
            // $date = $request->get('datein');
            // $timestamp = strtotime($date);
            // $datein = date('d-m-Y ',$timestamp );
            // $originalDate = $request->tgl_lahir;
            // $newDate = date("d-m-Y", strtotime($originalDate));

            // $tgl_lahir = Carbon::createFromFormat('d/m/Y', $request->tgl_lahir);
            // $tgl_lahir2 = Carbon::createFromFormat('d/m/Y', $request->tgl_lahir);

        Pelamar::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' =>  $request->nama_belakang,
            'no_ktp' => $request->no_ktp,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,     
            // 'tgl_lahir' = $tgl1,
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
            'alamat2' => $request->alamat2,
            'provinces2' => $request->provinces2,
            'regencies2' => $request->regencies2,
            'districts2' => $request->districts2,
            'villages2' => $request->villages2,
            'kode_pos2' => $request->kode_pos2, 
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
            'file_buku_nikah' => $file
        ]);
        return redirect()->back()->with('success', 'Data Form Berhasil di Submit');;

    }
}
