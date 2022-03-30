<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>BAPPEDA</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/favicon.png">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="{{asset('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/theme/default.css')}}" rel="stylesheet" id="theme" />
	<link href="{{asset('assets/css/mystyle.css')}}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image"><img src="{{ asset('assets/img/background-bappeda.png  ') }}" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
      {{-- Header --}}
      {{-- Jam --}}
      <div class="row" style="z-index: 0; margin: 5px 0px 0px 5px;">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center clock" onload="showTime()">
            <div id="MyDateDisplay" class="date"></div>
            <div id="MyClockDisplay" class="time"></div>
          </div>
      </div>
      
      <div class="row" style="margin-top:30px;">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="wrapper-tengah">
                 <div class="row card-form">
                     <div class="col-md-12 col-sm-12 col-xs-12 m-t-20 text-center">
                         <img src="{{ asset('assets/img/sumbar-logo.png') }}" alt="logo" class="img-shadow mb-2" width="80" style="-webkit-filter: drop-shadow(5px 5px 5px rgb(173, 173, 173)); filter: drop-shadow(5px 5px 5px rgb(167, 166, 166));">
                     </div>
                 </div>
                 <div class="row card-form">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <h3 class=" text-center text-shadow mb-4" style="color:white; text-shadow: 2px 2px 4px #000000;"><strong>Badan Perencanaan Pembangunan Daerah</strong></h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     {{-- End Header --}}

     {{-- Form BukuTamu--}}
     <section class="form_bukutamu">
        <div class="row align-items-center">
            <div class="col-5 col-md-5 col-sm-5 col-xs-5 mx-auto" style="overflow:hidden">
                <div class="rounded px-5 py-3 shadow rounded card-form" style="background: white">
                    <h4 class="text-center mb-3 fw-bold">Buku Tamu</h4>
                    <marquee scrolldelay="150" class="mb-2 text-secondary">Selamat Datang di Badan Perencanaan Pembangunan Daerah Provinsi Sumatra Barat</marquee>

                    <div class="panel panel-inverse">
                        <div class="panel-body panel-form">
                            <form class="form-horizontal" method="POST" autocomplete="off" id="form_bukutamu">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" name="id_tamu" id="id_tamu" type="hidden"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3" for="jenis_tamu">Jenis Tamu </label>
                                    <div class="col-md-8 col-sm-8">
                                        <select class="form-control" name="jenis_tamu" id="jenis_tamu" onchange="updateForm()"> 
                                            <option value="" selected disabled>Status Pembuatan Janji</option> 
                                            <option value="1">Sudah Membuat Janji</option>
                                            <option value="0">Belum Membuat Janji</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden_input">
                                    <label class="control-label col-md-3 col-sm-3" for="nama">Nama </label>
                                    <div class="col-md-8 col-sm-8">
                                        <input class="form-control" type="text" id="nama_tamu" name="nama_tamu" placeholder="Nama Tamu" value="{{ old('nama_tamu') }}" data-parsley-required="true">
                                    </div>
                                </div>
                                <div class="form-group hidden_input">
                                    <label class="control-label col-md-3 col-sm-3" for="jumlah_tamu">Jumlah Tamu </label>
                                    <div class="col-md-8 col-sm-8">
                                        <input class="form-control" type="number" id="jumlah_tamu" name="jumlah_tamu" placeholder="Jumlah Tamu" value="{{ old('jumlah_tamu') }}" data-parsley-required="true">
                                    </div>
                                </div>
                                <div class="form-group hidden_input">
                                    <label class="control-label col-md-3 col-sm-3" for="nama">Instansi </label>
                                    <div class="col-md-8 col-sm-8">
                                        <input class="form-control" type="text" id="instansi" name="instansi" placeholder="Instansi" value="{{ old('instansi') }}" data-parsley-required="true">
                                    </div>
                                </div>
                                <div class="form-group hidden_input">
                                    <label class="control-label col-md-3 col-sm-3" for="nama">Yang Ditemui </label>
                                    <div class="col-md-8 col-sm-8">
                                        <select class="form-control multiple-select2" multiple data-size="5" name="pegawai[]" id="pegawai" data-parsley-required="true" required> 
                                            @foreach($pegawai as $p)
                                                <option value="{{ $p['NIP'] }}" @if (old('pegawai') == $p['NIP']) {{ 'selected' }} @endif>{{ $p['NAMA_PEGAWAI'] }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hidden_input">
                                    <label class="control-label col-md-3 col-sm-3" for="nama">Urusan </label>
                                    <div class="col-md-8 col-sm-8">
                                        <textarea type="text" class="form-control" id="urusan" name="urusan" placeholder="Urusan" rows="3">{{ old('urusan')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group hidden_input">
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-primary" style="" id="btnSimpan"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#formBuatJanjiModal">
                                     Buat Janji Tamu
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
     {{-- end form BukuTamu --}}

     {{-- list Buku Tamu --}}
     @if(!empty($data))
     <section id="list_bukutamu" style="margin-top: 180px; margin-bottom: 50px">
        <div class="row align-items-center reveal">
            <div class="col-10 col-md-10 col-sm-10 col-xs-10 mx-auto" style="overflow:hidden">
                <div class="card px-5 py-4 shadow rounded" style="background: white">
                    <div class="card-header mb-4" style="background: white">
                        <h4 class="font-weight-bold text-left fs-14">Log Tamu : {{ date('d-m-Y') }}</h4>
                    </div>
                    <div class="table-responsive">
                    <table class="listBukuTamu display table table-hover table-bordered table-responsive-md fs-14" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Instansi</th>
                                <th>Jam Masuk</th>
                                <th>Yang Ditemui</th>
                                <th>Urusan</th>
                                <th>Checkout</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $data)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $data->nama_tamu }}</td>
                              <td>{{ $data->instansi }}</td>
                              <td>{{ $data->waktu_masuk }} WIB</td>
                              <td>{{ $data->nama_pegawai }}</td>
                              <td>{{ $data->urusan }}</td>
                              <td>
                                    <button class="btn btn-sm btn-danger" role="button" data-toggle="modal" data-target="#penilaianModal" 
                                    onclick="showModalPenilaian({{$data->id}})">Selesai</button>
                              </td>
                           </tr> 
                           @endforeach
                        </tbody>
                      </table>
                      </div>
                </div>
            </div>
        </div>
     </section>
     @endif     
    {{-- end section list bukutamu --}}
</div>
<!-- end page container -->

    {{-- modal penilaian pelayanan --}}
    <div class="modal fade" id="penilaianModal" tabindex="-1" role="dialog" aria-labelledby="penilaianModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header header-color">
                <img src="{{ asset('assets/img/sumbar-logo.png') }}" alt="logo" class="img-shadow mx-left mr-3" width="50">
                <h5 class="modal-title font-weigth-bold text-white" id="penilaianModalLongTitle" style="font-size: 20px">Badan Perencanaan Pembangunan Daerah<br> Provinsi Sumatera Barat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 35px">
                    <div class="col justify-content-center text-center">
                        <span class="fw-bold" style="font-size: 20px">SILAHKAN BERI PENILAIAN ANDA TERHADAP PELAYANAN KAMI</span>
                    </div>  
                </div>
                <div class="row" style="margin-bottom: 15px">
                    <div class="col-4 justify-content-center text-center">
                        <img src="{{ asset('assets/img/penilaian/tidak_puas.png') }}" width="100">
                    </div>  
                    <div class="col-4 justify-content-center text-center">
                        <img src="{{ asset('assets/img/penilaian/cukup.png') }}" width="100">
                    </div>  
                    <div class="col-4 justify-content-center text-center">
                        <img src="{{ asset('assets/img/penilaian/sangat_puas.png') }}" width="100">
                    </div>    
                </div>
                    <div class="row mb-3">
                        <div class="col-4 justify-content-center text-center">
                            <a class="btn btn-danger nilai_pelayanan" value="0">Kurang Puas</a>
                        </div>  
                        <div class="col-4 justify-content-center text-center">
                            <a class="btn btn-warning nilai_pelayanan" value="1">Cukup Puas</a>
                        </div>
                        <div class="col-4 justify-content-center text-center">
                            <a class="btn btn-success nilai_pelayanan" value="2">Sangat Puas</a>
                        </div> 
                    </div>   
            </div>
        </div>
        </div>
    </div>

    {{-- Modal Form Buat Janji --}}
    <div class="modal fade" id="formBuatJanjiModal" tabindex="-1" role="dialog" aria-labelledby="formBuatJanjiModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class='modal-header header-color' style="background-color: #3a3a3b; 
                                  color:white;
                                  background: -moz-linear-gradient(top, rgba(89,89,89,1) 0%, rgba(59,59,59,1) 47%, rgba(89,89,89,1) 100%);">
                <h5 class='col-12 modal-title text-white fw-bold'>
                    <i class="fa fa-address-book-o"></i> Form Janji Tamu
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'><i style="color:white;" class="fa fa-window-close"></i></span>
                    </button>
                </h5>
            </div>
                <form class="form-horizontal form" method="POST" action="{{ route('store.janjitamu') }}" autocomplete="off" id="form_janjitamu">
                    <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3" for="nama_tamu">Nama </label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="nama_tamu" name="nama_tamu" placeholder="Nama Lengkap" value="{{ old('nama_tamu') }}" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3" for="instansi">Instansi </label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="instansi" name="instansi" placeholder="Instansi Asal" value="{{ old('instansi') }}" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3" for="telepon">Telepon/No. WhatsApp</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="tel" id="telpon" name="telpon" placeholder="08xxxxxxxxxx" value="{{ old('telpon') }}" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3" for="nama">Yang Ditemui </label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control multiple-select2" multiple data-size="5" name="pegawai[]" id="pegawai" style="width: 100%" data-parsley-required="true" required> 
                                @foreach($pegawai as $p)
                                    <option value="{{ $p['NIP'] }}" @if (old('pegawai') == $p['NIP']) {{ 'selected' }} @endif>{{ $p['NAMA_PEGAWAI'] }}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3" for="tanggal_janji">Tanggal Janji </label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="tanggal_janji" placeholder="Tanggal Janji" data-date-format="dd/mm/yyyy" name="tanggal_janji" value="{{ old('tanggal_janji') }}" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3" for="jam_janji">Waktu Janji </label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="time" id="jam_janji" placeholder="Jam Janji" name="jam_janji" value="{{ old('jam_janji') }}" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3" for="nama">Urusan </label>
                        <div class="col-md-8 col-sm-8">
                            <textarea type="text" class="form-control" id="urusan" name="urusan" placeholder="Urusan" rows="3">{{ old('urusan')}}</textarea>
                        </div>
                    </div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	
	<!-- ================== BEGIN BASE JS ================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="{{ asset('assets/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-cookie/jquery.cookie.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
   <script src="assets/js/login-v2.demo.min.js"></script>
   <script src="{{ asset('assets/js/sweetalert/sweetalert2.all.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js') }}"></script> --}}
   <script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
   <script src="{{ asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
   <script src="{{ asset('assets/js/table-manage-default.demo.min.js') }}"></script>
   <script src="{{asset('assets/js/apps.min.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53034621-1', 'auto');
    ga('send', 'pageview');
</script>
{{-- script validasi --}}
<script src="{{ asset('assets/js/form-validate.js') }}"></script>

{{-- jika data berhasil disimpan --}}
@if (Session::has('success'))
    <script>
        Swal.fire({
        icon: 'success',
        title: '{{ Session('success') }}',
        showConfirmButton: true,
        timer: 2000
        })
    </script>
@endif

<script>
    $( document ).ready(function() {
        const pegawai = JSON.parse('@json($pegawai)')
        
        $(".multiple-select2").select2({ 
            placeholder: "  Pilih Pegawai",
            allowClear: true
        });

        $("#tanggal_janji").datepicker({
            autoclose: true,
            startDate: '+1d',
            changeMonth: true
        });

        // datatable
        $('.listBukuTamu').DataTable({
            pageLength: 10,
            lengthMenu: [10, 25, 50, "All"],
        });

        // mengambil id element
        var hidden_elements = document.getElementsByClassName("hidden_input")
        for(var i = 0; i < hidden_elements.length; i++){
            hidden_elements[i].style.display = 'none';
        }   
    });
</script>

{{-- script untuk onscroll --}}
<script>
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}
window.addEventListener("scroll", reveal);

function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59

    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    var day = date.getDate();
    var month = date.getMonth();
    var thisDay = date.getDay(), thisDay = myDays[thisDay];
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s ;
    var today = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
    document.getElementById("MyDateDisplay").innerText = today;
    document.getElementById("MyDateDisplay").textContent = today;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
}
showTime();
</script>

{{-- Script function --}}
<script>
    function showModalPenilaian(id){  
            const tagAs = document.querySelectorAll(".nilai_pelayanan");

            tagAs.forEach((tagA) => {
                tagA.addEventListener("click", function() {
                    const value = tagA.getAttribute("value");
                    tagA.setAttribute("href", `/bukutamu/${id}/${value}`)
            });
        });
    };

    function updateForm(){
        var hidden_elements = document.getElementsByClassName("hidden_input");
        for(var i = 0; i < hidden_elements.length; i++){
            hidden_elements[i].style.display = 'flex';
        }

        // mengambil nilai inputan jenis_tamu
        let jenis_tamu = $('#jenis_tamu').val();
        if(jenis_tamu==1){
            $('#nama_tamu').autocomplete({
                source: function(request, cb){
                    $.ajax({
                        url: '/bukutamu/'+request.term,
                        method: 'GET',
                        dataType: 'json',
                        success: function(res){
                            var result;
                            result = [
                                {
                                    label: 'There is no matching found for '+request.term,
                                    value: ''
                                }
                                
                            ];
                            if(res.length){
                                result = $.map(res, function(obj){
                                    return {
                                        label: obj.nama_tamu,
                                        value: obj.nama_tamu,
                                        data: obj
                                    };
                                });
                            }
                            cb(result);
                        }

                    })
                },
                select:function(e, selectedData){
                    if(selectedData && selectedData.item && selectedData.item.data){
                        var data = selectedData.item.data;

                        if(data.nip != null)
                        var jml = 0;
                        $.each(data.nip.split(","), function(i,e){
                            $("#pegawai").select2().val(data.nip.split(",")).trigger("change");
                            // jml = jml+1;
                        });
                        // $('#jumlah_tamu').val(jml);
                        $('#id_tamu').val(data.id);
                        $('#instansi').val(data.instansi);
                        $('#urusan').val(data.urusan);
                    }
                }
            });

            document.getElementById("btnSimpan").addEventListener("click",  function(){
                let id = $('#id_tamu').val();
                document.getElementById("form_bukutamu").setAttribute("action", `/bukutamu/${id}`);
            });
        }

        else if (jenis_tamu==0){
            document.getElementById("nama_tamu").value="";
            document.getElementById("jumlah_tamu").value="";
            document.getElementById("instansi").value="";
            $('#pegawai').val([]);
            $("#pegawai").select2({
                placeholder: "  Pilih Pegawai",
            });
            document.getElementById("urusan").value="";

            document.getElementById("form_bukutamu").setAttribute("action", "{{ route('store.bukutamu') }}");
        }     
    };
</script>

</body>
</html>

