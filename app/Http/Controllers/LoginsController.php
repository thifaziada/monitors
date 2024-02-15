<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Mahasiswa2Controller;

class LoginsController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        //dd($request ->all()); //dump and die debugging
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request -> email,
            'password' => $request -> password
        ];

        //pengecekan login, jika berhasil maka true, jika gagal maka false

        // if(Auth::attempt($data)){
        //     return redirect()->route('dashboard');
        // }
        // else {
        //     return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        // }
        

        if(Auth::attempt($data)){
            if(Auth::user()->hasRole('operator')){
                return redirect()->route('dashboard_operator');
            }
            if(Auth::user()->hasRole('dosenwali')){
                return redirect()->route('dashboard_dosenwali');
            }
            if(Auth::user()->hasRole('departemen')){
                return redirect()->route('dashboard');
            }
            if(Auth::user()->hasRole('mahasiswa')){
                $user = Auth::user();
                $mahasiswa = Mahasiswa::where('id_mhs', $user->id)->first();
                if ($mahasiswa && ($mahasiswa->alamat == null || $mahasiswa->alamat == "")) {
                    return redirect()->route('tampilProfil_mahasiswa', ['id' => Auth::user()->id]);
                }
                return redirect()->route('dashboard_mahasiswa');
            }
        }
        else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }

    public function logout(){
       Auth::logout();
       return redirect()->route('login')->with('success','Kamu berhasil logout.');
    }
}
