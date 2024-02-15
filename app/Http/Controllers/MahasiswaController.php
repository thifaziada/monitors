<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Irs;
use App\Models\Khs;
use App\Models\Pkl;
use App\Models\Skripsi;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Charts\MahasiswaPklChart;
use App\Charts\MahasiswaSkripsiChart;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use PDF;


class MahasiswaController extends Controller
{
    public function index(MahasiswaPklChart $mahasiswaPklChart, MahasiswaSkripsiChart $mahasiswaSkripsiChart){
        
        $user = Auth::user();

        
         
        $mahasiswaStatusAktif = Mahasiswa::Where('status','AKTIF')->get();
        $mahasiswaStatusTidakAktif = Mahasiswa::WhereIn('status',['DO','MENINGGAL'])->get();
        $mahasiswaStatusCuti = Mahasiswa::WhereIn('status',['CUTI'])->get();

        return view('dashboard',[
                    'user' => $user,
                     'mahasiswaPklChart' => $mahasiswaPklChart->build(),
                     'mahasiswaSkripsiChart' => $mahasiswaSkripsiChart->build(),
                     'mahasiswaStatusAktif' => $mahasiswaStatusAktif,
                     'mahasiswaStatusTidakAktif' => $mahasiswaStatusTidakAktif,
                     'mahasiswaStatusCuti' => $mahasiswaStatusCuti
            ]);
    }
    public function listmahasiswa_departemen(Request $request)
    {
        $query = Mahasiswa::select('id_mhs', 'NIM', 'fakultas', 'nama', 'angkatan', 'status', 'jalur_masuk');
    
        // Check if there's a search query
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('NIM', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%');
            });
        }
    
        $mahasiswaData = $query->get();
        $mahasiswaStatusAktif = Mahasiswa::where('status', 'AKTIF')->get();
    
        return view('departemen.listmahasiswa', compact('mahasiswaData', 'mahasiswaStatusAktif'));
    }
   public function carimahasiswa_departemen(Request $request)
    {
        $mahasiswaData = Mahasiswa::select('id_mhs', 'NIM', 'fakultas', 'nama', 'angkatan', 'status', 'jalur_masuk');
        
        if ($request->get('search')){
            $mahasiswaData = $mahasiswaData->where('nama', 'LIKE', '%' . $request->get('search') . '%')
                                            ->orWhere('NIM', 'LIKE', '%' . $request->get('search'). '%');
        }
        $mahasiswaData = $mahasiswaData->get(); // Assign the result back to $mahasiswaData

        return view('departemen.listmahasiswa', compact('mahasiswaData'));
    }
    public function rekapmahasiswa_departemen() {
        // Assuming you have a Mahasiswa model and a Pkl model
    
        // Fetch Mahasiswa records for angkatan '2021'
        $mahasiswaAngk1 = Mahasiswa::where('angkatan', '2017')->get();
        $mahasiswaAngk2 = Mahasiswa::where('angkatan', '2018')->get();
        $mahasiswaAngk3 = Mahasiswa::where('angkatan', '2019')->get();
        $mahasiswaAngk4 = Mahasiswa::where('angkatan', '2020')->get();
        $mahasiswaAngk5 = Mahasiswa::where('angkatan', '2021')->get();
        $mahasiswaAngk6 = Mahasiswa::where('angkatan', '2022')->get();
        $mahasiswaAngk7 = Mahasiswa::where('angkatan', '2023')->get();
    
        // Fetch Pkl records for Mahasiswa with angkatan '2021' and status 'Lulus'
        $mahasiswaAngkPklLulus1 = Pkl::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus1 = Pkl::whereIn('id_mhs',$mahasiswaAngk1->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();
        

        $mahasiswaAngkPklLulus2 = Pkl::whereIn('id_mhs', $mahasiswaAngk2->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus2 = Pkl::whereIn('id_mhs',$mahasiswaAngk2->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();
        

        $mahasiswaAngkPklLulus3 = Pkl::whereIn('id_mhs', $mahasiswaAngk3->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus3 = Pkl::whereIn('id_mhs',$mahasiswaAngk3->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus4 = Pkl::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus4 = Pkl::whereIn('id_mhs',$mahasiswaAngk4->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();

            
        $mahasiswaAngkPklLulus5 = Pkl::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
        ->where('status_pkl', 'Lulus')
        ->get();
        $mahasiswaAngkPklBelumLulus5 = Pkl::whereIn('id_mhs',$mahasiswaAngk5->pluck('id_mhs'))
        ->where('status_pkl','Belum Lulus')
        ->get();

        
        $mahasiswaAngkPklLulus6 = Pkl::whereIn('id_mhs', $mahasiswaAngk6->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus6 = Pkl::whereIn('id_mhs',$mahasiswaAngk6->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();

            
        $mahasiswaAngkPklLulus7 = Pkl::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
        ->where('status_pkl', 'Lulus')
        ->get();
        $mahasiswaAngkPklBelumLulus7 = Pkl::whereIn('id_mhs',$mahasiswaAngk7->pluck('id_mhs'))
        ->where('status_pkl','Belum Lulus')
        ->get();

        //untuk Skripsinya

        $mahasiswaAngkPklLulus1S = Skripsi::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus1S = Skripsi::whereIn('id_mhs',$mahasiswaAngk1->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus2S = Skripsi::whereIn('id_mhs', $mahasiswaAngk2->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus2S = Skripsi::whereIn('id_mhs',$mahasiswaAngk2->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus3S = Skripsi::whereIn('id_mhs', $mahasiswaAngk3->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus3S = Skripsi::whereIn('id_mhs',$mahasiswaAngk3->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus4S = Skripsi::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus4S = Skripsi::whereIn('id_mhs',$mahasiswaAngk4->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus5S = Skripsi::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus5S = Skripsi::whereIn('id_mhs',$mahasiswaAngk5->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus6S = Skripsi::whereIn('id_mhs', $mahasiswaAngk6->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus6S = Skripsi::whereIn('id_mhs',$mahasiswaAngk6->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus7S = Skripsi::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus7S = Skripsi::whereIn('id_mhs',$mahasiswaAngk7->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();


        //berdasarkan status
            $mahasiswaAngk1Aktif = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs'))
            ->where('status','AKTIF')
            ->get();
            

              $mahasiswaAngk1Cuti = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk1Mangkir = Mahasiswa::whereIn('id_mhs',$mahasiswaAngk1->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk1Meninggal = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk1DO = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2018
              $mahasiswaAngk2Aktif = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','AKTIF')
                      ->get();
  
              $mahasiswaAngk2Cuti = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk2Mangkir = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk2Meninggal = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk2DO = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2019
              $mahasiswaAngk3Aktif = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','AKTIF')
                      ->get();
  
              $mahasiswaAngk3Cuti = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk3Mangkir = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk3Meninggal = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk3DO = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2020
              $mahasiswaAngk4Aktif = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','AKTIF')
                      ->get();
  
              $mahasiswaAngk4Cuti = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk4Mangkir = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk4Meninggal = Mahasiswa::whereIn('id_mhs',$mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk4DO = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2021
              $mahasiswaAngk5Aktif = Mahasiswa::whereIn('id_mhs',$mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','AKTIF')
                      ->get();
                    
  
              $mahasiswaAngk5Cuti = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk5Mangkir = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk5Meninggal = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk5DO = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2022
              $mahasiswaAngk6Aktif = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk6->pluck('id_mhs'))
              ->where('status','AKTIF')
              ->get();
  
              $mahasiswaAngk6Cuti = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk6->pluck('id_mhs'))
              ->get();
  
              $mahasiswaAngk6Mangkir = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk6->pluck('id_mhs'))
              ->where('status','MANGKIR')
              ->get();
  
              $mahasiswaAngk6Meninggal = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk6->pluck('id_mhs'))
              ->where('status','MENINGGAL')
              ->get();
  
              $mahasiswaAngk6DO = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk6->pluck('id_mhs'))
              ->where('status','DO')
              ->get();
  
              // 2023
              $mahasiswaAngk7Aktif = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','AKTIF')
              ->get();
  
              $mahasiswaAngk7Cuti = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','CUTI')
              ->get();
  
              $mahasiswaAngk7Mangkir = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','MANGKIR')
              ->get();
  
              $mahasiswaAngk7Meninggal = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','MENINGGAL')
              ->get();
  
              $mahasiswaAngk7DO = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','DO')
              ->get();


        
        
        return view('departemen.rekapMahasiswa', compact('mahasiswaAngk1', 'mahasiswaAngkPklLulus1','mahasiswaAngkPklBelumLulus1', 
        'mahasiswaAngkPklLulus2','mahasiswaAngkPklBelumLulus2'
        , 'mahasiswaAngkPklLulus3','mahasiswaAngkPklBelumLulus3'
        , 'mahasiswaAngkPklLulus4','mahasiswaAngkPklBelumLulus4'
        , 'mahasiswaAngkPklLulus5','mahasiswaAngkPklBelumLulus5'
        , 'mahasiswaAngkPklLulus6','mahasiswaAngkPklBelumLulus6'
        , 'mahasiswaAngkPklLulus7','mahasiswaAngkPklBelumLulus7'
        ,'mahasiswaAngkPklLulus1S','mahasiswaAngkPklBelumLulus2S'
        ,'mahasiswaAngkPklLulus2S','mahasiswaAngkPklBelumLulus1S'
        ,'mahasiswaAngkPklLulus3S','mahasiswaAngkPklBelumLulus3S'
        ,'mahasiswaAngkPklLulus4S','mahasiswaAngkPklBelumLulus4S'
        ,'mahasiswaAngkPklLulus5S','mahasiswaAngkPklBelumLulus5S'
        ,'mahasiswaAngkPklLulus6S','mahasiswaAngkPklBelumLulus6S'
        ,'mahasiswaAngkPklLulus7S','mahasiswaAngkPklBelumLulus7S',
        'mahasiswaAngk1Aktif','mahasiswaAngk1Cuti','mahasiswaAngk1Mangkir','mahasiswaAngk1Meninggal','mahasiswaAngk1DO',
        'mahasiswaAngk2Aktif','mahasiswaAngk2Cuti','mahasiswaAngk2Mangkir','mahasiswaAngk2Meninggal','mahasiswaAngk2DO',
        'mahasiswaAngk3Aktif','mahasiswaAngk3Cuti','mahasiswaAngk3Mangkir','mahasiswaAngk3Meninggal','mahasiswaAngk3DO',
        'mahasiswaAngk4Aktif','mahasiswaAngk4Cuti','mahasiswaAngk4Mangkir','mahasiswaAngk4Meninggal','mahasiswaAngk4DO',
        'mahasiswaAngk5Aktif','mahasiswaAngk5Cuti','mahasiswaAngk5Mangkir','mahasiswaAngk5Meninggal','mahasiswaAngk5DO',
        'mahasiswaAngk6Aktif','mahasiswaAngk6Cuti','mahasiswaAngk6Mangkir','mahasiswaAngk6Meninggal','mahasiswaAngk6DO',
        'mahasiswaAngk7Aktif','mahasiswaAngk7Cuti','mahasiswaAngk7Mangkir','mahasiswaAngk7Meninggal','mahasiswaAngk7DO'
       ));

        
    }


    public function lihatdetailmahasiswa($id_mhs){
        $mahasiswa = Mahasiswa::find($id_mhs);


        $irs = Irs::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

        $khs = Khs::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

        $pkl = Pkl::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

        $skripsi = Skripsi::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

        // dd($mahasiswa);


        return view('departemen.detailmahasiswa', compact('mahasiswa','irs','khs','pkl','skripsi'))
        ->with('irsNull', is_null($irs))
        ->with('khsNull', is_null($khs))
        ->with('pklNull', is_null($pkl))
        ->with('skripsiNull', is_null($skripsi));

    }

    public function detailsemestermhs_departemen($id_mhs){
        $mahasiswa = Mahasiswa::find($id_mhs);


        $irs = Irs::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

        $khs = Khs::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

        $pkl = Pkl::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

        $skripsi = Skripsi::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();


            return view('departemen.detailsemestermhs', compact('mahasiswa','irs','khs','pkl','skripsi'));
    }

    public function verifikasiIRS()
    {
        $irs= Irs::all(); // Mengambil semua data dari tabel IRS

        return view('dosenwali.verifikasiIRS', ['irs' => $irs]);
    }

    public function exportpdf(){
        // $mahasiswaData = Mahasiswa::all();
            // Assuming you have a Mahasiswa model and a Pkl model
    
        // Fetch Mahasiswa records for angkatan '2021'
        $mahasiswaAngk1 = Mahasiswa::where('angkatan', '2017')->get();
        $mahasiswaAngk2 = Mahasiswa::where('angkatan', '2018')->get();
        $mahasiswaAngk3 = Mahasiswa::where('angkatan', '2019')->get();
        $mahasiswaAngk4 = Mahasiswa::where('angkatan', '2020')->get();
        $mahasiswaAngk5 = Mahasiswa::where('angkatan', '2021')->get();
        $mahasiswaAngk6 = Mahasiswa::where('angkatan', '2022')->get();
        $mahasiswaAngk7 = Mahasiswa::where('angkatan', '2023')->get();

    
        // Fetch Pkl records for Mahasiswa with angkatan '2021' and status 'Lulus'
        $mahasiswaAngkPklLulus1 = Pkl::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus1 = Pkl::whereIn('id_mhs',$mahasiswaAngk1->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();
        

        $mahasiswaAngkPklLulus2 = Pkl::whereIn('id_mhs', $mahasiswaAngk2->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus2 = Pkl::whereIn('id_mhs',$mahasiswaAngk2->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();
        

        $mahasiswaAngkPklLulus3 = Pkl::whereIn('id_mhs', $mahasiswaAngk3->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus3 = Pkl::whereIn('id_mhs',$mahasiswaAngk3->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus4 = Pkl::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus4 = Pkl::whereIn('id_mhs',$mahasiswaAngk4->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();

            
        $mahasiswaAngkPklLulus5 = Pkl::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
        ->where('status_pkl', 'Lulus')
        ->get();
        $mahasiswaAngkPklBelumLulus5 = Pkl::whereIn('id_mhs',$mahasiswaAngk5->pluck('id_mhs'))
        ->where('status_pkl','Belum Lulus')
        ->get();

        
        $mahasiswaAngkPklLulus6 = Pkl::whereIn('id_mhs', $mahasiswaAngk6->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus6 = Pkl::whereIn('id_mhs',$mahasiswaAngk6->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();

            
        $mahasiswaAngkPklLulus7 = Pkl::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
        ->where('status_pkl', 'Lulus')
        ->get();
        $mahasiswaAngkPklBelumLulus7 = Pkl::whereIn('id_mhs',$mahasiswaAngk7->pluck('id_mhs'))
        ->where('status_pkl','Belum Lulus')
        ->get();

        //untuk Skripsinya

        $mahasiswaAngkPklLulus1S = Skripsi::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus1S = Skripsi::whereIn('id_mhs',$mahasiswaAngk1->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus2S = Skripsi::whereIn('id_mhs', $mahasiswaAngk2->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus2S = Skripsi::whereIn('id_mhs',$mahasiswaAngk2->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus3S = Skripsi::whereIn('id_mhs', $mahasiswaAngk3->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus3S = Skripsi::whereIn('id_mhs',$mahasiswaAngk3->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus4S = Skripsi::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus4S = Skripsi::whereIn('id_mhs',$mahasiswaAngk4->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus5S = Skripsi::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus5S = Skripsi::whereIn('id_mhs',$mahasiswaAngk5->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus6S = Skripsi::whereIn('id_mhs', $mahasiswaAngk6->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus6S = Skripsi::whereIn('id_mhs',$mahasiswaAngk6->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus7S = Skripsi::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus7S = Skripsi::whereIn('id_mhs',$mahasiswaAngk7->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();


        
        view()->share('mahasiswadata', compact('mahasiswaAngk1', 'mahasiswaAngkPklLulus1','mahasiswaAngkPklBelumLulus1', 
        'mahasiswaAngkPklLulus2','mahasiswaAngkPklBelumLulus2'
        , 'mahasiswaAngkPklLulus3','mahasiswaAngkPklBelumLulus3'
        , 'mahasiswaAngkPklLulus4','mahasiswaAngkPklBelumLulus4'
        , 'mahasiswaAngkPklLulus5','mahasiswaAngkPklBelumLulus5'
        , 'mahasiswaAngkPklLulus6','mahasiswaAngkPklBelumLulus6'
        , 'mahasiswaAngkPklLulus7','mahasiswaAngkPklBelumLulus7'
        ,'mahasiswaAngkPklLulus1S','mahasiswaAngkPklBelumLulus2S'
        ,'mahasiswaAngkPklLulus2S','mahasiswaAngkPklBelumLulus1S'
        ,'mahasiswaAngkPklLulus3S','mahasiswaAngkPklBelumLulus3S'
        ,'mahasiswaAngkPklLulus4S','mahasiswaAngkPklBelumLulus4S'
        ,'mahasiswaAngkPklLulus5S','mahasiswaAngkPklBelumLulus5S'
        ,'mahasiswaAngkPklLulus6S','mahasiswaAngkPklBelumLulus6S'
        ,'mahasiswaAngkPklLulus7S','mahasiswaAngkPklBelumLulus7S'));

        $pdf = PDF::loadView('departemen.rekapMahasiswa-pdf');
        return $pdf->download('mahasiswadata.pdf');

        
    } 

    public function exportpdf1(){
        // $mahasiswaData = Mahasiswa::all();
            // Assuming you have a Mahasiswa model and a Pkl model
    
        // Fetch Mahasiswa records for angkatan '2021'
        $mahasiswaAngk1 = Mahasiswa::where('angkatan', '2017')->get();
        $mahasiswaAngk2 = Mahasiswa::where('angkatan', '2018')->get();
        $mahasiswaAngk3 = Mahasiswa::where('angkatan', '2019')->get();
        $mahasiswaAngk4 = Mahasiswa::where('angkatan', '2020')->get();
        $mahasiswaAngk5 = Mahasiswa::where('angkatan', '2021')->get();
        $mahasiswaAngk6 = Mahasiswa::where('angkatan', '2022')->get();
        $mahasiswaAngk7 = Mahasiswa::where('angkatan', '2023')->get();
    
        // Fetch Pkl records for Mahasiswa with angkatan '2021' and status 'Lulus'
        $mahasiswaAngkPklLulus1 = Pkl::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus1 = Pkl::whereIn('id_mhs',$mahasiswaAngk1->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();
        

        $mahasiswaAngkPklLulus2 = Pkl::whereIn('id_mhs', $mahasiswaAngk2->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus2 = Pkl::whereIn('id_mhs',$mahasiswaAngk2->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();
        

        $mahasiswaAngkPklLulus3 = Pkl::whereIn('id_mhs', $mahasiswaAngk3->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus3 = Pkl::whereIn('id_mhs',$mahasiswaAngk3->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus4 = Pkl::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus4 = Pkl::whereIn('id_mhs',$mahasiswaAngk4->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();

            
        $mahasiswaAngkPklLulus5 = Pkl::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
        ->where('status_pkl', 'Lulus')
        ->get();
        $mahasiswaAngkPklBelumLulus5 = Pkl::whereIn('id_mhs',$mahasiswaAngk5->pluck('id_mhs'))
        ->where('status_pkl','Belum Lulus')
        ->get();

        
        $mahasiswaAngkPklLulus6 = Pkl::whereIn('id_mhs', $mahasiswaAngk6->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_pkl', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus6 = Pkl::whereIn('id_mhs',$mahasiswaAngk6->pluck('id_mhs'))
            ->where('status_pkl','Belum Lulus')
            ->get();

            
        $mahasiswaAngkPklLulus7 = Pkl::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
        ->where('status_pkl', 'Lulus')
        ->get();
        $mahasiswaAngkPklBelumLulus7 = Pkl::whereIn('id_mhs',$mahasiswaAngk7->pluck('id_mhs'))
        ->where('status_pkl','Belum Lulus')
        ->get();

        //untuk Skripsinya

        $mahasiswaAngkPklLulus1S = Skripsi::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus1S = Skripsi::whereIn('id_mhs',$mahasiswaAngk1->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus2S = Skripsi::whereIn('id_mhs', $mahasiswaAngk2->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus2S = Skripsi::whereIn('id_mhs',$mahasiswaAngk2->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus3S = Skripsi::whereIn('id_mhs', $mahasiswaAngk3->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus3S = Skripsi::whereIn('id_mhs',$mahasiswaAngk3->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus4S = Skripsi::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus4S = Skripsi::whereIn('id_mhs',$mahasiswaAngk4->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus5S = Skripsi::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus5S = Skripsi::whereIn('id_mhs',$mahasiswaAngk5->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus6S = Skripsi::whereIn('id_mhs', $mahasiswaAngk6->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus6S = Skripsi::whereIn('id_mhs',$mahasiswaAngk6->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        $mahasiswaAngkPklLulus7S = Skripsi::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs')) //pluck untuk ambil dalam bentuk array
            ->where('status_skripsi', 'Lulus')
            ->get();
        $mahasiswaAngkPklBelumLulus7S = Skripsi::whereIn('id_mhs',$mahasiswaAngk7->pluck('id_mhs'))
            ->where('status_skripsi','Belum Lulus')
            ->get();

        
        view()->share('mahasiswadata', compact('mahasiswaAngk1', 'mahasiswaAngkPklLulus1','mahasiswaAngkPklBelumLulus1', 
        'mahasiswaAngkPklLulus2','mahasiswaAngkPklBelumLulus2'
        , 'mahasiswaAngkPklLulus3','mahasiswaAngkPklBelumLulus3'
        , 'mahasiswaAngkPklLulus4','mahasiswaAngkPklBelumLulus4'
        , 'mahasiswaAngkPklLulus5','mahasiswaAngkPklBelumLulus5'
        , 'mahasiswaAngkPklLulus6','mahasiswaAngkPklBelumLulus6'
        , 'mahasiswaAngkPklLulus7','mahasiswaAngkPklBelumLulus7'
        ,'mahasiswaAngkPklLulus1S','mahasiswaAngkPklBelumLulus2S'
        ,'mahasiswaAngkPklLulus2S','mahasiswaAngkPklBelumLulus1S'
        ,'mahasiswaAngkPklLulus3S','mahasiswaAngkPklBelumLulus3S'
        ,'mahasiswaAngkPklLulus4S','mahasiswaAngkPklBelumLulus4S'
        ,'mahasiswaAngkPklLulus5S','mahasiswaAngkPklBelumLulus5S'
        ,'mahasiswaAngkPklLulus6S','mahasiswaAngkPklBelumLulus6S'
        ,'mahasiswaAngkPklLulus7S','mahasiswaAngkPklBelumLulus7S'));

        $pdf = PDF::loadView('departemen.rekapMahasiswaSkrp-pdf');
        return $pdf->download('mahasiswadataSkrp.pdf');

        
    } 

    public function exportpdf2(){

        $mahasiswaAngk1 = Mahasiswa::where('angkatan', '2017')->get();
        $mahasiswaAngk2 = Mahasiswa::where('angkatan', '2018')->get();
        $mahasiswaAngk3 = Mahasiswa::where('angkatan', '2019')->get();
        $mahasiswaAngk4 = Mahasiswa::where('angkatan', '2020')->get();
        $mahasiswaAngk5 = Mahasiswa::where('angkatan', '2021')->get();
        $mahasiswaAngk6 = Mahasiswa::where('angkatan', '2022')->get();
        $mahasiswaAngk7 = Mahasiswa::where('angkatan', '2023')->get();
    

        $mahasiswaAngk1Aktif = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs'))
            ->where('status','AKTIF')
            ->get();
            

              $mahasiswaAngk1Cuti = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk1Mangkir = Mahasiswa::whereIn('id_mhs',$mahasiswaAngk1->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk1Meninggal = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk1DO = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk1->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2018
              $mahasiswaAngk2Aktif = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','AKTIF')
                      ->get();
  
              $mahasiswaAngk2Cuti = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk2Mangkir = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk2Meninggal = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk2DO = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk2->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2019
              $mahasiswaAngk3Aktif = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','AKTIF')
                      ->get();
  
              $mahasiswaAngk3Cuti = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk3Mangkir = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk3Meninggal = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk3DO = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk3->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2020
              $mahasiswaAngk4Aktif = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','AKTIF')
                      ->get();
  
              $mahasiswaAngk4Cuti = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk4Mangkir = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk4Meninggal = Mahasiswa::whereIn('id_mhs',$mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk4DO = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk4->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2021
              $mahasiswaAngk5Aktif = Mahasiswa::whereIn('id_mhs',$mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','AKTIF')
                      ->get();
                    
  
              $mahasiswaAngk5Cuti = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','CUTI')
                      ->get();
  
              $mahasiswaAngk5Mangkir = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','MANGKIR')
                      ->get();
  
              $mahasiswaAngk5Meninggal = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','MENINGGAL')
                      ->get();
  
              $mahasiswaAngk5DO = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk5->pluck('id_mhs'))
                      ->where('status','DO')
                      ->get();
  
              // 2022
              $mahasiswaAngk6Aktif = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk6->pluck('id_mhs'))
              ->where('status','AKTIF')
              ->get();
  
              $mahasiswaAngk6Cuti = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk6->pluck('id_mhs'))
              ->get();
  
              $mahasiswaAngk6Mangkir = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk6->pluck('id_mhs'))
              ->where('status','MANGKIR')
              ->get();
  
              $mahasiswaAngk6Meninggal = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk6->pluck('id_mhs'))
              ->where('status','MENINGGAL')
              ->get();
  
              $mahasiswaAngk6DO = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk6->pluck('id_mhs'))
              ->where('status','DO')
              ->get();
  
              // 2023
              $mahasiswaAngk7Aktif = Mahasiswa::whereIn('id_mhs',  $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','AKTIF')
              ->get();
  
              $mahasiswaAngk7Cuti = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','CUTI')
              ->get();
  
              $mahasiswaAngk7Mangkir = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','MANGKIR')
              ->get();
  
              $mahasiswaAngk7Meninggal = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','MENINGGAL')
              ->get();
  
              $mahasiswaAngk7DO = Mahasiswa::whereIn('id_mhs', $mahasiswaAngk7->pluck('id_mhs'))
              ->where('status','DO')
              ->get();


         view()->share('mahasiswadata', compact('mahasiswaAngk1Aktif','mahasiswaAngk1Cuti','mahasiswaAngk1Mangkir','mahasiswaAngk1Meninggal','mahasiswaAngk1DO',
         'mahasiswaAngk2Aktif','mahasiswaAngk2Cuti','mahasiswaAngk2Mangkir','mahasiswaAngk2Meninggal','mahasiswaAngk2DO',
         'mahasiswaAngk3Aktif','mahasiswaAngk3Cuti','mahasiswaAngk3Mangkir','mahasiswaAngk3Meninggal','mahasiswaAngk3DO',
         'mahasiswaAngk4Aktif','mahasiswaAngk4Cuti','mahasiswaAngk4Mangkir','mahasiswaAngk4Meninggal','mahasiswaAngk4DO',
         'mahasiswaAngk5Aktif','mahasiswaAngk5Cuti','mahasiswaAngk5Mangkir','mahasiswaAngk5Meninggal','mahasiswaAngk5DO',
         'mahasiswaAngk6Aktif','mahasiswaAngk6Cuti','mahasiswaAngk6Mangkir','mahasiswaAngk6Meninggal','mahasiswaAngk6DO',
         'mahasiswaAngk7Aktif','mahasiswaAngk7Cuti','mahasiswaAngk7Mangkir','mahasiswaAngk7Meninggal','mahasiswaAngk7DO'
        ));
                    
            $pdf = PDF::loadView('departemen.rekapMahasiswaStatus-pdf');
            return $pdf->download('mahasiswadataStatus.pdf');
    }


}


//-----------------NOTES------------------------------------------
        //dd(auth()->user()->getRoleNames()); //cek rolenya

        // if(auth()->user()->can('view_dashboard')){ //can menampilkan boolean, membatasi view dari blade
        //     return view('dashboard',[
        //         'mahasiswaPklChart' => $mahasiswaPklChart->build(),
        //         'mahasiswaSkripsiChart' => $mahasiswaSkripsiChart->build()
        //     ]);
        // }else{
        //     return abort(403);
        // }
        // return view('dashboard',[
        //     'mahasiswaPklChart' => $mahasiswaPklChart->build(),
        //     'mahasiswaSkripsiChart' => $mahasiswaSkripsiChart->build()
        // ]);
