<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Support\Facades\File;


class OperatorController extends Controller
{
    public function import(Request $request)
    {
        dd($request->file('file')); //bakal di tangkap disini file excelnya
    }
    public function index()
    {
        $mahasiswaAktif = Mahasiswa::where('status','AKTIF')->get();
        $mahasiswaCuti = Mahasiswa::where('status','CUTI')->get();
        $mahasiswaDo = Mahasiswa::where('status','DO')->get();
        $mahasiswa = Mahasiswa::all();

        return view('operator.dashboard',compact('mahasiswaAktif','mahasiswaCuti','mahasiswaDo','mahasiswa')); //bakal di tangkap disini file excelnya
    }


    public function listmahasiswa_operator()
    {
        $mahasiswaData = Mahasiswa::select('id_mhs','NIM','fakultas','nama','angkatan','status','jalur_masuk')->get();
        $mahasiswaStatusAktif = Mahasiswa::Where('status','AKTIF')->get();//->count();
       // $mahasiswaTidakAktif = Mahasiswa::whereIn('status', ['MANGKIR', 'DO', 'MENINGGAL']);//->count();
        //$mahasiswaCuti = Mahasiswa::whereIn('status', 'CUTI');//->count();

        return view('operator.listmahasiswa', compact('mahasiswaData','mahasiswaStatusAktif')); //,'mahasiswaTidakAktif','mahasiswaCuti'
    }

    public function editprofilmhs_operator()
    {
        return view('operator.editprofilmhs');
    }

    public function generateAccountForm()
    {
    return view('operator.generate_account');
    }

    public function generateAccount(Request $request)
    {
        $nama = $request->input('nama');
        $nim = $request->input('NIM');
        $angkatan = $request->input('angkatan');
        $email = $nama . '@mahasiswa.com';
    
        // validasi input
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string|unique:mahasiswa,nim',
            'angkatan' => 'required|integer',
        ]);
    
        $user = User::create([
            'nama' => $nama,
            'email' => $email,
            'password' => bcrypt('123456')
        ]);
    
        $mahasiswa = Mahasiswa::create([
            'NIM' => $nim,
            'fakultas' => '',
            'nama' => $nama,
            'email' => $nama . '@mahasiswa.com',
            'alamat' => '',
            'no_HP' => '',
            'angkatan' => $angkatan,
            'status' => 'AKTIF',
            'jalur_masuk' => '',
            'foto' => '',
            'kode_kota_kab' => '',
            'nama_doswal' => '',
            'persetujuan' => '',
        ]);
        

        return redirect('/operator/generate_account')->with('success', 'Akun mahasiswa berhasil ditambahkan.');
    }

    public function generateFromCSV(Request $request)
    {
    // Validate the CSV file
    $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt',
    ]);

    // Move the uploaded CSV file to a temporary location
    $csvFile = $request->file('csv_file');
    $csvFilePath = storage_path('app/temp/' . $csvFile->getClientOriginalName());
    $csvFile->move(storage_path('app/temp'), $csvFile->getClientOriginalName());

    // Process the CSV file
    $csv = Reader::createFromPath($csvFilePath, 'r');
    $stmt = (new Statement())->process($csv);

    // Skip the header row
    $csv->setHeaderOffset(1);

    foreach ($stmt->getRecords() as $record) {
        // Jika baris tidak memiliki semua kolom yang diperlukan, lewatkan
        if (count($record) < 3) {
            continue;
        }

        $nama = $record[0];
        $nim = intval($record[1]);
        $angkatan = intval($record[2]);
        $fakultas = $record[3];
        $jalur_masuk = ($record[4]);
        $email = $nama . '@mahasiswa.com';

        // Create a user record
        $user = Users::updateOrCreate([
            'nama' => $nama,
            'email' => $email,
            'password' => bcrypt('123456'),
        ]);

        // Create a mahasiswa record linked to the user
        Mahasiswa::create([
            'id_mhs' => $user->id,
            'NIM' => $nim,
            'fakultas' => $fakultas, // Replace with the actual value for 'fakultas'
            'nama' => $nama,
            'email' => $email,
            'alamat' => '',
            'no_HP' => '', // Replace with the actual value for 'no_HP'
            'angkatan' => $angkatan,
            'status' => 'AKTIF',
            'jalur_masuk' => $jalur_masuk, // Replace with the actual value for 'jalur_masuk'
            'foto' => '', // Replace with the actual value for 'foto'
            'kode_kota_kab' => '', // Replace with the actual value for 'kode_kota_kab'
            'nama_doswal' => '', // Replace with the actual value for 'nama_doswal'
            'persetujuan' => '', // Replace with the actual value for 'persetujuan'
        ]);
    }

    // Remove the temporary CSV file
    File::delete($csvFilePath);

    return redirect('/operator/generate_account')->with('success', 'Akun mahasiswa berhasil ditambahkan.');
    }

    public function show(){

    $mahasiswa = Mahasiswa::all();

    return view('operator.listmahasiswa', ['mahasiswa' => $mahasiswa]);
    }


    // CRUD DATA MAHASISWA


    public function delete($id_mhs) {
        $mahasiswa = Mahasiswa::find($id_mhs);
    
        if ($mahasiswa) {
            $mahasiswa->delete();
            
            return redirect('operator.listmahasiswa')->with('success', 'Akun mahasiswa berhasil dihapus.');
        } else {
            return redirect('operator.listmahasiswa')->with('failed', 'Mahasiswa dengan nama ' . $id . ' tidak ditemukan.');
        }
    }

    //liat form update data
    public function tampilkandata($id_mhs){
        $mahasiswaNIM = Mahasiswa::find($id_mhs)->get('NIM');
        $mahasiswa = Mahasiswa::find($id_mhs)->first();
        // dd($mahasiswa);

        return view('operator.tampildata', compact('mahasiswa','mahasiswaNIM'));
    }


    public function updatedata(Request $request){
        $mahasiswa = Mahasiswa::find($id_mhs);
        $mahasiswa->update($request->all());

        $mahasiswa->save;

        return redirect('operator.listmahasiswa')->with('succes', 'Data Berhasil di update');
    }
}


