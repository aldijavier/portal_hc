<!DOCTYPE html>
<html>
 <head>
  <title>Dropdown Country And State</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Dropdown Country And State</h3><br />
   <div class="form-group">
    <select name="provinces" id="provinces" class="form-control input-lg dynamic23" data-dependent="Provinsi">
     <option value="">Pilih Provinsi</option>
     @foreach($provinces_list2 as $provinces)
     <option value="{{$provinces->id}}">{{$provinces->name}}</option>
     @endforeach
    </select>
   </div>   
   <div class="form-group">
    <select name="regencies2" id="regencies2" class="form-control input-lg dynamic12" data-dependent="Kota">
     <option value="">Pilih Kota</option>
    </select>
   </div>   
   <div class="form-group">
    <select name="districts2" id="districts2" class="form-control input-lg dynamic22" data-dependent="Kabupaten">
     <option value="">Pilih Kecamatan</option>
    </select>
   </div>
   <div class="form-group">
    <select name="villages2" id="villages2" class="form-control input-lg" data-dependent="Desa">
     <option value="">Pilih Kelurahan</option>
    </select>
   </div>
   {{ csrf_field() }}
   <br />
   <br />
  </div>
 </body>
</html>

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