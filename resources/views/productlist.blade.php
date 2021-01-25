<!DOCTYPE html>
<html>
<head>
	<title></title>
	@include('Template.head')  
</head>
<body>
  <!-- Navbar -->
    @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('Template.sidebar')  
  <!-- / .Main Sidebar Container -->
<center>
	<h1>Laravel Dynamic Drop Down with ajax</h1>
	
	<div class="form-group">
        <b>Departemen</b>
        <select class="form-control department_reportline_name" name="int_emp_department" id="int_emp_department" required>
            <option value>Pilih Department</option>
            @foreach($departments ?? '' as $departments)
            <option value="{{ $departments->department_id }}">{{ $departments->department_name }}</option>
            @endforeach
        </select>
    </div>

	<div class="form-group">
        <b>Report Line</b>
        <input class="form-control pic1" name="int_emp_reportline" type="text" value="" disabled required>
    </div>
</center>

@include('Template.script')

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.department_reportline_name',function () {
			var dept_id=$(this).val();
			var a=$(this).parent().parent().parent();
			console.log(dept_id);
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findReportLineName')!!}',
				data:{'id':dept_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("reportline_name");
					console.log(data.reportline_name);
					// here price is coloumn name in products table data.coln name
					a.find('.pic1').val(data.reportline_name);
				},
				error:function(){

				}
			});
		});
	});
</script>


</body>
</html>