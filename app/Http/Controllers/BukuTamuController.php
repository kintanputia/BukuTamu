<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use Illuminate\Support\Facades\DB;

class BukuTamuController extends Controller
{
    protected function absen($nip){
        $data_masuk_keluar = array();

        $ctx = stream_context_create(array('http'=>
            array(
                'timeout' => 1200,  //1200 Seconds is 20 Minutes
            )
        ));

        $thn_bulan = date('Y-m');
        $json = file_get_contents('https://abon.sumbarprov.go.id/penilaian/presensi/'.$nip.'/'.$thn_bulan, false, $ctx);
        $absen = json_decode($json, true);

        $tgl_skrg = date('Y-m-d')." 07:30:00";
        foreach($absen['result']['rincian'] as $i){
            if($i['jadwal_masuk'] == $tgl_skrg){
                array_push($data_masuk_keluar, array(
                    "masuk"=>$i['masuk'], 
                    "keluar"=>$i['keluar'])
                );
            }
        }
        return $data_masuk_keluar[0];
    }


    // mengambil data dari URI
    protected function URI(){
        //read data
        $url = file_get_contents('http://sakatoplan.sumbarprov.go.id/sin/sso/generate_token/sso/ssokoneksi');
        $json = file_get_contents('http://sakatoplan.sumbarprov.go.id/sin/sso/PekaPegawai/'.$url);
        $pegawai = json_decode($json, true);
    
        return $pegawai;
    }

    // menampilkan form halaman buku tamu
    public function indexBukuTamu(){
        $data_nama = array();
        $data = array();

        $pegawai = $this->URI();
        $data_pegawai = array();
        // $this->absen(198201212000121001);
        // foreach($pegawai as $p){
        //     $data_pegawai[] = array();
        //     $absen = $this->absen($p['NIP']);
        //     if($absen){
        //         $data_pegawai = array(
        //             'nip'   => $p['NIP'],
        //             'nama'  => $p['NAMA_PEGAWAI'],
        //             'absen' => $absen
        //         );
        //     }
        // }

        $tamu = BukuTamu::where('tanggal_masuk', date('Y-m-d'))->where('nilai_pelayanan', null)->get();
        foreach($tamu as $row){
            $data_nip = explode(',', trim($row->nip));
            foreach($data_nip as $nip){
                foreach($pegawai as $p){
                    if($nip == $p['NIP']){
                        array_push($data_nama, $p['NAMA_PEGAWAI']);
                    }
                }
            }
            $row->nama_pegawai = implode(', ', $data_nama);
            array_push($data, $row);
            array_splice($data_nama, 0, count($data_nama));
        }

        return view('index', ['pegawai'=>$pegawai, 'data'=>$data]);
    }

    // menyimpan data buku tamu
    public function storeBukuTamu(Request $request){

        // loop data pegawai yang ditemui
        $pegawai = $request['pegawai'];
        $pegawai_ditemui = array();
        for($x = 0; $x < count($pegawai); $x++){
            array_push($pegawai_ditemui, $pegawai[$x]);
        }

        //convert array to string
        $data_pegawai_ditemui = implode(",", $pegawai_ditemui);

        //simpan
        BukuTamu::create([
            'nama_tamu' => ucwords(strtolower($request['nama_tamu'])),
            'instansi' => $request['instansi'],
            'nip' => $data_pegawai_ditemui,
            'urusan' => $request['urusan'],
            'jumlah_tamu' => $request['jumlah_tamu'],
            'tanggal_masuk' => date('Y-m-d'),
            'waktu_masuk' => date('H:i:s')
        ]);

        return redirect()->back()->with('success', 'Selamat Datang di BAPPEDA, Silahkan Masuk!');
    }

    // menyimpan data penilaian tamu
    public function storePenilaianTamu($id, $nilai){
        BukuTamu::where('id', $id)->update(['nilai_pelayanan' => $nilai, 'waktu_keluar' => date('H:i:s')]);
        return redirect()->back()->with('success', 'Terimakasih telah memberikan penilaian');
    }

    // menampilkan data buku tamu
    public function showBukuTamu(){
        $pegawai = $this->URI();

        $data_ditemui = array();
        $data_menerima = array();
        $data = array();

        $tamu = BukuTamu::whereNotNull('jumlah_tamu')->orderBy('tanggal_masuk', 'desc')->orderBy('waktu_masuk', 'desc')->get();
        foreach($tamu as $row){
            $data_nip = explode(',', trim($row->nip));
            foreach($data_nip as $nip){
                foreach($pegawai as $p){
                    if($nip == $p['NIP']){
                        array_push($data_ditemui, $p['NAMA_PEGAWAI']);
                    }
                }
            }

            $data_nip2 = explode(',', trim($row->yang_menerima));
            foreach($data_nip2 as $nip){
                 foreach($pegawai as $p){
                     if($nip == $p['NIP']){
                        array_push($data_menerima, $p['NAMA_PEGAWAI']);
                    }
                 }
            }

            $row->pegawai_ditemui = implode(', ', $data_ditemui);
            $row->pegawai_menerima = implode(', ', $data_menerima);
            array_push($data, $row);
            array_splice($data_ditemui, 0, count($data_ditemui));
            array_splice($data_menerima, 0, count($data_menerima));
        }


        $stats_tamu = BukuTamu::where('tanggal_masuk', date('Y-m-d'))->sum('jumlah_tamu');
        $stats_sp =  BukuTamu::where('nilai_pelayanan', 0)->where('tanggal_masuk', date('Y-m-d'))->count();
        $stats_p =  BukuTamu::where('nilai_pelayanan', 1)->where('tanggal_masuk', date('Y-m-d'))->count();         
        $stats_kp =  BukuTamu::where('nilai_pelayanan', 2)->where('tanggal_masuk', date('Y-m-d'))->count(); 
        
        $data_stats = array(
            "total_pengunjung" => $stats_tamu,
            "total_sangatpuas" => $stats_sp,
            "total_puas" => $stats_p,
            "total_kurangpuas" => $stats_kp,
        );
        return view('buku_tamu.buku_tamu', ['pegawai'=>$pegawai, 'data'=>$data, 'data_stats'=>$data_stats]);
    }

    // update simpan buku tamu
    public function storeUpdateBukuTamu(Request $request, $id){
        $bukuTamu = BukuTamu::find($id);
        $bukuTamu->jumlah_tamu = $request['jumlah_tamu'];
        $bukuTamu->waktu_masuk = date('H:i:s');
        $bukuTamu->tanggal_masuk = date('Y-m-d');
        $result = $bukuTamu->update();

        if($result == true){
            return redirect()->back()->with('success', 'Selamat Datang di BAPPEDA, Silahkan Masuk!');
        }
        else{
            return redirect()->back()->with('success', 'Data Gagal Diinputkan');
        }
        
    }

    // fetch data buku tamu
    public function fetchBukuTamu($nama){
        if(empty($nama)){
            return[];
        }

        $tamu = BukuTamu::where('tanggal_janji', date('Y-m-d'))
                ->where('status_janji', 1)
                ->where('nama_tamu', 'LIKE', '%'.$nama.'%')
                ->limit(10)
                ->get();   

        return $tamu;
    }

    // menampilkan data buku tamu yang akan di update
    public function showUpdateBukuTamu($id){
        $pegawai = $this->URI();

        $data_nama = array();
        $data = array();

        $tamu = BukuTamu::select('id', 'nama_tamu', 'tanggal_masuk', 'nip', 'yang_menerima')->where('id', $id)->first();
        $data_yang_ditemui = explode(',', trim($tamu->yang_menerima));  
        $data_nip = explode(',', trim($tamu->nip));
            foreach($data_nip as $nip){
                foreach($pegawai as $p){
                    if($nip == $p['NIP']){
                        array_push($data_nama, $p['NAMA_PEGAWAI']);
                    }
                }
            }
            $tamu->pegawai_ditemui = implode(', ', $data_nama);
            $tamu->pegawai_menerima = $data_yang_ditemui;
            array_push($data, $tamu);
            array_splice($data_nama, 0, count($data_nama));   
        
        return view('buku_tamu.update_buku_tamu', ['pegawai'=>$pegawai, 'data'=>$data[0] ]);
    }

    // mengupdate data buku tamu
    public function updateBukuTamu(Request $request, $id){
        $this->validate($request,[
            'yang_menerima'=>'required',
        ],
        [
            'required' => ':attribute tidak boleh kosong',
        ]);

        // loop data pegawai yang menerima
         $pegawai = $request['yang_menerima'];
         $pegawai_menerima = array();
         for($x = 0; $x < count($pegawai); $x++){
             array_push($pegawai_menerima, $pegawai[$x]);
         }

         //convert array to string
         $data_pegawai_menerima = implode(",", $pegawai_menerima);

         $bukuTamu = BukuTamu::find($id);
         $bukuTamu->yang_menerima = $data_pegawai_menerima;
         $bukuTamu->update();

        return redirect()->route('show.bukutamu')->with('success', 'Edit data berhasil dilakukan');
    }

    // menmapilkan data janji tamu
    public function showJanjiTamu(){
        
        $pegawai = $this->URI();

        $data_nama_menunggu = array();
        $data_nama_disetujui = array();
        $data_nama_ditolak = array();
        $data_menunggu = array();
        $data_setuju = array();
        $data_tolak = array();

        // menunggu
        $tamu_menunggu = BukuTamu::where('status_janji', 0)->orderBy('tanggal_janji', 'desc')->get();
        foreach($tamu_menunggu as $row){
            $data_nip = explode(',', trim($row->nip));
            foreach($data_nip as $nip){
                foreach($pegawai as $p){
                    if($nip == $p['NIP']){
                        array_push($data_nama_menunggu, $p['NAMA_PEGAWAI']);
                    }
                }
            }
            $row->pegawai_ditemui = implode(', ', $data_nama_menunggu);
            array_push($data_menunggu, $row);
            array_splice($data_nama_menunggu, 0, count($data_nama_menunggu));
        }

        // disetujui
        $tamu_setuju = BukuTamu::where('status_janji', 1)->orderBy('tanggal_janji', 'desc')->get();
        foreach($tamu_setuju as $row){
            $data_nip = explode(',', trim($row->nip));
            foreach($data_nip as $nip){
                foreach($pegawai as $p){
                    if($nip == $p['NIP']){
                        array_push($data_nama_disetujui, $p['NAMA_PEGAWAI']);
                    }
                }
            }
            $row->pegawai_ditemui = implode(', ', $data_nama_disetujui);
            array_push($data_setuju, $row);
            array_splice($data_nama_disetujui, 0, count($data_nama_disetujui));
        }

        // ditolak
        $tamu_tolak = BukuTamu::where('status_janji', 2)->orderBy('tanggal_janji', 'desc')->get();
        foreach($tamu_tolak as $row){
            $data_nip = explode(',', trim($row->nip));
            foreach($data_nip as $nip){
                foreach($pegawai as $p){
                    if($nip == $p['NIP']){
                        array_push($data_nama_ditolak, $p['NAMA_PEGAWAI']);
                    }
                }
            }
            $row->pegawai_ditemui = implode(', ', $data_nama_ditolak);
            array_push($data_tolak, $row);
            array_splice($data_nama_ditolak, 0, count($data_nama_ditolak));
        }
        return view('janji_tamu.janji_tamu', ["data_menunggu"=>$data_menunggu, "data_setuju"=>$data_setuju, "data_tolak"=>$data_tolak]);
    }

    // menyimpan data buku tamu
    public function storeJanjiTamu(Request $request){

        // loop data pegawai yang ditemui
        $pegawai = $request['pegawai'];
        $pegawai_ditemui = array();
        for($x = 0; $x < count($pegawai); $x++){
            array_push($pegawai_ditemui, $pegawai[$x]);
        }

        //convert array to string
        $data_pegawai_ditemui = implode(",", $pegawai_ditemui);

        //simpan
        BukuTamu::create([
            'nama_tamu' => ucwords(strtolower($request['nama_tamu'])),
            'instansi' => $request['instansi'],
            'telpon' => $request['telpon'],
            'nip' => $data_pegawai_ditemui,
            'urusan' => $request['urusan'],
            'tanggal_janji' => date('Y-m-d', strtotime(str_replace("/","-", $request['tanggal_janji']))),
            'jam_janji' => $request['jam_janji'],
            'status_janji' => 0
        ]);

        return redirect()->back()->with('success', 'Janji tamu berhasil disimpan!');
    }

    // update status janji tamu
    public function updateJanjiTamu($id, $action){
        if($action == "setujui"){
            $get = BukuTamu::where('id', $id)->update(['status_janji' => 1]);
        }
        elseif($action == "tolak"){
            $get = BukuTamu::where('id', $id)->update(['status_janji' => 2]);
        }

        return redirect()->back();
    }
    
    // menampilkan data janji tamu detail
    public function detailJanjiTamu($id){
        $pegawai = $this->URI();

        $data_nama = array();
        $data = array();

        $tamu = BukuTamu::find($id); 
        $data_nip = explode(',', trim($tamu->nip));
            foreach($data_nip as $nip){
                foreach($pegawai as $p){
                    if($nip == $p['NIP']){
                        array_push($data_nama, $p['NAMA_PEGAWAI']);
                    }
                }
            }
            $tamu->pegawai_ditemui = implode(', ', $data_nama);
            array_push($data, $tamu);
            array_splice($data_nama, 0, count($data_nama));
                  
        return view('janji_tamu.detail_janji_tamu', ['data'=>$data[0]]);
    }


}
