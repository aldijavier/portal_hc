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
    <style> 
    .body{ 
    background-image:url("{{ asset('img/background.png') }}"); 
    background-size:cover; 
    background-attachment: fixed; } 
    </style>
    </head>
<body>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main class="body">
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

                        <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="small mb-1">Start Date</label>
                                <input name="start_date[]" class="form-control" type="date"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="small mb-1" for="enddate">End Date</label>
                                <input name="end_date[]" class="form-control " id="enddate" type="date"/>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1 tulisan_kiri form-group" style="align:left">
                        <label class="small mb-1" for="cek">
                        <input type="hidden" name="masih_aktif_bekerja[]" value="0"/>
                        <input type="checkbox" name="masih_aktif_bekerja[]" value="1"
                        {{ (is_array(('masih_aktif_bekerja')) && in_array(0, old('masih_aktif_bekerja'))) === 1 ? ' checked' : '' }}
                        id="cek" onchange="CheckUncheckFunction()"/>
                        Masih Aktif Bekerja</label>
                    </div>
                        <button class="btn btn-danger remove" type="button"><i class="fas fa-trash"></i></button>
                    </div>
                    </div>
                    <br>
                   
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
</div>

<script src="js/scripts.js"></script>
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
$('#enddate').on('change', function() {
    $('#enddate1').val(this.value);
  //alert( this.value );
});
</script>