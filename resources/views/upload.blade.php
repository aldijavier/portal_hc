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
                        <b>Alamat</b>
                        <input class="form-control" name="alamat" type="text" required>
                    </div>

                    <div class="form-group">
                        <b>Provinsi</b>
                        <select name="provinces" id="provinces" class="form-control input-lg dynamic" data-dependent="Provinsi" require>
                         <option value="">Pilih Provinsi</option>
                         @foreach($provinces_list as $provinces)
                         <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                         @endforeach
                        </select>
                       </div> 

                       <div class="form-group">
                        <b>Kota</b>
                        <select name="regencies" id="regencies" class="form-control input-lg dynamic1" data-dependent="Kota" require>
                         <option value="">Pilih Kota</option>
                        </select>
                       </div>   

                       <div class="form-group">
                        <b>Kecamatan</b>
                        <select name="districts" id="districts" class="form-control input-lg dynamic2" data-dependent="Kabupaten" require>
                         <option value="">Pilih Kecamatan</option>
                        </select>
                       </div>

                       <div class="form-group">
                        <b>Kelurahan</b>
                        <select name="villages" id="villages" class="form-control input-lg" data-dependent="Desa" require>
                         <option value="">Pilih Kelurahan</option>
                        </select>
                       </div>

                       <div class="form-group">
                        <b>Kode Pos</b>
                        <input class="form-control" name="kode_pos" type="number" maxlength="5" required>
                       </div>

                       <br>

                       <div class="form-group">
                        <b>Alamat berdasarkan KTP</b>
                        <label for ="primaryaddress">Alamat: </label> 
                        <br>         
                        <input type = "text" name = "Address" id = "primaryaddress" required><br/> 
                        <br> 
                        <label for = "primaryzip">Kode Pos:</label>
                        <br>    
                        <input type = "number" name = "Zipcode" id = "primaryzip" required><br/>  
                        </div>
                        
                        <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>              
                        <label for = "same">Jika alamat sama dengan KTP silahkan di centang</label> 

                        <br>
                        <div class="form-group">
                            <b>Alamat saat ini</b>
                            <label for ="secondaryaddress">Alamat:</label>  
                            <br>    
                            <input type = "text" name = "Address" id = "secondaryaddress" required><br/>  
                            <br>            
                            <label for = "secondaryzip">Kode Pos:</label>          
                            <br>
                            <input type = "text" name = "Zipcode" id = "secondaryzip" required><br/>  
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
