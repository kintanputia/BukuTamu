<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Pemerintahan Daerah">
    <meta name="author" content="Krucel">
    <title>SAKATO PLAN - DASHBOARD</title>
    <link rel="icon" type="image/png" sizes="16x16" href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/favicon.png">

    <link href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/bootstrap.min.css" rel="stylesheet">
    <link href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/jquery.dataTables.min.css" rel="stylesheet">
    <link href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/animate.css" rel="stylesheet">
    <link href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/style.css" rel="stylesheet">
    <link href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/jqvmap.css" rel="stylesheet">
    <link href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/red-dark.css" rel="stylesheet">
    <link href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/extra_colors.css" rel="stylesheet">
    <link href="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/form.css" rel="stylesheet">
    <link href="http://sakatoplan.sumbarprov.go.id/assets/coloradmin/plugins/select2/dist/css/select2.min.css" rel="stylesheet">

    <link href="http://sakatoplan.sumbarprov.go.id/assets/lib/sweet-alert/sweetalert.css" rel="stylesheet">
    <script src="http://sakatoplan.sumbarprov.go.id/assets/lib/sweet-alert/sweetalert-dev.js"></script>
    <script src="http://sakatoplan.sumbarprov.go.id/assets/coloradmin/plugins/select2/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

 
    <style type="text/css">
    .title{
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      /*-webkit-transition: .1s all linear;*/
      text-decoration: none;
      display: inline-block;
      position: relative;
      -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.7) 30%, #000 50%, rgba(0,0,0,.7) 70%);
      -webkit-mask-size: 200%;
      animation: shine 2s linear infinite;
    }
    @keyframes  shine {
      from { -webkit-mask-position: 150%; }
      to { -webkit-mask-position: -50%; }
    }
    .setbulet {
      animation: bulet-in 2s ease-in-out both; cursor: pointer;
    }
    .setbulet h3, .setbulet h4, .setbulet h5, .setbulet h6 { position: relative;top: 5px;left: 50%;margin-right: -50%;transform: translate(-48%, -48%);font-weight:bold }
    .bulet {
      border-radius: 50px; width: 88px; height: 88px;margin-left: auto;margin-right: auto; cursor: pointer; box-shadow: inset 0 0 4px #2e3642;
    }
    .bulet h3, .bulet h4, .bulet h5, .bulet h6 { position: relative;top: 10px;left: 50%;margin-right: -50%;transform: translate(-50%, -50%) }
    .bulet i { position: relative;top: 15px;left: 27%;margin-right: -27%;transform: translate(-27%, -27%);font-size:20pt }
    .bulet img { position: relative;top:10px;left:50%;margin-left:-30px;margin-right:-50px;width:60px }
    
    @keyframes  bulet-in {
      0% { opacity: 0; transform: scale(0);}
      80% { opacity: 0; transform: scale(0);}
      100% { opacity: 1; transform: scale(1);}
    }

    .pull-up { transition: all 0.25s ease; }
    .pull-up:hover { transform: translateY(-4px) scale(1.02); box-shadow: 0px 14px 24px rgba(62, 57, 107, 0.2); z-index: 999; box-shadow: inset 0 0 4px #2e3642;}

    .wrapper-tengah{ padding-left:20px; padding-right:20px; margin-right: auto; margin-left: auto; width: 600px; }
    @media (max-width:480px){.wrapper-tengah{ width: 90%; }}
    @media (min-width:968px){.bulet-1{margin-left: 11%; }}

    .text-outline {
      color: #FFFFFF;
      text-shadow: 2px 2px 0 #4074b5, 2px -2px 0 #4074b5, -2px 2px 0 #4074b5, -2px -2px 0 #4074b5, 2px 0px 0 #4074b5, 0px 2px 0 #4074b5, -2px 0px 0 #4074b5, 0px -2px 0 #4074b5;
    }
    .jqvmap-zoomin, .jqvmap-zoomout{width:15px;height:15px;}
    #vmap{min-width: 900px; min-height: 400px; margin:0 auto;border:2px solid #dcdfdf;}
    #vmap-daerah{min-width: 900px; min-height: 400px; margin:0 auto;border:transparent;}
    .running_man{
        font-size: 15px;
        color:#000;
        z-index: 101;
        background-color: yellow;
        line-height: 30px;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
        display:none;
    }
    </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>

<body class="fix-header" data-new-gr-c-s-check-loaded="14.1052.0" data-gr-ext-installed="">



    <div>
                <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper-portal " style="margin-left:0px;min-height:650px;width:100%;">
            <div class="portal-wrapper" id="particles-js"><canvas class="particles-js-canvas-el" width="972" height="1200" style="width: 100%; height: 100%;"></canvas></div>

      
      <div class="container-fluid">
                <div class="row" style="margin-top:50px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;">
               <i class="fa fa-tags"></i> <strong> Dasar Hukum Perencanaan Daerah</strong>
            </button>
            <div class="dropdown-menu" style="width:100%;">
                <div>SOP</div>
                <a class="dropdown-item" target="_blank" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/SOP Perencanaan.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong> Perencanaan Murni</strong>    </a><br>
                <a class="dropdown-item" target="_blank" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/SOP Perencanaan Perubahan.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong> Perencanaan Perubahan</strong>    </a>
                <div>Perpres</div>
                <a class="dropdown-item" target="_blank" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/Perpres Nomor 39 Tahun 2019 tentang Satu Data Indonesia.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong> Nomor 39 Tahun 2019</strong>    </a>
                <div>Permendagri</div>
                <div class="dropdown-divider"><a target="_blank" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/Permendagri-No-86-TH-2017.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong> Nomor 86 Tahun 2017</strong> </a></div>
                <div class="dropdown-divider"><a target="_blank" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/Permendagri No 90 Tahun 2019.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong>  Nomor 90 Tahun 2019</strong> </a></div>
                <div>Kepmendagri</div>
                <div class="dropdown-divider"><a target="_blank" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/Kepmendagri 050-3708 Tahun 2020 Pemutakhiran.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong> Nomor 050-3708 Tahun 2020</strong> </a></div>
                <div class="dropdown-divider"><a target="_blank" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/Kepmendagri 050_5889 Tahun 2021.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong> Nomor 050-5889 Tahun 2021</strong> </a></div>
                

                <div>Pergub</div>
                <a target="_blank" class="dropdown-item" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/PERGUB_NOMOR_2_TAHUN_2018_MEKANISME PEMBERIAN BAHAN BAKAR MINYAK.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong>   Nomor 2 Tahun 2018 </strong> </a><br>
                <a target="_blank" class="dropdown-item" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/PERGUB NO. 43 TH 2021 TENTANG PERUBAHAN PERGUB NO. 7 TENTANG SHS PROV. SUMBAR.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong>  Nomor 43 Tahun 2021</strong> </a><br>
                <a target="_blank" class="dropdown-item" href="http://sakatoplan.sumbarprov.go.id/Pergub_Hibah.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong> Nomor 18 Tahun 2021</strong> </a><br>
                <a target="_blank" class="dropdown-item" href="http://sakatoplan.sumbarprov.go.id/uploads/peraturan/Peraturan Gubernur Nomor 1 Tahun 2022 tentang Bantuan Keuangan.pdf"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <strong> Nomor 1 Th. 2022</strong> </a><br>
               
            </div>
            </div>
                    <div class="wrapper-tengah">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 m-t-20 text-center">
                                <img src="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/admin-logo.png" alt="logo" class="img-shadow animate__animated animate__zoomIn" width="80">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 animate__animated animate__zoomIn">
                                <h2 class=" text-center text-shadow" style="color:white;font-weight: bold;margin-bottom:10px;">Badan Perencanaan Pembangunan Daerah 
                                </h2>
                                <!--<h2 class="text-outline text-center text-shadow" style='color:orange;font-weight: bold;margin-top:0px;'>SAKATO PLAN</h2>-->
                <!--<center><span style='background-color:#fa1d2c;color:white;padding:5px;font-size: 24px;border-radius:10px;'><b>SAKATO PLAN</b></span></center>-->
                
                            </div>
                        </div><br>
                        <div class="row">
                            <!--Form login-->
                            <div class="panel-login animate__animated animate__zoomIn">

                <div class="content">
        <center><img src="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/logo_sakatoplan.png" alt="logo" class="animate__animated animate__zoomIn" width="150" style="margin-bottom:10px;"></center>
                    <form action="{{ route('login') }}" method="post" id="loginform">
                        @csrf
                        <div class="form-group">
                        <label for="username" class="form-label" style="color:#333;font-weight: 700;"><b>Username</b></label>
                            
                            <input type="text" class="form-control" placeholder="Username" required="" name="username" id="userX" autocomplete="off" autofocus="">
                            <input type="hidden" name="user" id="user">
                        </div>
                        <div class="input-group">
                            <label for="password" class="form-label" style="color:#333;font-weight: 700;"><b>Password</b></label>
                            <input type="password" class="form-control" placeholder="Password" required="" name="password" id="passX" style="margin-bottom: 5px;">
                            <span class="input-group-btn">
                                <button onclick="btnShowPass(event)" class="btn btn-primary" type="button"><i class="fa fa-eye-slash"></i></button>
                            </span>
                            <input type="hidden" name="pass" id="pass">
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block" id="login" name="login"> <strong>LOG IN</strong> </button>
                            <a class="btn btn-warning btn-block" href="#" onclick="formRegister()" data-toggle="modal" data-target=".login-register-form"><i class="fa fa-address-book-o"></i> <strong> Daftar Akun Login Pengusul Hibah </strong></a>
                            <hr>
                        </div> 
                    </form>
                </div>
            </div>
              <!--End Form login-->
                        </div>

<!---------------------------------->
    <div class="modal fade" id="modalForm" data-backdrop="static" aria-hidden="true" style="width:100%;">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #3a3a3b; 
                                  color:white;
                                  background: -moz-linear-gradient(top, rgba(89,89,89,1) 0%, rgba(59,59,59,1) 47%, rgba(89,89,89,1) 100%);">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> <i style="color:white;" class="fa fa-window-close"></i></span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-address-book-o"></i> <strong style="color:white;">Form Registrasi </strong></h4>
                </div>
                <div class="modal-body">                            
                  <form class="">
                  <fieldset>
               
                        <input type="hidden" id="id_user" name="id_user">
                        <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>Kategori Instansi/Organisasi/Lembaga/Individu </strong> </label>
                            <select required="" class="form-control select2" style="width:100%;" name="unit_hibah" id="unit_hibah" onchange="infoDataDukung()">
                                <option value="">-- Kategori Lembaga/Organisasi --</option>
                                                  
                                <option value="1">1 - Pemerintah Pusat</option>              
                                               
                                <option value="2">2 - Pemerintah Daerah Lainnya</option>              
                                               
                                <option value="3">3 - BUMN</option>              
                                               
                                <option value="4">4 - BUMD</option>              
                                               
                                <option value="5">5 - Badan Dan Lembaga Yang Berbadan Hukum Indonesia (Diluar Koperasi Dan Masjid)</option>              
                                               
                                <option value="6">6 - Organisasi Kemasyarakatan Yang Berbadan Hukum Indonesia</option>              
                                               
                                <option value="7">7 - Partai Politik</option>              
                                               
                                <option value="8">8 - Badan Dan Lembaga Yang Berbadan Hukum Indonesia (Khusus Koperasi)</option>              
                                               
                                <option value="9">9 - Badan Dan Lembaga Yang Berbadan Hukum Indonesia (Khusus Masjid)</option>              
                                               
                                <option value="10">10 - Badan Dan Lembaga Yang Berbadan Hukum Indonesia (Khusus Panti)</option>              
                                               
                                <option value="11">11 - Badan Dan Lembaga Yang Berbadan Hukum Indonesia (Khusus Majelis Taklim//wirid Yasinan)</option>              
                                                             </select>         
                        </div>  

                        <div id="data_dukung" style="display: none;">
                            
                        <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>Nama Lembaga</strong> </label>
                            <select class="form-control select2" style="width:100%;" name="nama_lembagax" id="nama_lembagax">
                                <option value="">-- Nama Lembaga/Organisasi --</option>
                                              
                                <option value="1">[KD.1301.1] PSAA. BINA SOSIAL LAKITAN - KAB. PESISIR SELATAN </option>              
                                              
                                <option value="2">[KD.1301.2] PA. MUHAMMADIYAH PESISIR SELATAN - KAB. PESISIR SELATAN </option>              
                                              
                                <option value="3">[KD.1301.3] PSAA. AL KASYAF SALIDO - KAB. PESISIR SELATAN </option>              
                                              
                                <option value="4">[KD.1301.4] PA. BINA HARAPAN SALIDO - KAB. PESISIR SELATAN </option>              
                                              
                                <option value="5">[KD.1301.5] PSAA. KOTO XI TARUSAN - KAB. PESISIR SELATAN </option>              
                                              
                                <option value="112">[KD.1301.112] PPAC SLB PAINAN - KAB. PESISIR SELATAN </option>              
                                              
                                <option value="6">[KD.1302.6] PSAA. NURUL IMAN ALAHAN PANJANG - KAB. SOLOK </option>              
                                              
                                <option value="7">[KD.1302.7] PSAA. SYEKH MUHAMMAD MUHSIN/ YYS YASRITA  - KAB. SOLOK </option>              
                                              
                                <option value="8">[KD.1302.8] PSAA. PKU MUHAMMADIYAH KUBUNG/ BUKIT KILI - KAB. SOLOK </option>              
                                              
                                <option value="9">[KD.1303.9] PSAA. NURUL IMAN ENAM BERLIAN - KAB. SIJUNJUNG </option>              
                                              
                                <option value="10">[KD.1303.10] PSAA DARUL JANNAH - KAB. SIJUNJUNG </option>              
                                              
                                <option value="11">[KD.1304.11] PA. MUHAMMADIYAH PADANG LAWEH MALALO - KAB. TANAH DATAR </option>              
                                              
                                <option value="12">[KD.1304.12] PSAA. AT TAQWA MUHAMMADIYAH PADANG LUAR - KAB. TANAH DATAR </option>              
                                              
                                <option value="13">[KD.1304.13] PSAA. AISYIYAH CABANG BATU SANGKAR - KAB. TANAH DATAR </option>              
                                              
                                <option value="14">[KD.1304.14] PSAA. ADE IRMA SURYANI NASUTION  - KAB. TANAH DATAR </option>              
                                              
                                <option value="15">[KD.1304.15] PSAA. MUHAMMADIYAH LIMO KAUM - KAB. TANAH DATAR </option>              
                                              
                                <option value="16">[KD.1304.16] PSAA. AISYIYAH CAB. BARULAK - KAB. TANAH DATAR </option>              
                                              
                                <option value="17">[KD.1304.17] PSAA. AISYIYAH RANTING SUNGAYANG - KAB. TANAH DATAR </option>              
                                              
                                <option value="18">[KD.1304.18] PSAA. HIDAYAH ILAHI - KAB. TANAH DATAR </option>              
                                              
                                <option value="19">[KD.1304.19] PSAA. TUAN KADHI PADANG GANTING - KAB. TANAH DATAR </option>              
                                              
                                <option value="20">[KD.1304.20] PSAA. AISYIYAH CABANG TANJUNG BONAI - KAB. TANAH DATAR </option>              
                                              
                                <option value="21">[KD.1304.21] PSAA. AISYIYAH TAPI SELO - KAB. TANAH DATAR </option>              
                                              
                                <option value="113">[KD.1304.113] PA. WARAQIL JANNAH - KAB. TANAH DATAR </option>              
                                              
                                <option value="22">[KD.1305.22] PA. AISYIYAH LUBUK ALUNG - KAB. PADANG PARIAMAN </option>              
                                              
                                <option value="23">[KD.1305.23] PA.BHAKTI WANITA ISLAM LUBUK ALUNG - KAB. PADANG PARIAMAN </option>              
                                              
                                <option value="24">[KD.1305.24] PSAA. MUKARAMMAH PAUH KAMBAR - KAB. PADANG PARIAMAN </option>              
                                              
                                <option value="25">[KD.1305.25] PSAA. UMMATUL YAQIN - KAB. PADANG PARIAMAN </option>              
                                              
                                <option value="26">[KD.1305.26] PA. AL-KAUTSAR MUHAMMADIAH - KAB. PADANG PARIAMAN </option>              
                                              
                                <option value="114">[KD.1305.114] PA. MUTIARA BUDI - KAB. PADANG PARIAMAN </option>              
                                              
                                <option value="115">[KD.1305.115] PA. AMAL BAKTI SICINCIN - KAB. PADANG PARIAMAN </option>              
                                              
                                <option value="27">[KD.1306.27] PSAA. AISYIYAH CABANG TANJUNG MUTIARA  - KAB. AGAM </option>              
                                              
                                <option value="28">[KD.1306.28] PSAA. AISYIYAH CABANG SRI ANTOKAN - KAB. AGAM </option>              
                                              
                                <option value="29">[KD.1306.29] PSAA. MUHAMMADIYAH PUTRA CABANG SRI ANTOKAN - KAB. AGAM </option>              
                                              
                                <option value="30">[KD.1306.30] PSAA. AISYIYAH CABANG TANJUNG RAYA - KAB. AGAM </option>              
                                              
                                <option value="31">[KD.1306.31] PSAA. AL MAUN - KAB. AGAM </option>              
                                              
                                <option value="32">[KD.1306.32] PSAA. AISYIYAH CABANG MATUR - KAB. AGAM </option>              
                                              
                                <option value="33">[KD.1306.33] PA. MANDE KANDUANG - KAB. AGAM </option>              
                                              
                                <option value="34">[KD.1306.34] PSAA. MUHAMMADIYAH RANTING CINGKARING - KAB. AGAM </option>              
                                              
                                <option value="35">[KD.1306.35] PSAA.  KASIH SAYANG - KAB. AGAM </option>              
                                              
                                <option value="36">[KD.1306.36] PSAA. AUR PAKAN KAMIS - KAB. AGAM </option>              
                                              
                                <option value="37">[KD.1306.37] PSAA. HANIFA - KAB. AGAM </option>              
                                              
                                <option value="38">[KD.1306.38] PSAA. AISYIYAH CABANG SALAREH AIA - KAB. AGAM </option>              
                                              
                                <option value="39">[KD.1306.39] PSAA. AISYIYAH RANTING BATU KAMBING - KAB. AGAM </option>              
                                              
                                <option value="40">[KD.1306.40] PSAA. AMANAH V SUKU CANDUANG  - KAB. AGAM </option>              
                                              
                                <option value="41">[KD.1306.41] PSAA. IKHWANUS-SHAFA - KAB. AGAM </option>              
                                              
                                <option value="42">[KD.1306.42] PSAA. AN NUR PASANEHAN - KAB. AGAM </option>              
                                              
                                <option value="43">[KD.1306.43] PSAA. AISYIYAH KAMANG HILIR / TILATANG KAMANG - KAB. AGAM </option>              
                                              
                                <option value="110">[KD.1306.110] PSTW. IKHWANUS SAFA - KAB. AGAM </option>              
                                              
                                <option value="116">[KD.1306.116] PANTI CACAT PADANG TUJUH AGAM - KAB. AGAM </option>              
                                              
                                <option value="44">[KD.1307.44] PSAA. MUHAMMADIYAH CABANG GUGUK II  - KAB. 50 KOTA </option>              
                                              
                                <option value="45">[KD.1307.45] PSAA. DARUL FUNUN EL ABBASIYAH  - KAB. 50 KOTA </option>              
                                              
                                <option value="46">[KD.1307.46] PSAA. MITRA - KAB. 50 KOTA </option>              
                                              
                                <option value="47">[KD.1307.47] PSAA. ANAK YATIM DAN ANAK TERLANTAR (PAYAT) IBRAHIM  - KAB. 50 KOTA </option>              
                                              
                                <option value="48">[KD.1307.48] PSAA. BUSTANUL ULUM - KAB. 50 KOTA </option>              
                                              
                                <option value="111">[KD.1307.111] PSTW JASA IBU - KAB. 50 KOTA </option>              
                                              
                                <option value="117">[KD.1307.117] PANTI YPPLB A TUNA NETRA LIMA PULUH KOTA - KAB. 50 KOTA </option>              
                                              
                                <option value="118">[KD.1307.118] PA. SDLB TARANTANG LIMA PULUH KOTA - KAB. 50 KOTA </option>              
                                              
                                <option value="119">[KD.1307.119] PA. NURUL MUSTAKIM LIMA PULUH KOTA - KAB. 50 KOTA </option>              
                                              
                                <option value="49">[KD.1308.49] PSAA. IMAM BONJOL - KAB. PASAMAN </option>              
                                              
                                <option value="50">[KD.1308.50] PA. YATIM PUTERI BHAKTI IBU - KAB. PASAMAN </option>              
                                              
                                <option value="51">[KD.1308.51] PSAA MUHAMMADIYAH AL FURQAAN  - KAB. PASAMAN </option>              
                                              
                                <option value="52">[KD.1308.52] PSAA. DARUL HIKMAH (IPHI) - KAB. PASAMAN </option>              
                                              
                                <option value="53">[KD.1308.53] PSAA. TUANGKU RAO - KAB. PASAMAN </option>              
                                              
                                <option value="120">[KD.1308.120] YPAC/YAPPAT SDLB PANTI PASAMAN - KAB. PASAMAN </option>              
                                              
                                <option value="54">[KD.1309.54] PSAA. KAUM - KAB. KEP. MENTAWAI </option>              
                                              
                                <option value="55">[KD.1309.55] PA. AMAL MENTAWAI - KAB. KEP. MENTAWAI </option>              
                                              
                                <option value="56">[KD.1309.56] PS. DARUL ULUM MENTAWAI  - KAB. KEP. MENTAWAI </option>              
                                              
                                <option value="57">[KD.1309.57] PA. PELITA PEDULI KASIH - KAB. KEP. MENTAWAI </option>              
                                              
                                <option value="58">[KD.1310.58] PSAA. PEMBANGUNAN PULAU PUNJUNG - KAB. DHARMASRAYA </option>              
                                              
                                <option value="59">[KD.1310.59] PSAA. NURUL IMAN PISANG REBUS - KAB. DHARMASRAYA </option>              
                                              
                                <option value="60">[KD.1311.60] PA. BABUL JANNAH - KAB. SOLOK SELATAN  </option>              
                                              
                                <option value="61">[KD.1311.61] PSAA. AL HIDAYAH MUARA LABUH - KAB. SOLOK SELATAN  </option>              
                                              
                                <option value="62">[KD.1311.62] PA. AR-RAHMAN MUHAMMADIYAH - KAB. SOLOK SELATAN  </option>              
                                              
                                <option value="63">[KD.1311.63] PA. BAITUL MAKMUR - KAB. SOLOK SELATAN  </option>              
                                              
                                <option value="64">[KD.1312.64] PA. AISYYAH SEI.JERNIH TALU - KAB. PASAMAN BARAT </option>              
                                              
                                <option value="65">[KD.1312.65] PSAA. BAITUR RAFKI AS SA'ADIYAH - KAB. PASAMAN BARAT </option>              
                                              
                                <option value="66">[KD.1312.66] PSAA. HAJI ABDULLAH - KAB. PASAMAN BARAT </option>              
                                              
                                <option value="67">[KD.1312.67] PSAA. DARUL FIKRI - KAB. PASAMAN BARAT </option>              
                                              
                                <option value="68">[KD.1312.68] PA. JAMALIYAH TAMIANG AMPALU  - KAB. PASAMAN BARAT </option>              
                                              
                                <option value="69">[KD.1312.69] PA. ZAMIGA - KAB. PASAMAN BARAT </option>              
                                              
                                <option value="70">[KD.1371.70] PA. AMANAH PUTRI - KOTA PADANG </option>              
                                              
                                <option value="71">[KD.1371.71] PSAA. WIRA LISNA - KOTA PADANG </option>              
                                              
                                <option value="72">[KD.1371.72] PSAA. YATIM PIATU DAN ANAK TERLANTAR RIDHO RAHMAT - KOTA PADANG </option>              
                                              
                                <option value="73">[KD.1371.73] PSAA. YATIM PGAI PADANG - KOTA PADANG </option>              
                                              
                                <option value="74">[KD.1371.74] PA. AN-NISA' - KOTA PADANG </option>              
                                              
                                <option value="75">[KD.1371.75] PSAA. PUTRA BANGSA YAYASAN BUDI MULIA - KOTA PADANG </option>              
                                              
                                <option value="76">[KD.1371.76] PSAA. PANTI ASUHAN KHUSUS ANAK MENTAWAI (PAKAM) PURUS - KOTA PADANG </option>              
                                              
                                <option value="77">[KD.1371.77] PA. BAITUL HIDAYAH AL MUKARAHMAH - KOTA PADANG </option>              
                                              
                                <option value="78">[KD.1371.78] PSAA. AISYIYAH DAERAH KOTA PADANG  - KOTA PADANG </option>              
                                              
                                <option value="79">[KD.1371.79] PSAA. PANTI ASUHAN KHUSUS ANAK MENTAWAI GURUN LAWAS - KOTA PADANG </option>              
                                              
                                <option value="80">[KD.1371.80] PSAA. ANAK ASUH LUBUK KILANGAN - KOTA PADANG </option>              
                                              
                                <option value="81">[KD.1371.81] PA. ANAK MENTAWAI DAN YATIM ULU GADUT H. SYAFRI MOESA - KOTA PADANG </option>              
                                              
                                <option value="82">[KD.1371.82] PSAA. MUHAMMADIYAH PAUH V LIMAU MANIS - KOTA PADANG </option>              
                                              
                                <option value="83">[KD.1371.83] PSAA. AISYIYAH CABANG AMPANG - KOTA PADANG </option>              
                                              
                                <option value="84">[KD.1371.84] PSAA. AL HIDAYAH - KOTA PADANG </option>              
                                              
                                <option value="85">[KD.1371.85] PSAA. NURUL HIKMAH - KOTA PADANG </option>              
                                              
                                <option value="86">[KD.1371.86] PA. AMANAH BKS PA - KOTA PADANG </option>              
                                              
                                <option value="87">[KD.1371.87] PSAA. AISYIYAH NANGGALO - KOTA PADANG </option>              
                                              
                                <option value="88">[KD.1371.88] PSAA. DARUL MA'ARIF AL KARIMIYAH - KOTA PADANG </option>              
                                              
                                <option value="89">[KD.1371.89] PA. AISYIYAH PUTRA NANGGALO - KOTA PADANG </option>              
                                              
                                <option value="90">[KD.1371.90] PA. NUR ILAHI - KOTA PADANG </option>              
                                              
                                <option value="91">[KD.1371.91] PA. AL-IHSAN - KOTA PADANG </option>              
                                              
                                <option value="92">[KD.1371.92] PSAA. BUNDO SAIYO  - KOTA PADANG </option>              
                                              
                                <option value="93">[KD.1371.93] PA. AISYIYAH CAB. KOTO TANGAH TIMUR - KOTA PADANG </option>              
                                              
                                <option value="94">[KD.1371.94] PSAA. LIGA DA'WAH - KOTA PADANG </option>              
                                              
                                <option value="95">[KD.1371.95] PSAA. PUTI BUNGSU / Yayasan BHAKTI IBU - KOTA PADANG </option>              
                                              
                                <option value="96">[KD.1371.96] PA. Al-FALAH - KOTA PADANG </option>              
                                              
                                <option value="97">[KD.1371.97] PA. SAYYIDAH ADAWIYAH - KOTA PADANG </option>              
                                              
                                <option value="98">[KD.1371.98] PA. ANAK &amp; BALITA AL-HURUL-AIN - KOTA PADANG </option>              
                                              
                                <option value="99">[KD.1371.99] PSAA.  AL FALAH Parupuak Tabing - KOTA PADANG </option>              
                                              
                                <option value="100">[KD.1371.100] PSAA. AISYIYAH KOTO TANGAH - KOTA PADANG </option>              
                                              
                                <option value="121">[KD.1371.121] PA. BELAIAN KASIH YPAC - SUMATERA BARAT - KOTA PADANG </option>              
                                              
                                <option value="101">[KD.1373.101] PSAA. YAYASAN PENYANTUN ANAK YATIM (YPAY)  - KOTA SAWAHLUNTO </option>              
                                              
                                <option value="122">[KD.1373.122] PA. YPPC WARINGIN LUBANG PANJANG KOTA SAWAHLUNTO - KOTA SAWAHLUNTO </option>              
                                              
                                <option value="102">[KD.1374.102] PSAA. AISYIYAH CABANG PADANG PANJANG - KOTA PADANG PANJANG </option>              
                                              
                                <option value="123">[KD.1374.123] PANTI AMANAH BUNDO - KOTA PADANG PANJANG </option>              
                                              
                                <option value="103">[KD.1375.103] PSAA. AISYIYAH BUKITTINGGI - KOTA BUKITTINGGI </option>              
                                              
                                <option value="104">[KD.1375.104] PSAA. DARUL MAARIF - KOTA BUKITTINGGI </option>              
                                              
                                <option value="105">[KD.1376.105] PSAA. AISYIYAH CABANG PAYAKUMBUH - KOTA PAYAKUMBUH </option>              
                                              
                                <option value="124">[KD.1376.124] PA. TUNA RUNGU PAYAKUMBUH - KOTA PAYAKUMBUH </option>              
                                              
                                <option value="106">[KD.1377.106] PA. SAHABAT YATIM DHUAFA - KOTA PARIAMAN </option>              
                                              
                                <option value="107">[KD.1377.107] PSAA. AISYIYAH PARIAMAN - KOTA PARIAMAN </option>              
                                              
                                <option value="108">[KD.1377.108] PSAA. YATIM MISKIN CBG MUHAMMADIYAH PARIAMAN SELATAN KURAI TAJI - KOTA PARIAMAN </option>              
                                              
                                <option value="109">[KD.1377.109] PANTI ASUHAN AL-KHAIRAT - KOTA PARIAMAN </option>              
                                                            </select>         
                        </div>  
                     </div>
                     <div id="data_dukung1" style="display: none;">
                            <div class="form-group col-md-12">
                                <label for="inputPassword4"><strong>Nama Lembaga </strong> </label>
                                <input class="form-control" placeholder="Nama Lembaga " type="text" name="nama_lembaga" id="nama_lembaga">
                                <label for=""><i style="color:red;">(* Nama Lembaga Tidak Disingkat)</i></label>
                                <span id="nmorinduk"></span>
                            </div>
                        </div>

                     </fieldset></form></div>                       
                                
                      

                        <div class="form-group col-md-12">
                            <label for="inputPassword4"><strong>Nama Lengkap Ketua</strong> </label>
                            <input class="form-control" placeholder="Nama Lengkap Ketua" type="text" name="ketua" id="ketua">
                        </div>
                                        
                         
                        <div class="form-group col-md-12">
                            <label for="inputPassword4"><strong>Alamat Instansi/Lembaga/Organisasi/Parpol</strong>  </label>
                            <textarea required="" id="alamat" autocomplete="off" name="alamat" placeholder="Input Data Alamat" rows="2" cols="100" width="100%" class="form-control"></textarea>              
                        </div>

                        <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>Kabupaten/Kota</strong> </label>
                            <select class="form-control select2" style="width:100%;" name="id_kabupaten" id="id_kabupaten" onchange="get_select(this,'id_kecamatan','http://sakatoplan.sumbarprov.go.id/signin/login/get_kecamatan/')">
                                <option value="">-- Pilih Kabupaten/Kota --</option>
                                              
                                <option value="1306">1306-KAB. AGAM</option>              
                                              
                                <option value="1310">1310-KAB. DHARMASRAYA</option>              
                                              
                                <option value="1309">1309-KAB. KEPULAUAN MENTAWAI</option>              
                                              
                                <option value="1307">1307-KAB. LIMA PULUH KOTA</option>              
                                              
                                <option value="1305">1305-KAB. PADANG PARIAMAN</option>              
                                              
                                <option value="1308">1308-KAB. PASAMAN</option>              
                                              
                                <option value="1312">1312-KAB. PASAMAN BARAT</option>              
                                              
                                <option value="1301">1301-KAB. PESISIR SELATAN</option>              
                                              
                                <option value="1303">1303-KAB. SIJUNJUNG</option>              
                                              
                                <option value="1302">1302-KAB. SOLOK</option>              
                                              
                                <option value="1311">1311-KAB. SOLOK SELATAN</option>              
                                              
                                <option value="1304">1304-KAB. TANAH DATAR</option>              
                                              
                                <option value="1375">1375-KOTA BUKITTINGGI</option>              
                                              
                                <option value="1371">1371-KOTA PADANG</option>              
                                              
                                <option value="1374">1374-KOTA PADANG PANJANG</option>              
                                              
                                <option value="1377">1377-KOTA PARIAMAN</option>              
                                              
                                <option value="1376">1376-KOTA PAYAKUMBUH</option>              
                                              
                                <option value="1373">1373-KOTA SAWAHLUNTO</option>              
                                              
                                <option value="1372">1372-KOTA SOLOK</option>              
                                                            </select>         
                        </div>  

                                      

                    <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>Kecamatan</strong> </label>
                        <select class="form-control select2" name="id_kecamatan" id="id_kecamatan" onchange="get_select(this,'id_kelurahan','http://sakatoplan.sumbarprov.go.id/signin/login/get_kelurahan/')" style="width:100%;">
                            <option value="">Pilih Kecamatan</option>  
                        </select> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>Kelurahan/Desa</strong> </label>
                        <select class="form-control select2" style="width:100%;" name="id_kelurahan" id="id_kelurahan">
                            <option value="">Pilih Kelurahan</option>  
                        </select> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>NIK Pimpinan Instansi/Badan/Lembaga/Partai Politik</strong> </label>
                        <input class="form-control" type="number" autocomplete="off" placeholder="NIK" name="nik" id="nik">
                        <label for=""><i style="color:red;"> NIK Ketua Lembaga/Organisasi</i></label>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>NPWP Instansi/Badan/Lembaga/Partai Politik</strong> </label>
                        <input class="form-control" type="number" placeholder="NPWP" name="npwp" id="npwp">
                    </div>
                    <label for=""><i style="color:red;padding:12px;">(* isi dengan angka tanpa titik dan strip), Jika tidak ada NPWP isi angka 0</i></label>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>No. Telp/WA Ketua</strong> </label>
                        <input class="form-control no_hp" autocomplete="off" placeholder="Nomor Telepon" type="number" name="phone" id="phone">
                    </div>
                   

                    <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>Alamat Email Instansi/Badan/Lembaga/Partai Politik</strong> </label>
                        <input class="form-control" autocomplete="off" placeholder="email@email.com" type="text" name="email" id="email">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputPassword4"><strong>Username **</strong> </label>
                        <input class="form-control" autocomplete="off" placeholder="Username" type="text" name="username" id="username">
                    </div>
                

                    <div class="input-group col-md-12" style="padding:12px;">
                        <label for="password" class="form-label" style="color:#333;font-weight: 700;"><b>Password</b></label>
                        <input type="password" autocomplete="off" class="form-control" placeholder="Password" required="" name="password" id="password" style="margin-bottom: 5px;">
                        <span class="input-group-btn">
                            <button onclick="btnShowPassword(event)" class="btn btn-primary" type="button"><i class="fa fa-eye"></i></button>
                        </span>
                    </div>

                    <div class="input-group col-md-12" style="padding:12px;">
                        <label for="password" class="form-label" style="color:#333;font-weight: 700;"><b>Ulangi Password</b></label>
                        <input type="password" autocomplete="off" class="form-control" placeholder="Ulangi Password" required="" name="repassword" id="repassword" style="margin-bottom:5px;">
                        <span class="input-group-btn">
                            <button onclick="btnShowRepassword(event)" class="btn btn-primary" type="button"><i class="fa fa-eye"></i></button>
                        </span>
                    </div>
                    <label for="" style="color:red;padding:12px;"><i>Sebelum klik tombol Simpan jangan lupa mengingat username dan password yang di daftarkan, terima kasih</i></label>                    

                    <div id="myprocess"></div>                
                  
                  <div class="modal-footer" style="text-align:right;">
                  <input type="button" value="Simpan Pendaftaran" class="btn btn-info" onclick="simpan()">
                  <!--<a class="btn btn-info" href = "#" onclick="add_penelitiannew()">Add</a>-->
                </div>
                               
                </div>
                

            </div>
          </div>
            </div>
          <!---------------------------------->



                    </div>
                    </div>
                </div>
                <!-- /.row -->
              
            </div>
            <!-- /.container-fluid -->
                    </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    
    <!-- <script> console.log("172.24.4.36") </script> -->
    <script src="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/jquery.min.js"></script>
    <script src="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/bootstrap.min.js"></script>
    <script src="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/particle/particles.js"></script>
    <script src="http://sakatoplan.sumbarprov.go.id/assets/new_sso/baru/login_files/particle/js/app.js"></script>


    <script type="text/javascript">

    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }




        $(document).ready(function() {
            $('.select2').select2();
        });

        function infoDataDukung()   
        {
            var pilihan = $('#unit_hibah').val();
            //alert(pilihan);

            if(pilihan != 10)	
            {
                $('#data_dukung1').show();	
                $('#data_dukung').hide();	
            }		  	
            else if (pilihan == 10)
            {
                $('#data_dukung').show();
                $('#data_dukung1').hide();
            }
                    
        

        }
	  

        $('#myModal').modal('show');

        function formRegister()
        {
            $('#modalForm').modal('show');
        }
         
        function get_select(el,dist,addr)
        {
            var _id = $(el).val(); 

            $.ajax({
                        url      : addr+_id,
                        type     : 'GET',
                        async    : true,
                        beforeSend: function() {
                            view_overlay_status(1);                               
                            $('#myloading').html('<div style = "text-align:center;padding:5px;"><img src="http://sakatoplan.sumbarprov.go.id/assets/img/loader.gif"/></div>');
                        },
                        success  : function(respons){ 
                            view_overlay_status(0); 

                        $("#"+dist).empty();                                                          
                        $("#"+dist).append(respons);
                        },
                        error: function(request, status, err) {
                            view_overlay_status(0);                       
                        },
            })
        }

        function view_overlay_status(active)
        {
            if(active == 1)
            {
                $("#myprocess").append('<div id ="myoverlay"><div id="myloading"></div></div>');
                    $("#myoverlay").css({
                                        'background-color': 'rgba(0, 0, 0, 0.1)',
                                        'width': '100%',
                                        'height': '100%',
                                        'position': 'fixed',
                                        'top': '0',
                                        'bottom': '0',
                                        'right': '0',
                                        'left': '0',
                                        'z-index': '1050'
                                        });
                    $("#myloading").css({
                                        'position': 'absolute',
                                        'top':'30%',
                                        'left':'50%',
                                        'border':'1px solid #dcdcdc',
                                        'background-color': '#dcdcdc'
                    });
            }
            else
            if(active == 0)
            {
                $("#myprocess").children("#myoverlay").remove();
            }
        } 

         function simpan()
        {
            $(".error").remove();
            var jenisprofil       = $("#jenisprofil").val();
            var nama_lembaga      = $("#nama_lembaga").val();
            var nama_lembagax     = $("#nama_lembagax").val();
            var alamat            = $("#alamat").val();
            var id_kabupaten      = $("#id_kabupaten").val();
            var id_kecamatan      = $("#id_kecamatan").val();
            var id_kelurahan      = $("#id_kelurahan").val();
            var nik               = $("#nik").val();
            var npwp              = $("#npwp").val();
            var phone             = $("#phone").val();
            var email             = $("#email").val();
            var username          = $("#username").val();
            var password          = $("#password").val();
            var repassword        = $("#repassword").val();
            var id_instansi       = $("#id_instansi").val();
            var unit_hibah        = $("#unit_hibah").val();  
            var ketua             = $("#ketua").val();

         
           
            if(password == repassword)
            {
                    var data = new FormData();
                    data.append('save','save');
                    //data.append('jenisprofil',jenisprofil);
                    data.append('nama_lembaga',nama_lembaga);
                    data.append('nama_lembagax',nama_lembagax);
                    data.append('alamat',alamat);
                    data.append('id_kabupaten',id_kabupaten);
                    data.append('id_kecamatan',id_kecamatan);
                    data.append('id_kelurahan',id_kelurahan);
                    data.append('nik',nik);
                    data.append('npwp',npwp);
                    data.append('phone',phone);
                    data.append('username',username);
                    data.append('password',password);
                    data.append('repassword',repassword);
                    data.append('id_instansi',id_instansi);
                    data.append('email',email);
                    data.append('unit_hibah',unit_hibah);
                    data.append('ketua',ketua);

                    $.ajax({
                                    url: "http://sakatoplan.sumbarprov.go.id/signin/login/post",
                                    data: data,
                                    processData: false,
                                    contentType: false,
                                    type     : 'POST',
                                    beforeSend: function() {
                                        view_overlay_status(1);                               
                                        $('#myloading').html('<div style = "text-align:center;"><img src="http://sakatoplan.sumbarprov.go.id/assets/img/ajax-loader.gif"/></div>');
                                        },
                                    success: function(respons){  
                                        view_overlay_status(0); 
                                        var obj = JSON.parse(respons); 
                                        
                                        if(obj.ret == "success")
                                            {   
                                                alert('SELAMAT akun anda sudah aktif, silahkan masukkan username dan password yang sudah dibuat pada form login untuk mengusulkan hibah');
                                                ret = true;     
                                                myid_user = obj.id_user;
                                                $("#id_user").val(myid_user);
                                                swal("Report", obj.message, "success");                     
                                                //-----------------------   
                                                //load_penelitian(url); 
                                                
                                                location.reload();
                
                                            } 
                                            else
                                            if(obj.ret == "invalid")
                                            { 
                                                if(obj.code == "validation")
                                                { 
                                                    sweetAlert("Ada Kesalahan...", "Cek Semua Kolom isian yang masih kosong atau username sudah ada", "error");
                                                }
                                                else
                                                {
                                                    sweetAlert("Oops...", obj.message, "error");
                                                }                 
                                            }
                                    },
                                    error: function(request, status, err) {
                                            view_overlay_status(0);
                                            sweetAlert("Oops...", "Ada sesuatu yang salah!", "error");
                            
                                        },
                            }) 
            }
            else 
            {
                view_overlay_status(0);
                alert('Password tidak sama ketikkan Password dan Ulangi Password dengan kombinasi karakter yang sama');
              
            }
           
           
        }

        function btnShowPass(e) {
            const _this = $('#passX');
            const type = _this.attr('type');

            if (type == 'password') {
                _this.attr('type', 'text');
                _this.parent().find('i').attr('class', 'fa fa-eye-slash')
            } else {
                _this.attr('type', 'password');
                _this.parent().find('i').attr('class', 'fa fa-eye')
            }
        }

        function btnShowPassword(e) {
            const _this = $('#password');
            const type = _this.attr('type');

            if (type == 'password') {
                _this.attr('type', 'text');
                _this.parent().find('i').attr('class', 'fa fa-eye-slash')
            } else {
                _this.attr('type', 'password');
                _this.parent().find('i').attr('class', 'fa fa-eye')
            }
        }

        function btnShowRepassword(e) {
            const _this = $('#repassword');
            const type = _this.attr('type');

            if (type == 'password') {
                _this.attr('type', 'text');
                _this.parent().find('i').attr('class', 'fa fa-eye-slash')
            } else {
                _this.attr('type', 'password');
                _this.parent().find('i').attr('class', 'fa fa-eye')
            }
        }
         
         
    //    $("#loginform").submit(function(event) {
    //                 //event.preventDefault();
    //                 // ndak perlu di lower apa adanya saja
    //                 $("#user").val( $.md5($.md5($("#userX").val().trim())) ); 
    //                 //$("#user").val( $.md5($.md5($("#userX").val().trim().toLowerCase())) ); //escape case sesitive username
    //                 $("#pass").val( $.md5($.md5($("#passX").val())) );
    //             });

        $(document).ready(function(){
          // cek CAPSLOCK
          $('div.capslock_on').hide();
          document.addEventListener( 'keydown', function( event ) {
            var caps = event.getModifierState && event.getModifierState( 'CapsLock' );
            // console.log( caps ); // true when you press the keyboard CapsLock key
            if (caps) {
              $('div.capslock_on').show();
            } else {
              $('div.capslock_on').hide();
            }
          });
        });

    </script>
<div class="jqvmap-label" style="display: none;"></div>



</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>