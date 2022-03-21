@extends('layouts.app')

@section('title', "BAPPEDA")

@section('nav')
   @include('layouts.nav')
@endsection

@section('breadcrumb')
<ol class="breadcrumb pull-right">
   <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/">Dashboard</a></li>
   <li class="active">Buku Tamu</li>
</ol>
@endsection

@section('page-header')
<div class="row">
    <div class="col-xl-3 col-md-3">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>JUMLAH TAMU HARI INI</h4>
                    <p>{{ $data_stats['total_pengunjung'] }}</p>
                </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-3">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-smile-o"></i></div>
                <div class="stats-info">
                    <h4>PENILAIAN SANGAT PUAS</h4>
                    <p>{{ $data_stats['total_sangatpuas'] }}</p>
                </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-3">
        <div class="widget widget-stats bg-orange">
            <div class="stats-icon"><i class="fa fa-meh-o"></i></div>
                <div class="stats-info">
                    <h4>PENILAIAN CUKUP PUAS</h4>
                    <p>{{ $data_stats['total_puas'] }}</p>
                </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-3">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-frown-o"></i></div>
                <div class="stats-info">
                    <h4>PENILAIAN KURANG PUAS</h4>
                    <p>{{ $data_stats['total_kurangpuas'] }}</p>
                </div>
        </div>
    </div>
</div>
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
                <h4 class="panel-title">Buku Tamu</h4>
            </div>
            <div class="panel-body"> 
               <table class="table table-borderless">
                  <tbody>
                    <tr>
                      Filter Data Tamu
                      <td>
                          <label>Tanggal Awal </label><input type="text" class="form-control form-control-sm" id="min" name="min" placeholder="Masukkan Tanggal Awal">
                      </td>
                      <td>
                          <label>Tanggal Akhir</label><input type="text" class="form-control form-control-sm" id="max" name="max" placeholder="Masukkan Tanggal Akhir">
                      </td>
                      <td>
                      <label class=""></label>
                      <div style="margin-top:5px"><button type="button" class="btn btn-sm btn-warning" onclick="location.reload();"><i class="fa fa-recycle"></i></button></div>
                     </td>
                    </tr>
                  </tbody>
                </table>

                <div class="table-responsive">
                <table id="listBukuTamu" class="mt-2 display table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th>No.</th>
                          <th>Nama</th>
                          <th>Instansi</th>
                          <th>Jumlah Tamu</th>
                          <th>Tanggal</th>
                          <th>Waktu Masuk</th>
                          <th>Waktu Keluar</th>
                          <th>Yang Ditemui</th>
                          <th>Yang Menerima</th>
                          <th>Urusan</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $data)
                    <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $data->nama_tamu }}</td>
                       <td>{{ $data->instansi }}</td>
                       <td>{{ $data->jumlah_tamu }}</td>
                       <td>{{ $data->tanggal_masuk }}</td>
                       <td>{{ $data->waktu_masuk }} WIB</td>
                       <td>
                        @if(!empty($data->waktu_keluar))
                        {{ $data->waktu_keluar }} WIB
                        @else
                        <div class="badge badge-success text-wrap">On Progress</div>
                        @endif
                        </td>
                        <td>{{ $data->pegawai_ditemui }}</td>
                        <td>
                           @if(!empty($data->yang_menerima))
                           {{ $data->pegawai_menerima }}    
                           @else
                           <div class="badge badge-danger text-wrap">Data Missing</div>
                           @endif
                           </td>
                        <td>{{ $data->urusan }}</td>
                        <td>
                           <a class="btn btn-warning btn-xs" href="{{ url('/bukutamu/master/'.$data->id) }}"><i class="fa fa-edit"></i></a>
                        </td>
                     </tr>                                                      
                    @endforeach
                 </tbody>
                </table>
                </div>
            </div>
        </div>
      </div>
   </div>
@endsection

@section('js')
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
   var minDate, maxDate;
   // Custom filtering function which will search data in column four between two values
   $.fn.dataTable.ext.search.push(
       function( settings, data, dataIndex ) {
           var min = minDate.val();
           var max = maxDate.val();
           var date = new Date( data[4] );
     
           if (
               ( min === null && max === null ) ||
               ( min === null && date <= max ) ||
               ( min <= date   && max === null ) ||
               ( min <= date   && date <= max )
           ) {
               return true;
           }
           return false;
       }
   );
     
   $(document).ready(function() {
       // Create date inputs
       minDate = new DateTime($('#min'), {
           format: 'DD-MM-YYYY'
       });
       maxDate = new DateTime($('#max'), {
           format: 'DD-MM-YYYY'
       });
     
       // DataTables initialisation
       var table = $('#listBukuTamu').DataTable({
        dom: 'Blfrtip',
        pageLength: 10,
        lengthMenu: [10, 25, 50, "All"],
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Buku Tamu',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                }
            },
        ]
       });
     
       // Refilter the table
       $('#min, #max').on('change', function () {
           table.draw();
       });
   });
 </script>
@endsection