@extends('layouts.app')

@section('title', 'BAPPEDA')

@section('nav')
   @include('layouts.nav')
@endsection

@section('breadcrumb')
   <ol class="breadcrumb pull-right">
      <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/">Dashboard</a></li>
      <li><a href="{{ route('show.janjitamu') }}">Janji Tamu</a></li>
      <li class="active">Detail Janji Tamu</li>
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
            <div class="panel-body panel-form"> 
               <div class="form-horizontal form-bordered">
                  <div class="form-group">
                     <div class="col-md-4 text-right"><strong>#ID</strong></div>
                     <div class="col-md-8">
                        {{ $data->id }}
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-4 text-right"><strong>Nama Tamu</strong></div>
                     <div class="col-md-8">
                        {{ $data->nama_tamu }}
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-4 text-right"><strong>Instansi Asal</strong></div>
                     <div class="col-md-8">
                        {{ $data->instansi }}
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-4 text-right"><strong>Tanggal Janji</strong></div>
                     <div class="col-md-8">
                        <?php echo date('d-m-Y', strtotime($data->tanggal_janji)); ?>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-4 text-right"><strong>Waktu Janji</strong></div>
                     <div class="col-md-8">
                        {{ $data->jam_janji }} WIB
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-4 text-right"><strong>Telepon</strong></div>
                     <div class="col-md-8">
                        {{ $data->telpon }}
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-4 text-right"><strong>Yang Ditemui</strong></div>
                     <div class="col-md-8">
                        {{ $data->pegawai_ditemui }}
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-4 text-right"><strong>Urusan</strong></div>
                     <div class="col-md-8">
                        {{ $data->urusan }}
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-4 text-right"><strong>Status Janji</strong></div>
                     <div class="col-md-8">
                        @if ($data->status_janji == 0)
                            <div class="badge badge-warning text-wrap">Menunggu Konfirmasi</div>
                        @elseif($data->status_janji == 1)
                           <div class="badge badge-success text-wrap">Disetujui</div>
                        @elseif($data->status_janji == 2)
                           <div class="badge badge-danger text-wrap">Ditolak</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4"></label>
                     <div class="col-md-8 col-sm-8">
                        <a href="{{ route('show.janjitamu') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                     </div>
                    </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   </div>
@endsection