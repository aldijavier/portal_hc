<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - Individual Column Search in Datatables using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Custom Search in Datatables using Ajax</h3>
     <br />
            <br />
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="int_emp_gender" id="filter_gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="int_emp_religion" id="filter_religion" class="form-control" required>
                            <option value="">Select Religion</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    
                    <div class="form-group" align="center">
                        <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br />
   <div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nomor Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Jenis Kelamin</th>
                            <th>Status Pernikahan</th>
                            <th>Agama</th>
                            <th>Tanggal Lahir</th>
                            <th>Departemen</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
   </div>
            <br />
            <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(filter_gender = '', filter_religion = '')
    {
        var dataTable = $('#customer_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('customsearch.index') }}",
                data:{filter_gender:filter_gender, 
                     filter_religion:filter_religion}
            },
            columns: [
                {
                    data:'int_emp_number',
                    name:'int_emp_number'
                },
                {
                    data:'int_emp_name',
                    name:'int_emp_name'
                },
                {
                    data:'int_emp_gender',
                    name:'int_emp_gender'
                },
                {
                    data:'int_emp_marital',
                    name:'int_emp_marital'
                },
                {
                    data:'int_emp_religion',
                    name:'int_emp_religion'
                },
                {
                    data:'int_emp_dob',
                    name:'int_emp_dob'
                },
                {
                    data:'int_emp_department',
                    name:'int_emp_department'
                },
                {
                    data:'int_emp_statuss',
                    name:'int_emp_statuss'
                }
            ]
        });
    }

    $('#filter').click(function(){
        var filter_gender = $('#filter_gender').val();
        var filter_religion = $('#filter_religion').val();
        var filter_test = $('#filter_test').val();
        if(filter_test != '' &&  filter_test != '')
        {
            $('#customer_data').DataTable().destroy();
            // fill_datatable(filter_gender, filter_religion);
        }

        if(filter_gender != '' &&  filter_gender != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(filter_gender, filter_religion);
        }
        if(filter_religion != '' &&  filter_religion != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(filter_gender, filter_religion);
        }
        else
        {
            alert('Select Both filter option');
        }
    });

    $('#reset').click(function(){
        $('#filter_gender').val('');
        $('#filter_religion').val('');
        $('#customer_data').DataTable().destroy();
        fill_datatable();
    });

});
</script>