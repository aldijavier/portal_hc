form index :

@extends('master')
@section('title','Guest Book Nap Info')
@section('content') 
<script type="text/javascript">window.setTimeout("document.getElementById('successMessage').style.display='none';", 2000); 
</script>
{{-- <a class="btn btn-icon icon-left btn-info" href="{{url('exportguest')}}" class="btn btn-success" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</a> --}}
    <div class="card-header row justify-content-center">
    <form action="/" method="GET" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="input-group-prepend">
                    <div class="card-body text-left">
                        <a class="btn btn-icon icon-left btn-info" href="{{url('guests/create')}}" name="btnIn" ><i class="fa fa-plus" aria-hidden="true" > Add Guest</i></a>
                    </div> 
                    <span class="input-group-prepend">
                        <div class="col-md-3.5">
                        <p> Lokasi :  
                        <select name="search" id="search" class="form-control " ></p>
                        <option value="">- Pilih Lokasi -</option>
                        <option @if(request()->get('search')=="1") selected @endif value="1" >Plaza Kuningan</option>
                        <option @if(request()->get('search')=="2") selected @endif value="2" >Cyber</option>
                        
                        
                    </select> 
                    
                </span>
            </div>
              <div class="col-md-6">
                        <span class="input-group-prepend">
                            <p> Date From :   <input type="date"  name="search1" id="search1" class="form-control" placeholder="from" value="{{request()->get('search1')}}"> </p>
                            {{-- <p>Date From: <input type="text" id="datepicker" name="search1"></p>
                            <p>Date From: <input type="text" id="datepicker2" name="search2"></p> --}}
                            <p> To :   <input type="Date" name="search2" id="search2" class="form-control" placeholder="to" value="{{request()->get('search2')}}" > </p>
                        <p> .<button type="submit" class="btn btn-primary mr-1" > <i class="fa fa-search" aria-hidden="true"></i></button> </p>
                        <p> .<a  class="btn btn-primary mr-1" href="{{url('/')}}"> <i class="fa fa-history" aria-hidden="true" ></i></a></p>
                       <p>. <button name="guestexport" class="btn btn-success mr-1"> <i class="fa fa-file-excel-o" aria-hidden="true"></i></button></p>
                        {{-- <p>. <a class="btn btn-success mr-1" onClick="PrintPage('print')"><i class="fa fa-print" aria-hidden="true"></i></a></p> --}}
                        {{-- <p>. <a  href="{{route('l_guest')}}" target="_blank" class="btn btn-success mr-1"> <i class="fa fa-print" aria-hidden="true"></i></a></p> --}}
                        {{-- <p>. <a  href="" onclick="this.href='/cetakguest/'+document.getElementById('search1').value+'/'+document.getElementById('search2').value" target="_blank" class="btn btn-success mr-1"> <i class="fa fa-print" aria-hidden="true"></i></a></p> --}}
                            {{-- <p>. <a  href="{{url('/print_siswa')}}" target="_blank" class="btn btn-success mr-1"> <i class="fa fa-print" aria-hidden="true"></i></a></p> --}}
                            <p>. <button type="submit" name="guestprint"  class="btn btn-success mr-1" formtarget="_blank"> <i class="fa fa-print" aria-hidden="true"></i></button></p>
                  
                    </div>
                </div>
                </span>
             </div>
            </form>
       
            </div>
    
</div>
            @if(session('message'))
                <div class="alert alert-success alert-dismissible show fade" id="successMessage">
                    <div class="alert-body">
                        {{-- <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button> --}}
                        {{session('message')}}
                    </div>
                </div>
                @elseif(session('gagal'))
                <div class="alert alert-warning alert-dismissible show fade" id="successMessage">
                    <div class="alert-body">
                        {{-- <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button> --}}
                        {{session('gagal')}}
                    </div>
                </div>
            @endif
            @if(session('hapus'))
            <div class="alert alert-danger alert-dismissible show fade" id="successMessage">
                <div class="alert-body">
                    {{-- <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button> --}}
                    {{session('hapus')}}
                </div>
            </div>
        @endif
            {{-- <a class="btn btn-icon icon-left btn-info" href="{{url('guests/create')}}" name="btnIn" ><i class="fa fa-plus" aria-hidden="true" > Add Guest</i></a> --}}
            
            <div class="card-header table-responsive">
                <table  class="table table-hover table-striped table-bordered table-sm" style="width:100%;  solid black;">
                   
                    {{-- <table id="example1" class="table table-bordered table-striped"> --}}
                    @if(count($guests))
                    
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" width="30" style="white-space: nowrap !important;background-color:#336699">No </th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">ID Guest</th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Date In</th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Date Out</th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Nama </th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Telephone </th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Company </th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Email</th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Activity</th>
                            <th class="text-center" scope="col"  style="white-space: nowrap !important;background-color:#336699">No Rack </th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">No Loker</th>
                            <th  class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Foto </th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Durasi </th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Lokasi </th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699">Remarks </th>
                            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699" >Status </th>
                            <th  class="text-center" colspan="4" style="white-space: nowrap !important;background-color:#336699">Action</th>
                        </tr>
                    </thead>
                        <tbody>
            @foreach ($guests as  $no => $guest)
                    <tr>
                      
                        
                        <td>{{ $guests->firstItem()+$no}} </td>
                        <td>{{$guest->id}}</td>
                        <td>{{$guest->datein}}</td>
                        <td >{{$guest->dateout}}</td>
                        <td>{{$guest->name}}</td>
                        <td>{{$guest->telephone}}</td>
                        <td>{{$guest->company}}</td>
                        <td>{{$guest->email}}</td>
                        <td>{{$guest->activity}}</td>
                        <td>{{$guest->noRack}}</td>
                        <td>{{$guest->noLoker}}</td>
                        <td>
                            @if($guest->foto)
                            {{-- <a href="" onclick="window.open('/image/{{$guest->foto}}','targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1090px, height=550px, top=25px left=120px' ); return false;">  --}}
                                {{-- <a data-fancybox="gallery" href="/image/{{$guest->foto}}"> --}}
                                    <a href="#" class="pop">
                                    <img src="/image/{{$guest->foto}}" width="60" height="60" alt="" ></a>     
                                    @else
                                <i>NULL</i>
                            @endif
                        </td>
                        <td style="white-space: nowrap !important;">{{$guest->durasi}}</td>
                        {{-- <td>{{$guest->lokasi}}</td> --}}
                        <td>{{$guest->lokasi}}</td>
                        <td>{{$guest->remarks}}</td>
                        <td> 
                            @if($guest->id_status==2)
                            <label class="btn btn-danger btn-md"  style="font-size:12px"> {{$guest->status}} </label>
                            @elseif($guest->id_status==1)
                            <label class="btn btn-success btn-md" style="font-size:12px"> {{$guest->status}} </label>
                            @else
                                <i>Null </i>
                            @endif

                        </td>
                        <td> 
                            <a href="{{ url("co/{$guest->id}/cek") }}" class="btn btn-outline-secondary"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></a>
                        </td>
                        <td > 
                            <a href="{{ url("guests/{$guest->id}/show") }}" class="btn btn-outline-info"><i class="fa fa-info-circle"></i></a>
                        </td>
                        <td> 
                            <a href="{{ url("guests/{$guest->id}/edit") }}" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                        </td>
                        
                        <td>
                            <form action="{{ url("guests/{$guest->id}") }}" id="#" method="POST" onsubmit="return confirm('Yakin Hapus Data?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger">
                                <i class="fa fa-trash"></i>
                                </button> 
                            </form>
                        </td>
                       
                @endforeach
                   </tr>  
                </tbody>
                   @else
                        <h5> Data Tidak Ditemukan </h5>
                        @endif
            </table>
            {{$guests->links()}}
            {{-- {!! $guests->render()!!} --}}
            
            {{-- {!! $guests->render()!!} --}}
        Halaman : {{ $guests->currentPage() }} <br/>
        Jumlah Data : {{ $guests->total() }} <br/>
        Data Per Halaman : {{ $guests->perPage() }}

    </div>

  
        <hr>
    
@endsection
    @push('page-scripts')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

   @endpush

   @push('after-scripts')
   
  @endpush

  public function index(Request $request)
    {
            $search = $request->get('search');
            $search1 = $request->get('search1');
            $search2 = $request->get('search2');
          
            $guests = DB::table('guests');

            
        $guests = Guest::leftJoin('lokasis', 'lokasis.id', 'guests.lokasi_id')->leftJoin('statuses', 'statuses.id', 'guests.id_status')
            ->select(
                'guests.*',
                'lokasis.lokasi as lokasi',
                'statuses.status as status' 
                
            );            

            if($search1){
                $guests=$guests->whereDate('datein','>=',$search1);
            }
            
            if($search2){
                $guests=$guests->whereDate('datein','<=',$search2);
            }

            
            if($search){
                $guests=$guests->where('lokasi_id','like','%'.$search.'%');
            }

           
            $guests = $guests->orderBy('id','desc')->paginate(10);
            $guests=$guests->appends($request->all());
           
            return view('layouts.index', compact('guests'));
            // return view('layouts.index', ['guests' => $guests]);

