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
    <select name="provinces" id="provinces" class="form-control input-lg dynamic" data-dependent="Provinsi">
     <option value="">Pilih Provinsi</option>
     @foreach($provinces_list as $provinces)
     <option value="{{$provinces->id}}">{{$provinces->name}}</option>
     @endforeach
    </select>
   </div>   
   <div class="form-group">
    <select name="regencies" id="regencies" class="form-control input-lg dynamic1" data-dependent="Kota">
     <option value="">Pilih Kota</option>
    </select>
   </div>   
   <div class="form-group">
    <select name="districts" id="districts" class="form-control input-lg dynamic2" data-dependent="Kabupaten">
     <option value="">Pilih Kabupaten</option>
    </select>
   </div>
   <div class="form-group">
    <select name="villages" id="villages" class="form-control input-lg" data-dependent="Desa">
     <option value="">Pilih Desa</option>
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