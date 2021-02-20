<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Careers PT NAP Info Lintas Nusa</title>
    <!-- Logo Website -->
    <link rel="shortcut icon" href="{{ asset('img/matrix.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
    .tulisan_kiri{text-align: left; }
    </style>
    </head>
<body class="bg-purple">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main style="background: #151948">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header" style="background: white">
                                <center><img src="img/matrix.png" width="50%"></center>
                                <h3 class="text-center font-weight-light my-4"><b>Application Form</b></h3>
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
                                <input name="no_ktp" class="form-control py-4" id="no_ktp" onkeypress="return onlyNumber(event)" maxlength="16" type="text" required />
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
                                <label class="small mb-1">Tanggal Lahir</label>
                                <!-- <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ date('Y-m-d', strtotime($newDate ?? '')) }}" required>  -->
                                <!-- <input name="tgl_lahir" class="form-control py-4" id="datepicker" placeholder="dd/mm/yyyy" type="text" required /> -->
                                <input name="tgl_lahir" class="form-control py-4" type="date" required />
                                </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1">No Telephone (* input dengan angka saja )</label>
                                <input name="no_tlp" oninput="numberOnly(this.id);" maxlength="14" class="form-control py-4 test_css" id="flight_number" type="text" required />
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1">No Handphone (* input dengan angka saja )</label>
                                <!-- <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;"> -->
                                <input name="no_hp" onkeypress="return onlyNumber(event)" maxlength="14" class="form-control py-4" type="text" required />
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
                    <br>
                    <div class="form-group">
                        <label class="small mb-1" for="primaryaddress">Alamat berdasarkan KTP (*)</label>
                        <textarea name="alamat" class="form-control py-4" id="primaryaddress" type="text" required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1">Provinsi (*)</label>
                                <select name="provinces" id="provinces" class="form-control input-lg dynamic primaryprovinsi" data-dependent="Provinsi" require>
                                        <option value="">Pilih Provinsi</option>
                                    @foreach($provinces_list as $provinces)
                                        <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1">Kota (*)</label>
                                <select name="regencies" id="regencies" class="form-control input-lg dynamic1" data-dependent="Kota" require>
                                     <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" >Kecamatan (*)</label>
                                <select name="districts" id="districts" class="form-control input-lg dynamic2" data-dependent="Kecamatan" require>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" >Kelurahan (*)</label>
                                <select name="villages" id="villages" class="form-control input-lg" data-dependent="Kelurahan" require>
                                    <option value="">Pilih Kelurahan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="primaryzip">Kode Pos (* Maximal 5 karakter)</label>
                                <input name="kode_pos" onkeypress="return onlyNumber(event)" maxlength="5" class="form-control py-4" id="primaryzip" type="text" required />
                            </div>
                        </div>
                    </div>
                    <br>

                    <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>              
                    <label for = "same">Jika alamat saat ini sama dengan KTP silahkan di centang.</label> 
                    
                    <div class="form-group">
                        <label class="small mb-1" for="secondaryaddress">Alamat saat ini (*)</label>
                        <textarea name="alamat2" class="form-control py-4 alamatclass" id="secondaryaddress" type="text" required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" >Provinsi (*)</label>
                                <select id="provinces2" class="form-control input-lg dynamic23 provinsiclass" data-dependent="Provinsi" require>
                                        <option value="">Pilih Provinsi</option>
                                    @foreach($provinces_list2 as $provinces)
                                        <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                                    @endforeach
                                </select>
                                <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                                    <input type="text" id="provinces3" name="provinces2" hidden>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" >Kota (*)</label>
                                <select id="regencies2" class="form-control input-lg dynamic12 kotaclass" data-dependent="Kota" require>
                                     <option value="">Pilih Kota</option>
                                </select>
                                <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                                    <input type="text" id="regencies3" name="regencies2" hidden>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" >Kecamatan (*)</label>
                                <select id="districts2" class="form-control input-lg dynamic22 kecamatanclass"  data-dependent="Kecamatan" require>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                                <input type="text" id="districts3" name="districts2" hidden>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" >Kelurahan (*)</label>
                                <select id="villages2" class="form-control input-lg kelurahanclass"  data-dependent="Kelurahan" require>
                                    <option value="">Pilih Kelurahan</option>
                                </select>
                                <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                                <input type="text" id="villages3" name="villages2" hidden>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="secondaryzip">Kode Pos (* Maximal 5 karakter)</label>
                                <input name="kode_pos2" onkeypress="return onlyNumber(event)" maxlength="5" class="form-control py-4 kodeposclass" id="secondaryzip" type="text" required />
                            </div>
                        </div>
                    </div>
                    <br>
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
                                <label class="small mb-1" for="jurusan">Jurusan (*)</label>
                                <input name="jurusan" class="form-control py-4" id="jurusan" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="ipk">IPK (*)</label>
                                <input name="ipk" class="form-control py-4" id="ipk" type="text" required />  
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- <div class="form-group">
                        <label class="small mb-1" for="pengalaman">Pengalaman (*)</label>
                        <input name="pengalaman" class="form-control py-4" id="pengalaman" type="text" required />
                    </div> -->

                    <div class="form-group after-add-more input-group-btn justify-content-between">
                        <label class="small mb-1" for="pengalaman">Pengalaman Kerja (*)</label>
                        <button class="btn btn-success add-more float-right btn-sm" type="button"><i class="fas fa-plus-square"></i> Add</button>
                    </div>

                    <!-- Copy Fields -->
                    <div class="copy d-none">
                    <div class="form-group">
                        <label class="small mb-1">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan[]" class="form-control">
                        <label class="small mb-1">Jabatan</label>
                        <input type="text" name="jabatan[]" class="form-control">
                        <label class="small mb-1">Deskripsi Job</label>
                        <textarea type="text" name="deskripsi_job[]" class="form-control"></textarea>
                        <label class="small mb-1" for="startdate">Start Date</label>
                        <input name="start_date" class="form-control" id="startdate" type="date"/>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="date" id="startdate1" name="start_date" hidden>
                            <label class="small mb-1" for="enddate">End Date</label>
                        <input name="end_date" class="form-control " id="enddate" type="date"/>
                            <!--// fungsi untuk read only ketika alamat saat ini di ceklis otomatis -->
                            <input type="date" name="end_date" hidden>
                    <div class="mb-1 tulisan_kiri form-group" style="align:left">
                        <label class="small mb-1" for="cek">
                        <input type="checkbox" name="masih_aktif_bekerja" value="Masih Aktif Bekerja"/>
                        Masih Aktif Bekerja</label>
                    </div>
                        <button class="btn btn-danger remove" type="button"><i class="fas fa-trash"></i></button>
                    </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label class="small mb-1" for="file_cv">Upload CV<br>(* Max : 5 mb | format : pdf )</label>
                        <input type="file" name="file_cv" class="form-control-file border" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="file_ktp">File KTP<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file_ktp" class="form-control-file border" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="file_npwp">File NPWP<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file_npwp" class="form-control-file border" required></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="file_bpjs_ketenagakerjaan">File BPJS Ketenagakerjaan<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file_bpjs_ketenagakerjaan" class="form-control-file border" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="file_bpjs_kesehatan">File BPJS Kesehatan<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file_bpjs_kesehatan" class="form-control-file border" required></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="file_ijazah">File Ijazah<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file_ijazah" class="form-control-file border" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="file_transkrip_nilai">File Transkrip Nilai <br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file_transkrip_nilai" class="form-control-file border" accept="application/pdf" required></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="file_surat_keterangan_kerja">File Surat Keterangan Kerja<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file_surat_keterangan_kerja" class="form-control-file border" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="file_kartu_keluarga">File Kartu Keluarga<br>(* Max : 5 mb | format : pdf )</label>
                                <input type="file" name="file_kartu_keluarga" class="form-control-file border" required></div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="foto">File Photo<br>(* Max : 5 mb | format : jpeg, jpg, png )</label>
                                <input type="file" name="foto" class="form-control-file border" required></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1">File Buku Nikah (Jika ada silahkan di upload)<br>( Max : 5 mb | format : pdf ) </label>
                                <input type="file" name="file_buku_nikah" class="form-control-file border"></div>
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
        <br><br>
    </main>
</div>


    <div id="layoutAuthentication_footer">
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
<script src="js/scripts.js"></script>
<script type="text/javascript">
        $(function(){
            $("#datepicker").datepicker({ 
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd-mm-yy",
            showAnim:"clip",

            });
        });
</script>
@include('sweetalert::alert')
</body>
</html>

<script>
function onlyNumber(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }
    return true;
}
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html() + "<br>";
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".form-group").remove();
      });
    });
</script>

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
$(document).ready(function(){
 $('.dynamic23').change(function(){
  if($(this).val() != '')
  {   
   var value = $(this).val();   
   var _token = $('input[name="_token"]').val();      
   $.ajax({
    url:"{{ route('dynamicdependent2.regencies2') }}",
    method:"POST",
    data:{value:value, _token:_token},    
    success:function(result)
    {                
     $('#regencies2').html(result);
    }
   })
  }
 });
 $('.dynamic12').change(function(){
  if($(this).val() != '')
  {   
   var value = $(this).val();   
   var _token = $('input[name="_token"]').val();   
//    console.log(value,_token);
   $.ajax({
    url:"{{ route('dynamicdependent2.districts2') }}",
    method:"POST",
    data:{value:value, _token:_token},    
    success:function(result)
    {        
        // console.log(result);
     $('#districts2').html(result);
    }
   })
  }
 });
 $('.dynamic22').change(function(){
  if($(this).val() != '')
  {   
//       var select = $(this).attr("id");   
//    var dependent = $(this).data('dependent');
   var value = $(this).val();   
   var _token = $('input[name="_token"]').val();   
//    console.log(select,value,_token,dependent);
   $.ajax({
    url:"{{ route('dynamicdependent2.villages2') }}",
    method:"POST",
    data:{value:value, _token:_token},    
    success:function(result)
    {        
        // console.log(result);
     $('#villages2').html(result);
    }
   })
  }
 });
 $('#provinces2').change(function(){
  $('#regencies2').val('');
  $('#districts2').val('');
  $('#villages2').val('');
 });
 $('#regencies2').change(function(){
  $('#districts2').val('');
  $('#villages2').val('');
 });
 $('#districts2').change(function(){  
  $('#village2').val('');
 });
});
</script>

<script>
function numberOnly(id) {
    var element = document.getElementById(id);
    var regex = /[^0-9]/gi;
    element.value = element.value.replace(regex, "");
}
</script>

<script>
function onlyNumber(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }
    return true;
}
</script>

<script>
$('#provinces2').on('change', function() {
    $('#provinces3').val(this.value);
  //alert( this.value );
});
$('#regencies2').on('change', function() {
    $('#regencies3').val(this.value);
  //alert( this.value );
});
$('#districts2').on('change', function() {
    $('#districts3').val(this.value);
  //alert( this.value );
});
$('#villages2').on('change', function() {
    $('#villages3').val(this.value);
  //alert( this.value );
});
</script>

<script>          
function addressFunction() 
{ 
  if (document.getElementById('same').checked) 
  { 
    
    document.getElementById('secondaryaddress').value=document.
             getElementById('primaryaddress').value;
    $("#secondaryaddress").prop("readOnly", true);
    //$(".alamatclass").attr('disabled',true);
    //$("#secondaryaddress").prop('disabled', true); 
    document.getElementById('secondaryzip').value=document. 
             getElementById('primaryzip').value
    $("#secondaryzip").prop("readOnly", true);
    //$("#secondaryzip").attr('disabled',true);
    //$("#secondaryzip").prop('disabled', true);
    let dataForProvinces = []; // buat object untuk di jadikan array
    var e = document.getElementById("provinces"); // ambil id berdasarkan getElementById
    var strValueProvinces = e.options[e.selectedIndex].value; // pisah value dari getElementById
    console.log(strValueProvinces)
    var strTextProvinces = e.options[e.selectedIndex].text; // pisah juga untuk text dari getElementById
    dataForProvinces.push({"id":strValueProvinces,"name":strTextProvinces}); // gabungin disini dalam bentuk array yang sudah buat object nya di atas tadi
    console.log(dataForProvinces)
    //$(".provinsiclass").append("<option value='"+dataForProvinces[0].id+"'>"+dataForProvinces[0].name+"</option>"); //  masukin id dari strValueRegencies untuk di tampilkan di halaman
	//document.getElementById('provinces2').value=document.
    //getElementById('provinces').value;
    $("#provinces2").val(strValueProvinces); // masukin id dari strValueRegencies untuk di tampilkan di halaman
    
    // fungsi untuk read only ketika alamat saat ini di ceklis otomatis
    $('.provinsiclass').attr("disabled", true);
    $(".provinsiclass").val(dataForProvinces[0].id);
    $("#provinces3").val(dataForProvinces[0].id);
    
    
    //document.getElementById('provinces2').value=document.
    //getElementById('provinces').value;
    //$('.provinsiclass').attr("disabled", true);
    //$(".provinsiclass").val('');
    //$("#provinces3").val('');
    
    //$("#provinces2").prop("readOnly", true);
    //$("#provinces2").prop("readOnly", true);
    // $('.provinsiclass').attr("disabled", true);
    // $('.provinsiclass').val([0].id);
    // $("#provinces3").val([0].id);
    //$("#provinces2").prop("readOnly", true);
    //$(".provinsiclass").attr('disabled',true);
    //$("#provinces2").prop('disabled', true);
    // document.getElementById('secondaryprovinsi').value=document. 
    //          getElementById('primaryprovinsi').value; 
    // document.getElementByClassName('primaryprovinsi');
    // console.log($('.dynamic12').val(document.getElementById('regencies').value));
    // console.log(document.getElementById('districts2').value=document.getElementById('districts').value);
    // console.log(document.getElementById('villages2').value=document.getElementById('villages').value); 
    //console.log(document.getElementById('regencies2').value=document.getElementById('regencies').value);
    // $(document).ready(function(){
    //     console.log(document.getElementById('regencies').value);
    //     $('#regencies2').val('Aceh');
    // })
    let dataForRegencies = []; // buat object untuk di jadikan array
    var e = document.getElementById("regencies"); // ambil id berdasarkan getElementById
    var strValueRegencies = e.options[e.selectedIndex].value; // pisah value dari getElementById
    var strTextRegencies = e.options[e.selectedIndex].text; // pisah juga untuk text dari getElementById
    dataForRegencies.push({"id":strValueRegencies,"name":strTextRegencies}); // gabungin disini dalam bentuk array yang sudah buat object nya di atas tadi
    console.log(dataForRegencies)
    $(".kotaclass").append("<option value='"+dataForRegencies[0].id+"'>"+dataForRegencies[0].name+"</option>"); //  masukin id dari strValueRegencies untuk di tampilkan di halaman
	document.getElementById('regencies2').value=document.
    getElementById('regencies').value;
    $("#regencies2").val(strValueRegencies); // masukin id dari strValueRegencies untuk di tampilkan di halaman
    
    // fungsi untuk read only ketika alamat saat ini di ceklis otomatis
    $('.kotaclass').attr("disabled", true);
    $(".kotaclass").val(dataForRegencies[0].id);
    $("#regencies3").val(dataForRegencies[0].id);
    

    //$("#regencies2").prop("readOnly", true);
    //$(".kotaclass").attr('disabled',true);
    //$("#regencies2").prop('disabled', true); // disabled 

    let dataForDistricts = []; // buat object untuk di jadikan array
    var e = document.getElementById("districts"); // ambil id berdasarkan getElementById
    var strValueDistricts = e.options[e.selectedIndex].value; // pisah value dari getElementById
    var strTextDistricts = e.options[e.selectedIndex].text; // pisah juga untuk text dari getElementById
    dataForDistricts.push({"id":strValueDistricts,"name":strTextDistricts}); // gabungin disini dalam bentuk array yang sudah buat object nya di atas tadi
    console.log(dataForDistricts)
    $(".kecamatanclass").append("<option value='"+dataForDistricts[0].id+"'>"+dataForDistricts[0].name+"</option>"); //ss masukin id dari strValueRegencies untuk di tampilkan di halaman
	document.getElementById('districts2').value=document.
    getElementById('districts').value;
    $("#districts2").val(strValueDistricts); // masukin id dari strValueRegencies untuk di tampilkan di halaman
    
    // fungsi untuk read only ketika alamat saat ini di ceklis otomatis
    $('.kecamatanclass').attr("disabled", true);
    $(".kecamatanclass").val(dataForDistricts[0].id);
    $("#districts3").val(dataForDistricts[0].id);
    
    //$("#districts2").prop("readOnly", true);
    //$('#districts2').attr("disabled", true);
    //$("#districts").val(dataForDistricts[0].id);
    //$("#districts2").val(dataForDistricts[0].id);
    //$(".kecamatanclass").attr('disabled',true);
    //$("#districts2").prop('disabled', true); 

    let dataForVillages = []; // buat object untuk di jadikan array
    var e = document.getElementById("villages"); // ambil id berdasarkan getElementById
    var strValueVillages = e.options[e.selectedIndex].value; // pisah value dari getElementById
    var strTextVillages = e.options[e.selectedIndex].text; // pisah juga untuk text dari getElementById
    dataForVillages.push({"id":strValueVillages,"name":strTextVillages}); // gabungin disini dalam bentuk array yang sudah buat object nya di atas tadi
    //console.log(dataForVillages[0].id);
    console.log(dataForVillages);
    $(".kelurahanclass").append("<option value='"+dataForVillages[0].id+"'>"+dataForVillages[0].name+"</option>"); //ss masukin id dari strValueRegencies untuk di tampilkan di halaman
    document.getElementById('villages2').value=document.
    getElementById('villages').value;
    $("#villages2").val(strValueVillages); // masukin id dari strValueRegencies untuk di tampilkan di halaman
    
    // fungsi untuk read only ketika alamat saat ini di ceklis otomatis 
    $('.kelurahanclass').attr("disabled", true);
    $(".kelurahanclass").val(dataForVillages[0].id);
    $("#villages3").val(dataForVillages[0].id);


    //$("#villages2").prop("readOnly", true);
    //$('#villages2').attr("disabled", true);
    //$("#villages").val(dataForVillages[0].id);
    //$("#villages2").val(dataForVillages[0].id);
    //$(".kelurahanclass").attr('disabled',true);
    //$("#villages2").prop('disabled', true); 
  } 
      
  else
  { 
    document.getElementById('secondaryaddress').value=""; 
    document.getElementById('provinces2').value=""; 
    document.getElementById('regencies2').value="";
    document.getElementById('districts2').value=""; 
    document.getElementById('villages2').value=""; 
    document.getElementById('secondaryzip').value="";
    $('#provinces3').val("");
    $('#regencies3').val("");
    $('#districts3').val("");
    $('#villages3').val("");
    $('#provinces2').removeAttr('disabled', false);
    $('#regencies2').removeAttr('disabled', false);
    $('#districts2').removeAttr('disabled', false);
    $('#villages2').removeAttr('disabled', false);
    $("#secondaryaddress").prop("readOnly", false);  
    $("#secondaryzip").prop("readOnly", false);   
  } 
}
</script>

<script>          
function CheckUncheckFunction() 
{ 
  if (document.getElementById('cek').checked) 
  { 
    
    document.getElementById('enddate').value="";
    $('#enddate').attr("disabled", true);
  } 
      
  else
  { 
    document.getElementById('enddate').value=""; 
    $('#enddate').val("");
    $('#enddate').removeAttr('disabled', false);
    $("#endate").prop("readOnly", false); 
  } 
}
</script>

<script>
$('#startdate').on('change', function() {
    $('#startdate1').val(this.value);
  //alert( this.value );
});
$('#enddate').on('change', function() {
    $('#enddate1').val(this.value);
  //alert( this.value );
});
</script>