@extends('layouts.app')

@section('title', 'BAPPEDA')

@section('nav')
   @include('layouts.nav')
@endsection
    
@section('breadcrumb')
<ol class="breadcrumb pull-right">
   <li><a href="http://sakatoplan.sumbarprov.go.id/bappeda/">Dashboard</a></li>
   <li><a href="{{ route('show.bukutamu') }}">Buku Tamu</a></li>
   <li class="active">Update</li>
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
            <h4 class="panel-title">Edit Buku Tamu</h4>
         </div>
         <div class="panel-body panel-form"> 
            <form class="form-horizontal form-bordered" method="POST" action="{{ url('/bukutamu/master/'.$data->kode_tamu) }}">
               @csrf
               <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="kode_tamu">#ID</label>
                  <div class="col-md-6 col-sm-6">
                      <input class="form-control" type="text" value="{{ $data->kode_tamu }}" readonly>
                  </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="nama_tamu">Nama Tamu</label>
                  <div class="col-md-6 col-sm-6">
                      <input class="form-control" type="text" value="{{ $data->nama_tamu }}" readonly>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="tanggal">Tanggal</label>
                  <div class="col-md-6 col-sm-6">
                      <input class="form-control" type="text" value="<?php echo date('d-m-Y', strtotime($data->tanggal_masuk)); ?>" readonly>
                  </div>
              </div>
              <div class="form-group">
               <label class="control-label col-md-4 col-sm-4" for="nip">Yang Ditemui</label>
               <div class="col-md-6 col-sm-6">
                   <input class="form-control" type="text" value="{{ $data->pegawai_ditemui }}" readonly>
               </div>
              </div>
              <div class="form-group">
               <label class="control-label col-md-4 col-sm-4" for="yang_menerima">Yang Menerima</label>
               <div class="col-md-6 col-sm-6">
                  <select class="multiple-select2 form-control" name="yang_menerima[]" id="yang_menerima" multiple data-size="5">
                     @foreach($pegawai as $p)
                        @if(empty($data->pegawai_menerima))
                           <option value="{{ $p['NIP'] }}" @if (old('yang_menerima') == $p['NIP']) {{ 'selected' }} @endif>{{ $p['NAMA_PEGAWAI'] }}</option>    
                        @else
                           @foreach($data->pegawai_menerima as $x)
                              @if($x == $p['NIP'])
                                 <option value="{{ $x }}" selected>{{ $p['NAMA_PEGAWAI'] }}</option>    
                              @else
                                 <option value="{{ $p['NIP'] }}">{{ $p['NAMA_PEGAWAI'] }}</option>    
                              @endif
                           @endforeach   
                        @endif
                     @endforeach 
                  </select>
                  @error('yang_menerima')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
              </div>
              <div class="form-group">
               <label class="control-label col-md-4 col-sm-4" for="nip">Urusan</label>
               <div class="col-md-6 col-sm-6">
                   <textarea class="form-control" type="text" readonly>{{ $data->urusan }}</textarea>
               </div>
              </div>
              <div class="form-group">
               <label class="control-label col-md-4 col-sm-4"></label>
               <div class="col-md-6 col-sm-6">
                  <button type="submit" class="btn btn-success" name="update" value="update" id="update"><i class="fa fa-save"></i> Ubah</button>
                  <button type="reset" class="btn btn-warning"><i class="fa fa-recycle"></i> Reset</button>
                  <a href="{{ route('show.bukutamu') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
               </div>
              </div>
            </form>
         </div>
      </div>
   </div>
   </div>
</div>
@endsection

@section('js')
<script>
   $(".multiple-select2").select2({ placeholder: "  Pilih Pegawai Yang Menerima" });
 </script>
@endsection