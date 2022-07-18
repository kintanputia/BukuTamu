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
                     <label class="control-label col-md-4 col-sm-4" for="kode_tamu">#ID</label>
                     <div class="col-md-6 col-sm-6">
                        <p style="line-height:30px">{{$data->kode_tamu}}</p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4" for="nama_tamu">Nama Tamu</label>
                     <div class="col-md-6 col-sm-6">
                        <p style="line-height:30px">{{$data->nama_tamu}}</p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4" for="instansi">Instansi Asal</label>
                     <div class="col-md-6 col-sm-6">
                        <p style="line-height:30px">{{$data->instansi}}</p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4" for="tanggal_janji">Tanggal Janji</label>
                     <div class="col-md-6 col-sm-6">
                        <p style="line-height:30px"><?php echo date('d-m-Y', strtotime($data->tanggal_janji)); ?></p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4" for="jam_janji">Waktu Janji</label>
                     <div class="col-md-6 col-sm-6">
                        <p style="line-height:30px">{{ $data->jam_janji }} WIB</p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4" for="telepon">Telepon</label>
                     <div class="col-md-6 col-sm-6">
                        <p style="line-height:30px">{{ $data->telpon }} WIB</p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4" for="yang_ditemui">Yang Ditemui</label>
                     <div class="col-md-6 col-sm-6">
                        <p style="line-height:30px">{{ $data->pegawai_ditemui }}</p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4" for="urusan">Urusan</label>
                     <div class="col-md-6 col-sm-6">
                        <p style="line-height:30px">{{ $data->urusan }}</p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4" for="urusan">Status Janji</label>
                     <div class="col-md-6 col-sm-6">
                        @if ($data->status_janji == 0)
                            <div style="line-height:30px">
                              <div class="badge badge-warning text-wrap">
                                 Menunggu Konfirmasi
                              </div>
                           </div>
                        @elseif($data->status_janji == 1)
                           <div style="line-height:30px">
                                 <div class="badge badge-success text-wrap">
                                    Disetujui
                                 </div>
                           </div>
                        @elseif($data->status_janji == 2)
                           <div style="line-height:30px">
                              <div class="badge badge-danger text-wrap">
                                 Ditolak
                              </div>
                           </div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-4 col-sm-4"></label>
                     <div class="col-md-6 col-sm-6">
                        <a href="{{ route('show.janjitamu') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                     </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   </div>
@endsection