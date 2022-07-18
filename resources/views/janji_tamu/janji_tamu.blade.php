@extends('layouts.app')

@section('title', 'BAPPEDA')

@section('nav')
   @include('layouts.nav')
@endsection
    
@section('breadcrumb')
<ol class="breadcrumb pull-right">
   <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/">Dashboard</a></li>
   <li class="active">Janji Tamu</li>
</ol>
@endsection

@section('panel')
   <div class="row">
      {{-- begin col-12 --}}
      <div class="col-md-12 ui-sortable">
         {{-- begin panel --}}
         <div class="panel panel-inverse">
            <div class="panel-heading" style="background-image: linear-gradient(to right, rgb(245,156,26) 50%, rgb(195,8,1));">
               <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
               </div>
               <h4 class="panel-title">Janji Tamu</h4>
            </div>
            {{-- Panel Body --}}
            <div class="panel-body"> 
               <ul class="nav nav-tabs nav-justified" id="daftarJanjiTamu" role="tablist" style="background-color: rgb(245,156,26, 0.5); margin-bottom:20px">
                  <li class="nav-item active" role="presentation">
                    <a class="nav-link active" id="menunggu-tab" data-toggle="tab" href="#menunggu" role="tab" aria-controls="menunggu" aria-selected="true"><i class="fa fa-exclamation-triangle me-5px" style="color: orange"></i><span class="d-none d-md-inline"> Menunggu Konfirmasi</span></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="disetujui-tab" data-toggle="tab" href="#disetujui" role="tab" aria-controls="disetujui" aria-selected="false"><i class="fa fa-check-square-o me-5px" style="color: green"></i><span class="d-none d-md-inline"> Disetujui</span></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ditolak-tab" data-toggle="tab" href="#ditolak" role="tab" aria-controls="ditolak" aria-selected="false"><i class="fa fa-times-circle me-5px" style="color: red"></i><span class="d-none d-md-inline"> Ditolak</span></a>
                  </li>
               </ul>

               <div class="tab-content panel p-3 rounded-0 rounded-bottom mb-2" id="tab-content">
                  {{-- Menunggu --}}
                  <div id="menunggu" class="tab-pane fade in active">
                     <section class="menunggu-tab table-responsive">
                        <table id="listJanjiTamuMenunggu" class="listJanjiTamu display table table-bordered table-striped" style="width:100%">
                           <thead>
                               <tr>
                                   <th>No.</th>
                                   <th>Nama</th>
                                   <th>Tanggal Janji</th>
                                   <th>Yang Ditemui</th>
                                   <th>Urusan</th>
                                   <th>Konfirmasi</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                           <tbody>
                              @foreach ($data_menunggu as $data)
                              <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $data->nama_tamu }}</td>
                                 <td><?php echo date('d-m-Y', strtotime($data->tanggal_janji)); ?></td>
                                 <td>{{ $data->pegawai_ditemui }}</td>
                                 <td>{{ $data->urusan }}</td>
                                 <td width="100px">
                                    <a type="button" class="btn btn-xs btn-success konfirmasi" data-id="{{ $data->kode_tamu }}" data-nilai="setujui"><i class="fa fa-check"></i></a>
                                    <a type="button" class="btn btn-xs btn-danger konfirmasi" data-id="{{ $data->kode_tamu }}" data-nilai="tolak"><i class="fa fa-close"></i></a>
                                 </td>
                                 <td>
                                    <a type="button" class="btn btn-xs m-r-5 btn-primary" href="{{ url('/bukutamu/janji/'.$data->kode_tamu) }}"><i class="fa fa-eye"></i></a>
                                 </td>
                              </tr>    
                              @endforeach
                           </tbody>
                         </table>
                     </section>
                  </div>

                  {{-- Disetujui --}}
                  <div id="disetujui" class="tab-pane fade">
                     <section class="disetujui-tab table-responsive">
                        <table id="listJanjiTamuDisetujui" class="listJanjiTamu display table table-striped table-bordered">
                           <thead>
                               <tr>
                                   <th>No.</th>
                                   <th>Nama</th>
                                   <th>Tanggal Janji</th>
                                   <th>Yang Ditemui</th>
                                   <th>Urusan</th>
                                   <th>Konfirmasi</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                           <tbody>
                              @foreach ($data_setuju as $data)
                              <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $data->nama_tamu }}</td>
                                 <td><?php echo date('d-m-Y', strtotime($data->tanggal_janji)); ?></td>
                                 <td>{{ $data->pegawai_ditemui }}</td>
                                 <td>{{ $data->urusan }}</td>
                                 <td>
                                 <?php 
                                    $telpon = substr_replace($data->telpon,'62',0,1);
                                    $end = urlencode("\n");
                                    $text = "Kepada%20Yth.%20".$data->nama_tamu.",".$end."".$end."Janji%20tamu%20BAPPEDA%20SUMBAR%20yang%20telah%20Anda%20buat,%20dengan%20detail%20sebagai%20berikut:".$end."%20%20Tanggal%20janji:%20".date('d-m-Y', strtotime($data->tanggal_janji))."".$end."%20%20Waktu%20janji:%20".$data->jam_janji."%20WIB".$end."%20%20Pegawai%20yang%20ditemui:%20".$data->pegawai_ditemui."".$end."%20%20Urusan:%20".$data->urusan."".$end."%20*Telah*%20*disetujui*".$end."".$end."Silahkan%20datang%20sesuai%20waktu%20janji%20yang%20telah%20disepakati".$end."Terima Kasih.";
                                 ?>
                                    <a type="button" class="btn btn-xs m-r-5 btn-success" href="{{ url('https://wa.me/'.$telpon.'?text='.$text)}}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                 </td>
                                 <td>
                                    <a type="button" class="btn btn-xs m-r-5 btn-primary" href="{{ url('/bukutamu/janji/'.$data->kode_tamu) }}"><i class="fa fa-eye"></i></a>
                                 </td>
                              </tr>    
                              @endforeach
                           </tbody>
                         </table>
                     </section>
                  </div>

                  {{-- Ditolak --}}
                  <div id="ditolak" class="tab-pane fade">
                     <section class="ditolak-tab table-responsive">
                        <table id="listJanjiTamuDitolak" class="listJanjiTamu display table table-striped table-bordered">
                           <thead>
                               <tr>
                                   <th>No.</th>
                                   <th>Nama</th>
                                   <th>Tanggal Janji</th>
                                   <th>Yang Ditemui</th>
                                   <th>Urusan</th>
                                   <th width="20px">Konfirmasi</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                           <tbody>
                              @foreach ($data_tolak as $data)
                              <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $data->nama_tamu }}</td>
                                 <td><?php echo date('d-m-Y', strtotime($data->tanggal_janji)); ?></td>
                                 <td>{{ $data->pegawai_ditemui }}</td>
                                 <td>{{ $data->urusan }}</td>
                                 <td>
                                 <?php 
                                    $telpon = substr_replace($data->telpon,'62',0,1);
                                    $end = urlencode("\n");
                                    $text = "Kepada%20Yth.%20".$data->nama_tamu.",".$end."".$end."Janji%20tamu%20BAPPEDA%20SUMBAR%20yang%20telah%20Anda%20buat,%20dengan%20detail%20sebagai%20berikut:".$end."%20%20Tanggal%20janji:%20".date('d-m-Y', strtotime($data->tanggal_janji))."".$end."%20%20Waktu%20janji:%20".$data->jam_janji."%20WIB".$end."%20%20Pegawai%20yang%20ditemui:%20".$data->pegawai_ditemui."".$end."%20%20Urusan:%20".$data->urusan."".$end."%20*Mohon%20maaf,%20telah%20ditolak%20karena%20terdapat%20agenda%20lain*".$end."".$end."Terima Kasih.";
                                 ?>
                                    <a type="button" class="btn btn-xs m-r-5 btn-success" href="{{ url('https://wa.me/'.$telpon.'?text='.$text)}}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                 </td>
                                 <td>
                                    <a type="button" class="btn btn-xs m-r-5 btn-primary" href="{{ url('/bukutamu/janji/'.$data->kode_tamu) }}"><i class="fa fa-eye"></i></a>
                                 </td>
                              </tr>    
                              @endforeach
                           </tbody>
                         </table>
                     </section>
                   </div>

                  </div>
            </div>
         {{-- end panel --}}
         </div>
      </div>
   </div>
@endsection

@section('js')
<script type="text/javascript">
   $(document).ready(function(){
      $(".nav-tabs a").click(function(){
         $(this).tab('show');
      });

      $('.listJanjiTamu').DataTable({
         pageLength: 10,
         lengthMenu: [10, 25, 50, "All"],
         bAutoWidth: false,
         columnDefs: [
            { "width": "5%", "targets": 0 },
            { "width": "15%", "targets": 1 },
            { "width": "15%", "targets": 2 },
            { "width": "25%", "targets": 3 },
            { "width": "25%", "targets": 4 },
            { "width": "10%", "targets": 5 },
            { "width": "5%", "targets": 6 }
         ]
      });

      $('.konfirmasi').click(function(){
         var data_id = $(this).attr('data-id');
         var data_nilai = $(this).attr('data-nilai');
         
         Swal.fire({
            title: 'Yakin?',
            text: "Anda akan "+data_nilai+" janji tamu berikut",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, konfirmasi!',
            cancelButtonText: 'Batal'
            }).then((result) => {
               if (result.isConfirmed) {
                  window.location = "/bukutamu/janji/"+data_id+"/"+data_nilai+""
                  Swal.fire(
                     'Konfirmasi',
                     'Janji tamu berhasil di'+data_nilai+"",
                     'success'
                     )
                  }
            })
         });      
   });
</script>
@endsection