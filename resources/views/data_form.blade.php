<!DOCTYPE html>
<html>
<head>
	<title>Form Pelamar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
	<div class="row">
		<div class="container">
			<h2 class="text-center my-5">Form Pelamar</h2>
			
			<div class="col-lg-3 mx-auto my-4">	
 
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
 
				<form action="/upload/proses" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
                    
                    <div class="form-group">
						<b>Nama Depan</b>
						<input class="form-control" name="nama_depan" type="text" required>
                    </div>
                    
                    <div class="form-group">
						<b>Nama Belakang</b>
						<input class="form-control" name="nama_belakang" type="text" required>
					</div>
                    
                    <div class="form-group">
						<b>No KTP</b>
						<input class="form-control" name="no_ktp" type="number" required>
                    </div>
                    
                    <div class="form-group">
						<b>Email</b>
						<input class="form-control" name="email" type="email" required>
                    </div>
                    
                    <div class="form-group">
                        <b>Jenis Kelamin</b>
                        <select name="jenis_kelamin" class="form-control input-lg" required>
                            <option value="">Jenis Kelamin</option>
                            <option value="Laki-laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
						<b>Tanggal Lahir</b>
						<input class="form-control" name="tgl_lahir" type="date" required>
                    </div>
                    
                    <div class="form-group">
						<b>No Telephone</b>
						<input class="form-control" name="no_tlp" type="number" required>
                    </div>

                    <div class="form-group">
						<b>No Handphone</b>
						<input class="form-control" name="no_hp" type="number" required>
                    </div>

                    <div class="form-group">
						<b>Mengetahui informasi dari</b>
						<select name="informasi" class="form-control input-lg" required>
                            <option value="">Informasi</option>
                            <option value="Jobstreet">Jobstreet</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="Website">Website NapInfo Recruitment</option>
                        </select>
                    </div>

                    <div class="form-group">
						<b>Job Title</b>
                        <select name="job_title" class="form-control input-lg" required>
                            <option value="">Posisi</option>
                            <option value="System Development">System Development</option>
                            <option value="Sysadmin">System Engineer</option>
                            <option value="NOC">Network Operation Center</option>
                            <option value="AM">Account Manager</option>
                        </select>
                    </div>

                    <br>
                    <div class="form-group">
                        <b>Alamat berdasarkan KTP</b>
                         <label for ="primary_address">Alamat: </label>
                        <input class="form-control" name="alamat" type="text" id="primary_address" required>
                    </div>

                    <div class="form-group">
                        <b>Provinsi</b>
                        <label for ="primary_provinces">Provinsi </label>
                        
                       </div> 

                       <div class="form-group">
                        <b>Kota</b>
                        <label for ="primary_regencies">Kota </label>
                        </div>   
                
                       <div class="form-group">
                        <b>Kecamatan</b>
                        <label for ="primary_districts">Kecamatan </label>
                        </div>

                       <div class="form-group">
                        <b>Kelurahan</b>
                        <label for ="primary_villages">Kelurahan </label>
                        </select>
                       </div>

                       <div class="form-group">
                        <b>Kode Pos</b>
                        <label for ="primary_kode">Kode Pos </label>
                        <input class="form-control" name="kode_pos" type="number" id="primary_kode" maxlength="5" required>
                       </div>
                       <br>

                    

                       <div class="form-group">
                        <b>Alamat berdasarkan KTP</b>
                        <label for ="primaryaddress">Alamat: </label> 
                        <br>         
                        <input type = "text" name = "Address" id = "primaryaddress"><br/> 
                        <br> 
                        <label for = "primaryzip">Kode Pos:</label>
                        <br>    
                        <input type = "number" name = "Zipcode" id = "primaryzip" ><br/>  
                        </div>
                        
                        <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>              
                        <label for = "same">Jika alamat sama dengan KTP silahkan di centang</label> 

                        <br>
                        <div class="form-group">
                            <b>Alamat saat ini</b>
                            <label for ="secondaryaddress">Alamat:</label>  
                            <br>    
                            <input type = "text" name = "Address" id = "secondaryaddress" ><br/>  
                            <br>            
                            <label for = "secondaryzip">Kode Pos:</label>          
                            <br>
                            <input type = "text" name = "Zipcode" id = "secondaryzip" ><br/>  
                        </div>

                        <br>

                       <div class="form-group">
                        <b>Pendidikan Terakhir</b>
                        <select name="pendidikan_terakhir" class="form-control input-lg" required>
                            <option value="">Pendidikan</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                       </div>

                       <div class="form-group">
                        <b>Universitas</b>
                        <input class="form-control" name="universitas" type="text" required>
                       </div>

                       <div class="form-group">
                        <b>Jurusan</b>
                        <input class="form-control" name="jurusan" type="text" required>
                       </div>

                       <div class="form-group">
                        <b>IPK</b>
                        <input class="form-control" name="ipk" type="text" required>
                       </div>

                       <div class="form-group">
                        <b>Pengalaman</b>
                        <input class="form-control" name="pengalaman" type="text" required>
                       </div>

                        <div class="form-group">
                            <b>CV (*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_cv">
                        </div>

                        <div class="form-group">
                            <b>KTP(*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_ktp">
                        </div>

                        <div class="form-group">
                            <b>NPWP (*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_npwp">
                        </div>

                        <div class="form-group">
                            <b>BPJS Ketenagakerjaan (*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_bpjs_ketenagakerjaan">
                        </div>

                        <div class="form-group">
                            <b>BPJS Kesehatan (*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_bpjs_kesehatan">
                        </div>

                        <div class="form-group">
                            <b>Transkrip Nilai (*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_transkrip_nilai">
                        </div>
                        
                        <div class="form-group">
                            <b>Ijazah (*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_ijazah">
                        </div>

                        <div class="form-group">
                            <b>Surat Keterangan Kerja (*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_surat_keterangan_kerja">
                        </div>

                        <div class="form-group">
                            <b>Kartu Keluarga (*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_kartu_keluarga">
                        </div>

                        <div class="form-group">
                            <b>Photo (*.jpeg, jpg, png Max 5 MB)</b><br/>
                            <input type="file" name="foto">
                        </div>

                        <div class="form-group">
                            <b>File Buku Nikah (*.pdf Max 5 MB)</b><br/>
                            <input type="file" name="file_buku_nikah">
                        </div>
 
					<input type="submit" value="Upload" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<script>
    $(document).ready(function(){
     $('.dynamic').change(function(){
      if($(this).val() != '')
      {   
       var value = $(this).val();   
       var _token = $('input[name="_token"]').val();      
       $.ajax({
        url:"{{ route('dynamicdependent.regencies') }}",
        method:"POST",
        data:{value:value, _token:_token},    
        success:function(result)
        {                
         $('#regencies').html(result);
        }
       })
      }
     });
     $('.dynamic1').change(function(){
      if($(this).val() != '')
      {   
       var value = $(this).val();   
       var _token = $('input[name="_token"]').val();   
    //    console.log(value,_token);
       $.ajax({
        url:"{{ route('dynamicdependent.districts') }}",
        method:"POST",
        data:{value:value, _token:_token},    
        success:function(result)
        {        
            // console.log(result);
         $('#districts').html(result);
        }
       })
      }
     });
     $('.dynamic2').change(function(){
      if($(this).val() != '')
      {   
    //       var select = $(this).attr("id");   
    //    var dependent = $(this).data('dependent');
       var value = $(this).val();   
       var _token = $('input[name="_token"]').val();   
    //    console.log(select,value,_token,dependent);
       $.ajax({
        url:"{{ route('dynamicdependent.villages') }}",
        method:"POST",
        data:{value:value, _token:_token},    
        success:function(result)
        {        
            // console.log(result);
         $('#villages').html(result);
        }
       })
      }
     });
     $('#provinces').change(function(){
      $('#regencies').val('');
      $('#districts').val('');
      $('#villages').val('');
     });
     $('#regencies').change(function(){
      $('#districts').val('');
      $('#villages').val('');
     });
     $('#districts').change(function(){  
      $('#village').val('');
     });
    });
    </script>

<script> 
function addressFunction() 
{ 
  if (document.getElementById('same').checked) 
  { 
    document.getElementById('secondaryaddress').value=document. 
             getElementById('primaryaddress').value; 
    document.getElementById('secondaryzip').value=document. 
             getElementById('primaryzip').value 
  } 
      
  else
  { 
    document.getElementById('secondaryaddress').value=""; 
    document.getElementById('secondaryzip').value=""; 
  } 
}
 
</script> 
<!-- <script> 
function addressFunction1() 
{ 
  if (document.getElementById('same1').checked) 
  { 
    document.getElementById('secondary_address').value=document. 
             getElementById('primary_address').value;
    document.getElementById('secondary_provinces').value=document. 
             getElementById('primary_provinces').value;
    document.getElementById('secondary_regencies').value=document. 
             getElementById('primary_regencies').value;
    document.getElementById('secondary_districts').value=document. 
             getElementById('primary_districts').value;
    document.getElementById('secondary_villages').value=document. 
             getElementById('primary_villages').value;                                 
    document.getElementById('secondary_kode').value=document. 
             getElementById('primary_kode').value;
    document.getElementById('secondary_address').value=document.
             getElementById('primary_address').value
  } 
      
  else
  { 
    document.getElementById('secondary_address').value=""; 
    document.getElementById('secondary_provinces').value="";
    document.getElementById('secondary_regencies').value=""; 
    document.getElementById('secondary_districts').value=""; 
    document.getElementById('secondary_villages').value=""; 
    document.getElementById('secondary_kode').value=""; 
  } 
}
</script> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Careers PT NAP Info Lintas Nusa</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Form Application PT NAP Info Lintas Nusa</h3>
                                <center><img src="img/matrix.png" width="50%"></center>
                            </div>
                            <div class="card-body">
                                @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    {{ $error }} <br/>
                                    @endforeach
                                </div>
                                @endif

            <form class="form-detail" action="/upload/proses" enctype="multipart/form-data" method="POST" id="myform">
                {{ csrf_field() }}

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="nama_depan">Nama Depan (*)</label>
                                <input name="nama_depan" class="form-control py-4" id="nama_depan" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="nama_belakang">Nama Belakang (*)</label>
                                <input name="nama_belakang" class="form-control py-4" id="nama_belakang" type="text" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="no_ktp">No KTP (*)</label>
                                <input name="no_ktp" class="form-control py-4" id="no_ktp" type="number"  required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="email">Email (*)</label>
                                <input name="email" class="form-control py-4" id="address_kandidat" type="email"  required />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="jenis_kelamin">Jenis Kelamin (*)</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option class="form-control py-4" value="">Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="tgl_lahir">Tanggal Lahir (*)</label>
                                <input name="tgl_lahir" class="form-control py-4" id="tgl_lahir" type="date" required />
                                </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="no_tlp">No Telephone (*)</label>
                                <input name="no_tlp" class="form-control py-4" id="no_tlp" type="number" required />
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="no_hp">No Handphone (*)</label>
                                <input name="no_hp" class="form-control py-4" id="email_kandidat" type="number" required />
                                </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="informasi">Mengetahui informasi dari (*)</label>
                                <select name="informasi" class="form-control" required>
                                    <option class="form-control py-4" value="">Informasi</option>
                                    <option value="Jobstreet">Jobstreet</option>
                                    <option value="LinkendIn">LinkendIn</option>
                                    <option value="Portal Recruitment">Portal Recruitment</option>
                                    <option value="Social Media(Instagram/Facebook/Tiktok)">Social Media(Instagram/Facebook/Tiktok)</option>
                                    <option value="Website Perusahaan">Website Perusahaan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="job_title">Job Title (*)</label>
                                <select name="job_title" class="form-control" required>
                                    <option class="form-control py-4" value="">Posisi</option>
                                    <option value="Account Manager">Account Manager</option>
                                    <option value="NOC Staff">NOC Staff</option>
                                    <option value="Application Developer (Front End / Back End)">Application Developer (Front End / Back End)</option>
                                    <option value="System Development">System Development</option>
                                    <option value="Cloud Manager">Cloud Manager</option>
                                    <option value="Executive Secretary">Executive Secretary</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="alamat">Alamat (*)</label>
                        <textarea name="alamat" class="form-control py-4" id="alamat" type="text" required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1">Provinsi (*)</label>
                                <select name="provinces" id="provinces" id="primary_provinces" class="form-control input-lg dynamic" data-dependent="Provinsi" require>
                         <option value="">Pilih Provinsi</option>
                         
                        </select></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="regencies">Kota (*)</label>
                                <select name="regencies" id="regencies" class="form-control input-lg dynamic1" data-dependent="Kota" require>
                                     <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="districts">Kecamatan (*)</label>
                                <select name="districts" id="districts" id="primary_districts" class="form-control input-lg dynamic2" data-dependent="Kabupaten" require>
                         <option value="">Pilih Kecamatan</option>
                        </select>
                       
                       
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="villages">Kelurahan (*)</label>
                                <select name="villages" id="villages" id="primary_villages" class="form-control input-lg" data-dependent="Desa" require>
                         <option value="">Pilih Kelurahan</option>
                         </select>
                         </div>
                        </div>
                    </div>

                    <div class="form-row">   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="kode_pos">Kode Pos (* Maximal 5 karakter)</label>
                                <input name="kode_pos" class="form-control py-4" id="kode_pos" type="number" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="universitas">Universitas (*)</label>
                                <input name="universitas" class="form-control py-4" id="universitas" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="pendidikan_terakhir">Pendidikan Terkahir (*)</label>
                                <select name="pendidikan_terakhir" class="form-control input-lg" required>
                                    <option value="">Pendidikan</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">Jurusan (*)</label>
                                <input name="experience_kandidat" class="form-control py-4" id="experience_kandidat" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="ipk">IPK (*)</label>
                                <input name="ipk" class="form-control py-4" id="ipk" type="text" required />  
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="pengalaman">Pengalaman (*)</label>
                        <input name="pengalaman" class="form-control py-4" id="pengalaman" type="text" required />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="file_cv">Upload CV<br>(* Max : 5 mb | format : pdf )</label>
                        <input type="file" name="file_cv" class="form-control-file border" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File KTP<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File NPWP<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File BPJS Ketenagakerjaan<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File BPJS Kesehatan<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File Ijazah<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File Transkrip Nilai <br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File Surat Keterangan Kerja<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File Kartu Keluarga<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                    </div>

                    
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File Photo<br>(* Max : 5 mb | format : jpeg, jpg, png )</label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="education_kandidat">File Buku Nikah (Jika ada silahkan di upload)<br>( Max : 5 mb | format : pdf ) </label>
                                <input type="file" name="file" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                    </div>
                    
                    <hr/>
                    <label class="small mb-1" for="education_kandidat">Note : Pada tanda (*) harap untuk di isi.<br>Terima kasih.</label>

                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit Form">

                </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </main>
</div>
<div id="layoutAuthentication_footer">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html> 

<script>
    $(document).ready(function(){
     $('.dynamic').change(function(){
      if($(this).val() != '')
      {   
       var value = $(this).val();   
       var _token = $('input[name="_token"]').val();      
       $.ajax({
        url:"{{ route('dynamicdependent.regencies') }}",
        method:"POST",
        data:{value:value, _token:_token},    
        success:function(result)
        {                
         $('#regencies').html(result);
        }
       })
      }
     });
     $('.dynamic1').change(function(){
      if($(this).val() != '')
      {   
       var value = $(this).val();   
       var _token = $('input[name="_token"]').val();   
    //    console.log(value,_token);
       $.ajax({
        url:"{{ route('dynamicdependent.districts') }}",
        method:"POST",
        data:{value:value, _token:_token},    
        success:function(result)
        {        
            // console.log(result);
         $('#districts').html(result);
        }
       })
      }
     });
     $('.dynamic2').change(function(){
      if($(this).val() != '')
      {   
    //       var select = $(this).attr("id");   
    //    var dependent = $(this).data('dependent');
       var value = $(this).val();   
       var _token = $('input[name="_token"]').val();   
    //    console.log(select,value,_token,dependent);
       $.ajax({
        url:"{{ route('dynamicdependent.villages') }}",
        method:"POST",
        data:{value:value, _token:_token},    
        success:function(result)
        {        
            // console.log(result);
         $('#villages').html(result);
        }
       })
      }
     });
     $('#provinces').change(function(){
      $('#regencies').val('');
      $('#districts').val('');
      $('#villages').val('');
     });
     $('#regencies').change(function(){
      $('#districts').val('');
      $('#villages').val('');
     });
     $('#districts').change(function(){  
      $('#village').val('');
     });
    });
    </script>
