<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Aplikasi HC</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="row">
		<div class="container">
			<h2 class="text-center my-5">Data Form</h2>
			
			<div class="col-lg-15 mx-auto my-15">	

				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Job Title</th>
							<th>Universitas</th>
							<th>Jurusan</th>
							<th>IPK</th>
							<th>Pengalaman</th>
							<th>Alamat</th>
							<th>Lihat Dokumen</th>
							<th>Lihat Detail</th>
						</tr>
					</thead>
					<tbody>
						@foreach($gambar ?? '' as $g)
						<tr>
							<td>{{$g->nama_depan}} {{$g->nama_belakang}}</td>
							<td>{{$g->job_title}}</td>
							<td>{{$g->universitas}}</td>
							<td>{{$g->jurusan}}</td>
							<td>{{$g->ipk}}</td>
							<td>{{$g->pengalaman}}</td>
							<td>{{$g->alamat}}, {{$g->village}}, {{$g->district}}, {{$g->city}}, {{$g->province}}, {{$g->kode_pos}}</td>
                            <td>
								<a href="/data_file/{{ $g->file_cv }}" target="_blank" rel="noopener noreferrer">Lihat CV</a> |
								<a href="/data_file/{{ $g->file_ktp }}" target="_blank" rel="noopener noreferrer">Lihat KTP</a> |
								<a href="/data_file/{{ $g->file_npwp }}" target="_blank" rel="noopener noreferrer">Lihat NPWP</a> |
								<a href="/data_file/{{ $g->file_bpjs_ketenagakerjaan }}" target="_blank" rel="noopener noreferrer">Lihat BPJS Ketenagakerjaan</a> |
								<a href="/data_file/{{ $g->file_bpjs_kesehatan }}" target="_blank" rel="noopener noreferrer">Lihat BPJS Kesehatan</a> |
								<a href="/data_file/{{ $g->file_transkrip_nilai }}" target="_blank" rel="noopener noreferrer">Lihat Transkrip Nilai</a> |
								<a href="/data_file/{{ $g->file_ijazah }}" target="_blank" rel="noopener noreferrer">Lihat Ijazah</a> |
								<a href="/data_file/{{ $g->file_surat_keterangan_kerja }}" target="_blank" rel="noopener noreferrer">Lihat Surat Keterangan Kerja</a> |
								<a href="/data_file/{{ $g->file_kartu_keluarga }}" target="_blank" rel="noopener noreferrer">Lihat Kartu Keluarga</a> |
								<a href="/data_file/{{ $g->foto }}" target="_blank" rel="noopener noreferrer">Lihat Foto</a> |
								<a href="/data_file/{{ $g->file_buku_nikah }}" target="_blank" rel="noopener noreferrer">Lihat Buku Nikah</a>
							</td>
							<td>
							<a href="{{url('detail/'.$g->id)}}" target="_blank">Lihat Detail Data</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</body>
</html>