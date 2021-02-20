<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('Template.head')
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
    @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('Template.sidebar')  
  <!-- / .Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Penilaian Interview Pelamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn bg-gradient-success"><li class="breadcrumb-item"><a href="{{ route('data-pelamar')}}" style="color:white">Kembali Data Pelamar</a></li></button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <center><h1>Interview Form</h1></center>
              <center><img src="{{ asset('img/matrix.png') }}" alt="Logo"></center>
              <br>
              <!-- START ALERTS AND CALLOUTS -->
                <div class="row">
                <div class="col-md-12">
                <div class="card card-default">
                
                <!-- /.card-header -->
                <div class="card-body">
                @foreach($peg ?? '' as $peg)
                <form class="form-detail" action="{{ url('/upload/proses2',$peg->id) }}" enctype="multipart/form-data" method="POST" id="myform">
                {{ csrf_field() }}
                @method('patch')
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Applicant’s Name</b>
                            <input class="form-control" value="{{ $peg->nama_depan }} {{ $peg->nama_belakang }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Position Applied</b>
                            <input class="form-control" value="{{ $peg->job_title }}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Last Education</b>
                            <input class="form-control" value="{{ $peg->pendidikan_terakhir }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Requesting Department </b>
                            <input class="form-control" name="request_department">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Major</b>
                            <input class="form-control" value="{{ $peg->jurusan }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <b>Interview Date </b>
                            <input class="form-control" type="date" name="interview_date">
                        </div>
                    </div>
                </div>
                @endforeach
                <br>
        
        <!-- <div id="boxes">
        <table border="1" class="col-md-12">
        <tr>
            <th width="500px" rowspan="2" style="text-align:center">COMPETENCIES</th>
            <th width="120px" colspan="4" style="text-align:center">Scoring details: 
            <br>
            4 = Very Good, 
            3 = Good, 
            2 = Fair, 
            1 = Poor
            </th>
            <th rowspan="2" style="text-align:center">CANDIDATE SCORE</th>
        </tr>
        <tr>
            <th style="text-align:center">4</th>
            <th style="text-align:center">3</th>
            <th style="text-align:center">2</th>
            <th style="text-align:center">1</th>
        </tr>
        <tr>
            <td><b>Creativity:</b> looking at something in a new way</td>
            <td style="text-align:center">
            <input type="radio" name="r1" data-exval="4"></td>
            <td style="text-align:center">
            <input type="radio"  name="r1" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio"  name="r1" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r1" data-exval="1"></td>
            <td rowspan="5" style="text-align:center">
            <b>Total Score:</b>
            <br>
            <b>(filled by HC)</b>
            <br><br>
            <div ><b><a id="result" name="total_score"></a></b><br>_______________
            <a type="text" id="result" name="total_score"></a></div>
            <br><br>
            <b>Score guidelines:</b><br>
            <b>•	31 – 40: Very recommended</b><br>
            <b>•	21 – 30: Recommended with note</b><br>
            <b>•	1 – 20: Refused</b></td>
        </tr>
        <tr>
            <td><b>Communication:</b> written and/ or oral skills, ability to listen and ask the right questions</td>
            <td style="text-align:center">
            <input type="radio" name="r2" data-exval="4">
            <td style="text-align:center">
            <input type="radio" name="r2" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio" name="r2" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r2" data-exval="1"></td>
        </tr>
        <tr>
            <td><b>Emotional Intelligence:</b> being able to understand and manage his own and others’ emotions </td>
            <td style="text-align:center">
            <input type="radio" name="r3" data-exval="4"></td>
            <td style="text-align:center">
            <input type="radio" name="r3" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio" name="r3" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r3" data-exval="1"></td>
        </tr>
        <tr>
            <td><b>Customer Orientation:</b> desire to help and/ or give the best service to other people (team mate, spv, customer, etc)</td>
            <td style="text-align:center">
            <input type="radio" name="r4" data-exval="4"></td>
            <td style="text-align:center">
            <input type="radio" name="r4" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio" name="r4" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r4" data-exval="1"></td>
        </tr>
        <tr>
            <td><b>Motivation:</b> desire to be continually interested and committed to a job, role or subject, or to give effort in attain goals</td>
            <td style="text-align:center">
            <input type="radio" name="r5" data-exval="4"></td>
            <td style="text-align:center">
            <input type="radio" name="r5" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio" name="r5" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r5" data-exval="1"></td>
        </tr>
        <tr>
            <td><b>Analytical Thinking:</b> able to analyze things</td>
            <td style="text-align:center">
            <input type="radio" name="r6" data-exval="4"></td>
            <td style="text-align:center">
            <input type="radio" name="r6" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio" name="r6" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r6" data-exval="1"></td>
            <td rowspan="5" style="text-align:center">
            <b>NOTES AND COMMENTS:</b>
            <br>
            <textarea class="form-control col-md-12" height="250px" name="notes_and_comments"></textarea>
            </td>
        </tr>
        <tr>
            <td><b>Planning:</b> have certain plan about the activities required to achieve a desired goal</td>
            <td style="text-align:center">
            <input type="radio" name="r7" data-exval="4"></td>
            <td style="text-align:center">
            <input type="radio" name="r7" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio" name="r7" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r7" data-exval="1"></td>
        </tr>
        <tr>
            <td><b>Problem Solving & Decision Making:</b> able to identify, define and solve problems, which includes making decisions about the best course of action</td>
            <td style="text-align:center">
            <input type="radio" name="r8" data-exval="4"></td>
            <td style="text-align:center">
            <input type="radio" name="r8" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio" name="r8" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r8" data-exval="1"></td>
        </tr>
        <tr>
            <td><b>Teamwork:</b> being able to work with others in groups and teams, both formal and informal </td>
            <td style="text-align:center">
            <input type="radio" name="r9" data-exval="4"></td>
            <td style="text-align:center">
            <input type="radio" name="r9" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio" name="r9" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r9" data-exval="1"></td>
        </tr>
        <tr>
            <td><b>Leadership:</b> able to motivate a group of people to act towards achieving a common goal</td>
            <td style="text-align:center">
            <input type="radio" name="r10" data-exval="4"></td>
            <td style="text-align:center">
            <input type="radio" name="r10" data-exval="3"></td>
            <td style="text-align:center">
            <input type="radio" name="r10" data-exval="2"></td>
            <td style="text-align:center">
            <input type="radio" name="r10" data-exval="1"></td>
        </tr>
    </table>
    </div> -->
      
        <table border="1" class="col-md-12">
        <tr>
            <th width="500px" rowspan="2" style="text-align:center">COMPETENCIES</th>
            <th width="120px" colspan="4" style="text-align:center">Scoring details: 
            <br>
            4 = Very Good, 
            3 = Good, 
            2 = Fair, 
            1 = Poor
            </th>
            <th rowspan="2" style="text-align:center">CANDIDATE SCORE</th>
        </tr>
        <tr>
            <th style="text-align:center">4</th>
            <th style="text-align:center">3</th>
            <th style="text-align:center">2</th>
            <th style="text-align:center">1</th>
        </tr>
        <tr>
            <td><b>Creativity:</b> looking at something in a new way</td>
            <td style="text-align:center">
            <input type="checkbox" name="r1" value="4" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r1" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r1" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r1" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td rowspan="5" style="text-align:center">
            <b>Total Score:</b>
            <br>
            <b>(filled by HC)</b>
            <br><br>
            <div>
            <input style="text-align:center" type="text" name="total_score" value="" readonly>
            <input type="hidden" name="hiddentotal" value="0">
            </div>
            <br><br>
            <b>Score guidelines:</b><br>
            <b>•	31 – 40: Very recommended</b><br>
            <b>•	21 – 30: Recommended with note</b><br>
            <b>•	1 – 20: Refused</b></td>
        </tr>
        <tr>
            <td><b>Communication:</b> written and/ or oral skills, ability to listen and ask the right questions</td>
            <td style="text-align:center">
            <input type="checkbox" name="r2" value="4" onClick="this.form.total_score.value=checkChoice(this);">
            <td style="text-align:center">
            <input type="checkbox" name="r2" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r2" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r2" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
        </tr>
        <tr>
            <td><b>Emotional Intelligence:</b> being able to understand and manage his own and others’ emotions </td>
            <td style="text-align:center">
            <input type="checkbox" name="r3" value="4" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r3" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r3" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r3" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
        </tr>
        <tr>
            <td><b>Customer Orientation:</b> desire to help and/ or give the best service to other people (team mate, spv, customer, etc)</td>
            <td style="text-align:center">
            <input type="checkbox" name="r4" value="4" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r4" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r4" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r4" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
        </tr>
        <tr>
            <td><b>Motivation:</b> desire to be continually interested and committed to a job, role or subject, or to give effort in attain goals</td>
            <td style="text-align:center">
            <input type="checkbox" name="r5" value="4" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r5" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r5" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r5" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
        </tr>
        <tr>
            <td><b>Analytical Thinking:</b> able to analyze things</td>
            <td style="text-align:center">
            <input type="checkbox" name="r6" value="4" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r6" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r6" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r6" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td rowspan="5" style="text-align:center">
            <b>NOTES AND COMMENTS:</b>
            <br>
            <textarea class="form-control col-md-12" height="250px" name="notes_and_comments"></textarea>
            </td>
        </tr>
        <tr>
            <td><b>Planning:</b> have certain plan about the activities required to achieve a desired goal</td>
            <td style="text-align:center">
            <input type="checkbox" name="r7" value="4" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r1" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r7" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r7" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
        </tr>
        <tr>
            <td><b>Problem Solving & Decision Making:</b> able to identify, define and solve problems, which includes making decisions about the best course of action</td>
            <td style="text-align:center">
            <input type="checkbox" name="r8" value="4" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r8" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r8" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r8" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
        </tr>
        <tr>
            <td><b>Teamwork:</b> being able to work with others in groups and teams, both formal and informal </td>
            <td style="text-align:center">
            <input type="checkbox" name="r9" value="4" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r9" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r9" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r9" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
        </tr>
        <tr>
            <td><b>Leadership:</b> able to motivate a group of people to act towards achieving a common goal</td>
            <td style="text-align:center">
            <input type="checkbox" name="r10" value="4" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r10" value="3" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r10" value="2" onClick="this.form.total_score.value=checkChoice(this);"></td>
            <td style="text-align:center">
            <input type="checkbox" name="r10" value="1" onClick="this.form.total_score.value=checkChoice(this);"></td>
        </tr>
    </table>

    <!-- <div class="form-detail d-flex align-items-center justify-content-between mt-4 mb-0">
    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit Nilai">
    </div> -->
    <br>
    <div class="form-detail align-items-center justify-content">
        <input class="btn btn-primary float-right" type="submit" value="Submit Nilai">
        <a class="btn btn-success" href="{{url('/nilai-interview',$peg->id)}}"><i class="fas fa-sync fa-spin"></i> Clear Data</a>
    </div>
    </form>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>  
    <!-- /.content -->
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
        @include('Template.footer')
   </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
    @include('Template.script')
    @include('sweetalert::alert')
<!-- /.REQUIRED SCRIPTS -->
</body>
</html>

<script type="text/javascript">
function checkChoice(whichbox){
 with (whichbox.form){
  if (whichbox.checked == false)
   hiddentotal.value = eval(hiddentotal.value) - eval(whichbox.value);
  else
   hiddentotal.value = eval(hiddentotal.value) + eval(whichbox.value);
   return(formatCurrency(hiddentotal.value));
 }
}
function formatCurrency(num){
 num = num.toString().replace(/\$|\,/g,'');
 if(isNaN(num)) num = "0";
  cents = Math.floor((num*100+0.5)%100);
  num = Math.floor((num*100+0.5)/100).toString();
 if(cents < 10) cents = "0" + cents;
  for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
  num = num.substring(0,num.length-(4*i+3))+'.'+num.substring(num.length-(4*i+3));
  return ("" + num + "");
}
</script>

<script type="text/javascript">
function myFunction() {
  document.getElementById("myform").reset();
}
</script>

<!-- <script>
$(document).ready(function(){
//Set a handler to catch clicking the check box
  $("#boxes input[type='radio']").click(function(){
    var total=0;
    //lOOP THROUGH CHECKED
    $("#boxes input[type='radio']:checked").each(function(){
         //Update total
          total += parseInt($(this).data("exval"),10);
    });
    $("#result").text(total);
  });
  
});
</script> -->