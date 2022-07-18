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
            <div class="col-8 col-md-8 col-sm-8 col-xs-8 mx-auto" style="overflow:hidden">
                <div class="rounded px-5 py-3 shadow rounded card-form" style="background: white">
                    <h4 class="text-center mb-5 mt-4 fw-bold">SILAHKAN BERI PENILAIAN ANDA TERHADAP PELAYANAN KAMI</h4>
                    <!-- <marquee scrolldelay="150" class="mb-2 text-secondary">Selamat Datang di Badan Perencanaan Pembangunan Daerah Provinsi Sumatra Barat</marquee> -->

                    <div class="panel panel-inverse">
                        <div class="panel-body panel-form">
                            <form class="form-horizontal" method="POST" autocomplete="off" action="{{ route('store.penilaiantamu', ['id' => Request::segment(3)]) }}" id="form_pelayanan">
                                @csrf
                                 <div class="row">
                                    <div class="col-4 justify-content-center text-center">
                                       <h5><span class="badge bg-danger">Kurang Puas</span></h5>
                                    </div>  
                                    <div class="col-4 justify-content-center text-center">
                                       <h5><span class="badge bg-warning">Cukup Puas</span></h5>   
                                    </div>
                                    <div class="col-4 justify-content-center text-center">
                                       <h5><span class="badge bg-success">Sangat Puas</span></h5>
                                    </div> 
                                 </div> 
                                 <div class="row mb-2" style="margin-bottom: 15px">
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
                                 <div class="row mb-4">
                                    <div class="col-4 justify-content-center text-center">
                                       <input type="checkbox" class="form-check-input" id="check_krgpuas" name="nilai" onclick="onlyOne(this)" value="0">
                                    </div>  
                                    <div class="col-4 justify-content-center text-center">
                                       <input type="checkbox" class="form-check-input" id="check_ckppuas" name="nilai" onclick="onlyOne(this)" value="1">
                                    </div>
                                    <div class="col-4 justify-content-center text-center">
                                       <input type="checkbox" class="form-check-input" id="check_puas" name="nilai" onclick="onlyOne(this)" value="2">
                                    </div> 
                                 </div> 
                                 <div class="row mt-4 mb-3">
                                    <div class="col-12 justify-content-center">
                                       <label for="kritik_saran">Kritik/Saran/Komentar Anda<span class="text-danger"> *(wajib diisi)<span></label>
                                    </div>
                                    <div class="col-12 justify-content-center">
                                       <textarea class="form-control" id="kritik_saran" rows="4" name="kritik_saran" style="resize: none" required></textarea>
                                    </div>
                                 </div> 
                                 <div class="col-md-12 col-sm-12 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan Penilaian</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
     {{-- end form Penilaian Pelayanan Tamu --}}
</div>
<!-- end page container -->

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

@if (Session::has('success'))
    <script>
        Swal.fire({
        icon: 'success',
        title: '{{ Session('success') }}',
        showConfirmButton: true,
        showCloseButton: true,
        timer: 3000
        })
    </script>
@endif
@if (Session::has('error'))
    <script>
        Swal.fire({
        icon: 'error',
        title: '{{ Session('error') }}',
        showConfirmButton: true,
        showCloseButton: true,
        timer: 3000
        })
    </script>
@endif

<script>
function onlyOne(checkbox) {
   var checkboxes = document.getElementsByName('nilai')
   checkboxes.forEach((item) => {
      if (item !== checkbox) item.checked = false
   })
}
</script>

</body>
</html>

