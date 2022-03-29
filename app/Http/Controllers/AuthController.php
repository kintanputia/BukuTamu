<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    // mengambil data dari URI
    protected function URI(){
        //read data
        $url = file_get_contents('http://sakatoplan.sumbarprov.go.id/sin/sso/generate_token/sso/ssokoneksi');
        $json = file_get_contents('http://sakatoplan.sumbarprov.go.id/sin/sso/PekaPegawai/'.$url);
        $pegawai = json_decode($json, true);
    
        return $pegawai;
    }

    public function login(Request $request){

        // get data
        $username = trim($request['username']);
        $password = md5(sha1(strip_tags(addslashes(trim($request['password'])))).'beye');

        //if user already login 
        if(Session::has('loggedin') && Session::get('loggedin') === true){
            return redirect('/dashboard');
            exit;
        }

        $pegawai = $this->URI();
        foreach($pegawai as $p){
            if($username == $p['USERNAME'] && $password == $p['PASSWORD']){
                $token = bin2hex(random_bytes(40));
                User::updateOrCreate(
                    ['nip' =>  $p['NIP']],
                    ['token' => $token]
                );
                
                Session::put('token', $token);
                Session::put('user', $p['NAMA_PEGAWAI']);
                Session::put('loggedin', true); 
                return redirect('/dashboard');
            }
        } 
    }

    public function index(){
        return view('home');
    }   
    
    public function logout(){
        if(Session::has('token')){
            User::where('token', Session::get('token'))->update(['token' => null]);
            Session::pull('token'); Session::pull('user'); Session::pull('loggedin'); 

            return redirect()->route('login');
        }  
    }
        
   

}
