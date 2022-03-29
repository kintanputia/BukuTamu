<!-- begin #header -->
<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
   <!-- begin container-fluid -->
   <div class="container-fluid header-color">
      <!-- begin mobile sidebar expand / collapse button -->
      <div class="navbar-header navbar-header-without-bg">
         <a href="index.html" class="navbar-brand"><img src="http://sakatoplan.sumbarprov.go.id/bappeda/logobaru.png"></span></a>
         <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
      </div>
      <!-- end mobile sidebar expand / collapse button -->
      
      <!-- begin header navigation right -->
      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown navbar-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
               <img src="assets/img/user-13.jpg" alt="" /> 
               <span class="hidden-xs">{{Session::get('user')}}</span> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInLeft">
               <li class="arrow"></li>
               <li><a href="javascript:;">Edit Profile</a></li>
               <li class="divider"></li>
               <li>
                  <a class="dropdown-item" href="{{ route('logout') }}">
                     {{ __('Logout') }}
                  </a>
               </li>
            </ul>
         </li>
      </ul>
      <!-- end header navigation right -->
   </div>
   <!-- end container-fluid -->
</div>
<!-- end #header -->

<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
   <!-- begin sidebar scrollbar -->
   <div data-scrollbar="true" data-height="100%">
      <!-- begin sidebar user -->
      <ul class="nav">
         <li class="nav-profile">
             <div align="center">
                 <a href="javascript:;"><img src="http://sakatoplan.sumbarprov.go.id/bappeda/assets/new_sso/baru/login_files/logo_sakatoplan.png" alt="" style="width:140px;"></a>
             </div>
         </li>
     </ul>
      <!-- end sidebar user -->
      <!-- begin sidebar nav -->
      <ul class="nav">
         <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/dashboard"><i class="fa fa-bars"></i> <span>Administrator</span></a></li>
            <li class="has-sub">
               <a href="javascript:;">
                  <b class="caret pull-right"></b>
                  <i class="fa fa-cogs"></i>
                  <span>Konfigurasi</span> 
               </a>
            <ul class="sub-menu">
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/konfigurasi/aplikasi">Aplikasi</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/konfigurasi/group">Group</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/konfigurasi/folder-modules">Folder modules</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/ruangan/master_data/list_bidang">Struktural</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/konfigurasi/module">Modul Admin</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/konfigurasi/privilege">Modul Publik</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/konfigurasi/session-site">CI Sessions</a></li>
            </ul>
         </li>
         <li class="has-sub">
            <a href="javascript:;">
               <b class="caret pull-right"></b>
               <i class="fa fa-th-large"></i>
               <span>Menu Admin</span> 
            </a>
            <ul class="sub-menu">
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/navigasi/main-menu-admin">Main Menu</a></li>
            </ul>
         </li>
         <li class="has-sub">
            <a href="javascript:;">
               <b class="caret pull-right"></b>
               <i class="fa fa-user"></i>
               <span>Management User</span> 
            </a>
            <ul class="sub-menu">
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/pengguna/instansi">Instansi</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/pengguna/user">User Admin PD</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/pengguna/user/kabkota">User Admin Kabkota</a></li>
            </ul>
         </li>
         <li class="has-sub">
            <a href="javascript:;">
               <b class="caret pull-right"></b>
               <i class="fa fa-university"></i>
               <span>E-Ruangan</span> 
            </a>
            <ul class="sub-menu">
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/ruangan/master_data">Master</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/ruangan/ruangan">List Peminjaman</a></li>
            </ul>
         </li>
         <li class="has-sub">
            <a href="javascript:;">
               <b class="caret pull-right"></b>
               <i class="fa fa-car"></i>
               <span>E-Kendaraan</span> 
            </a>
            <ul class="sub-menu">
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/kendaraan/master_data">Master Data</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/kendaraan/kendaraan">List Peminjaman</a></li>
            </ul>
         </li>
         <li class="has-sub">
            <a href="javascript:;">
               <b class="caret pull-right"></b>
               <i class="fa fa-list"></i>
               <span>UMKM</span> 
            </a>
            <ul class="sub-menu">
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/umkm/jenis">List UMKM</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/umkm/menu">Daftar Menu</a></li>
               <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/umkm/pemesanan">Pemesanan</a></li>
            </ul>
         </li>
         <li class="has-sub">
            <a href="javascript:;">
               <b class="caret pull-right"></b>
               <i class="fa fa-book"></i>
               <span>E-Buku Tamu</span> 
            </a>
            <ul class="sub-menu">
               <li><a href="{{ route('show.bukutamu') }}">Buku Tamu</a></li>
               <li><a href="{{ route('show.janjitamu') }}">Janji Tamu</a></li>
            </ul>
         </li>
         <li class="has-sub">
            <a href="#"><i class="fa fa-calendar"></i><span>E-Agenda</span></a>
         </li>
         <li>
            <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-lock"></i>
               {{ __('Logout') }}
            </a>

            <!-- <a id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"></a> -->
         </li>
         

   <!-- begin sidebar minify button -->
   <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
   <!-- end sidebar minify button -->
   </ul>
      <!-- end sidebar nav -->
   </div>
   <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->