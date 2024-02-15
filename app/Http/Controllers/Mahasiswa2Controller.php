<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Irs;
use App\Models\Khs;
use App\Models\Mahasiswa;
use App\Models\Skripsi;
use App\Models\Pkl;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Mahasiswa2Controller extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $mahasiswa = Mahasiswa::where('id_mhs', $user->id)->first();

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

        
        return view('mahasiswa.dashboard', compact('mahasiswa', 'irs', 'khs', 'pkl', 'skripsi'))
            ->with('irsNull', is_null($irs))
            ->with('khsNull', is_null($khs))
            ->with('pklNull', is_null($pkl))
            ->with('skripsiNull', is_null($skripsi));
    }

    // -----------------Irs

    public function detailIrs_mahasiswa(){

        $user = Auth::user();

        $mahasiswa = Mahasiswa::where('id_mhs',$user->id)->first();
    
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

        return view('mahasiswa.detailIrs', compact('mahasiswa','irs', 'khs','pkl','skripsi'))
            ->with('irsNull', is_null($irs))
            ->with('khsNull', is_null($khs))
            ->with('pklNull', is_null($pkl))
            ->with('skripsiNull', is_null($skripsi));
    }

    public function entryIrs_mahasiswa(Request $request){


        $validator = Validator::make($request->all(), 
        [
            'smst_aktif' => 'required',
            'jumlah_sks' => 'required',
            'berkas_irs' => 'required|file|mimes:png,pdf,docx,jpeg,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('detailIrs_mahasiswa')->with('failed','Irs tidak dapat diunggah, Dicek kelengkapannya ya.');
        }

        //upload file
        $berkas_irs = $request->file('berkas_irs');
        $timestamp = now()->timestamp;
        $berkas_irs->storeAs('public/irs', $timestamp . '_' . $berkas_irs->getClientOriginalName());

        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('id_mhs', $user->id)->first();


        Irs::updateOrCreate(
        [
            'smst_aktif' => $request->smst_aktif,
            'jumlah_sks' => $request->jumlah_sks,
            'berkas_irs' => $timestamp . '_' . $berkas_irs->getClientOriginalName(),
            'status_irs' => 'Terisi',
            'id_mhs' => $mahasiswa->id_mhs,
            'NIM' => $mahasiswa->NIM,
            'persetujuan' => 'Belum Disetujui',
        ]);
        
        
        
        if ($validator->fails()) {
            return redirect()->route('detailIrs_mahasiswa')->with('failed','Irs tidak dapat diunggah, cek kelengkapannya ya.');
        }else {
            return redirect()->route('detailIrs_mahasiswa')->with('success','IRS berhasil diunggah.');
        }
        
    }


    // -------------------Khs

    public function detailKhs_mahasiswa(){
        $user = Auth::user();

        $mahasiswa = Mahasiswa::where('id_mhs',$user->id)->first();
    
        $khs = Khs::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

    
        return view('mahasiswa.detailKhs', compact('mahasiswa','khs'));
    }
    

    public function entryKhs_mahasiswa(Request $request){

        

        $validator = Validator::make($request->all(), [
            'smt_aktif' => 'required',
            'SKS_semester' => 'required',
            'IP_smt' => 'required|numeric',
            'berkas_KHS' => 'required|file|mimes:png,docx,pdf,jpeg,jpg,gif,svg|max:2048',
    ]);
    
    if ($validator->fails()) {
        return redirect()->route('detailKhs_mahasiswa')->with('failed','KHS tidak dapat diunggah, cek kelengkapannya ya.');
    }
    
    //upload file
    $berkas_KHS = $request->file('berkas_KHS');
    $timestamp = now()->timestamp;
    $berkas_KHS->storeAs('public/KHS', $timestamp . '_' . $berkas_KHS->getClientOriginalName());
    
    $user = Auth::user();
    $mahasiswa = Mahasiswa::where('id_mhs', $user->id)->first();
    
    // SKS Kumulatif
    $SKS_semester = $request->SKS_semester;

    $previous_sks_kumulatif = KHS::where('id_mhs', $mahasiswa->id_mhs)
        // ->orderBy('created_at', 'desc')
        ->value('SKS_kumulatif');
    
    $previous_sks_kumulatif = $previous_sks_kumulatif ?? 0;
    
    $SKS_kumulatif = $SKS_semester + $previous_sks_kumulatif;

    // IP Kumulatif
    $IP_smt = $request->IP_smt;
    $SKS_semester = $request->SKS_semester;

    $IPK_prev = KHS::where('id_mhs', $mahasiswa->id_mhs)
        // ->orderBy('created_at', 'desc')
        ->value('IP_kumulatif');
    
    $IPK_prev = $IPK_prev ?? 0;
    
    $IP_kumulatif = number_format(((($IPK_prev*$previous_sks_kumulatif)+ ($IP_smt*$SKS_semester))/$SKS_kumulatif),2);

    KHS::create([
        'smt_aktif' => $request->smt_aktif,
        'SKS_semester' => $request->SKS_semester,
        'SKS_kumulatif' => $SKS_kumulatif,
        'IP_smt' => $request->IP_smt,
        'IP_kumulatif' => $IP_kumulatif,
        'berkas_KHS' => $timestamp . '_' . $berkas_KHS->getClientOriginalName(),
        'status_khs' => 'Terisi',
        'id_mhs' => $mahasiswa->id_mhs,
        'NIM' => $mahasiswa->NIM,
        'persetujuan' => 'Belum Disetujui',
    ]);
            
    
    return redirect()->route('detailKhs_mahasiswa')->with('success', 'KHS berhasil diunggah.');
    }

    // Pkl

    public function detailPkl_mahasiswa(){
        $user = Auth::user();

        $mahasiswa = Mahasiswa::where('id_mhs',$user->id)->first();
    
        $pkl = Pkl::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

    
        return view('mahasiswa.detailPkl', compact('mahasiswa','pkl'));
    }
    public function entryPkl_mahasiswa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status_pkl' => 'required',
            'nilai_pkl' => 'required',
            'berkas_PKL' => 'required|file|mimes:png,pdf,docx,jpeg,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('detailPkl_mahasiswa')->with('failed','Pkl tidak dapat diunggah, cek kelengkapannya ya.');
        }

        //upload file
        $berkas_PKL = $request->file('berkas_PKL');
        $timestamp = now()->timestamp;
        $berkas_PKL->storeAs('public/PKL', $timestamp . '_' . $berkas_PKL->getClientOriginalName());

        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('id_mhs', $user->id)->first();


        Pkl::create([
            'status_pkl' => $request->status_pkl,
            'nilai_pkl' => $request->nilai_pkl,
            'berkas_PKL' => $timestamp . '_' . $berkas_PKL->getClientOriginalName(),
            'id_mhs' => $mahasiswa->id_mhs,
            'NIM' => $mahasiswa->NIM,
            'persetujuan' => 'Belum Disetujui',
        ]);
        

        return redirect()->route('detailPkl_mahasiswa')->with('success', 'PKL berhasil diunggah.');

    }

    // Skripsi



    public function detailSkripsi_mahasiswa(){
        $user = Auth::user();

        $mahasiswa = Mahasiswa::where('id_mhs',$user->id)->first();
    
        $skripsi = Skripsi::where('id_mhs', $mahasiswa->id_mhs)
        ->latest('created_at')
        ->first();

    
        return view('mahasiswa.detailSkripsi', compact('mahasiswa','skripsi'));
    }

    public function entrySkripsi_mahasiswa(Request $request)
    {
        $user = Auth::user();
        $sks_kum = KHS::where('id_mhs', $user->id)->first();
    
        $validator = Validator::make($request->all(), [
            'status_skripsi' => 'required',
            'nilai_skripsi' => 'required',
            'lama_studi' => 'required',
            'tanggal_sidang' => 'required|date_format:m/d/Y',
            'berkas_skripsi' => 'required|file|mimes:png,pdf,docx,jpeg,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('detailSkripsi_mahasiswa')->with('failed', 'Skripsi tidak dapat diunggah, cek kelengkapannya ya.')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Upload file
        $berkas_skripsi = $request->file('berkas_skripsi');
        $timestamp = now()->timestamp;
        $berkas_skripsi->storeAs('public/skripsi', $timestamp . '_' . $berkas_skripsi->getClientOriginalName());
    
        $mahasiswa = Mahasiswa::where('id_mhs', $user->id)->first();
    
        $formattedDate = Carbon::createFromFormat('m/d/Y', $request->tanggal_sidang)->toDateString();
    
        Skripsi::create([
            'status_skripsi' => $request->status_skripsi,
            'lama_studi' => $request->lama_studi,
            'tanggal_sidang' => $formattedDate,
            'nilai_skripsi' => $request->nilai_skripsi,
            'berkas_skripsi' => $timestamp . '_' . $berkas_skripsi->getClientOriginalName(),
            'id_mhs' => $mahasiswa->id_mhs,
            'NIM' => $mahasiswa->NIM,
            'persetujuan' => 'Belum Disetujui',
        ]);
    
        return redirect()->route('detailSkripsi_mahasiswa')->with('success', 'Skripsi berhasil diunggah.');
    }
    

    //Profil


    public function tampilProfil_mahasiswa()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('id_mhs', $user->id)->first();
    
    
        if (!$mahasiswa){
            return redirect()->route('dashboard_mahasiswa')->with('error', 'Profil mahasiswa tidak ditemukan.');
        }
    
        return view('mahasiswa.tampilProfil', compact('mahasiswa'));
    }

    public function editProfil_mahasiswa(Request $request)
    {
        // dd($request->all());
    
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('id_mhs', $user->id)->first();
    
        if (!$mahasiswa) {
            return redirect()->route('dashboard_mahasiswa')->with('error', 'Profil mahasiswa tidak ditemukan.');
        }
    
        $validateData = $request->validate([
            'alamat' => 'required|string',
            'no_HP' => 'required|string',
            'password' => 'nullable|min:8',
        ]);
    
        // Update data tanpa foto
        $mahasiswa->update($validateData);
    
        // // Update foto jika ada file yang diunggah
        // if ($request->hasFile('foto')) {
        //     if ($mahasiswa->foto) {
        //         // Hapus foto lama jika ada
        //         Storage::delete('public/fotoProfil/' . $mahasiswa->foto);
        //     }
        
        //     // Simpan foto baru
        //     $fotoProfil = $request->file('foto');
        //     $timestamp = now()->timestamp;
        //     $namaFile = $timestamp . '_' . $fotoProfil->getClientOriginalName();
        //     $path = $fotoProfil->storeAs('public/fotoProfil', $namaFile);
        
        //     // Update path foto di database
        //     $mahasiswa->update(['foto' => $namaFile]);
        // }
    


        // if ($request->hasFile('foto')) {
        //     if ($mahasiswa->foto) {
        //         // Hapus foto lama jika ada
        //         Storage::delete($mahasiswa->foto);
        //     }
        
        //     // Simpan foto baru
        //     $fotoProfil = $request->file('foto');
        //     $timestamp = now()->timestamp;
        //     $namaFile = $timestamp . '_' . $fotoProfil->getClientOriginalName();
        //     $path = $fotoProfil->storeAs('public/fotoProfil', $namaFile);
        
        //     // Update path foto di database
        //     $mahasiswa->update(['foto' => $path]);
        // }
        

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($mahasiswa->foto) {
                $oldFotoPath = 'fotoProfil/' . $mahasiswa->foto;
                if (file_exists($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }
        
            // Pindahkan dan rename file foto baru dengan timestamp
            $file = $request->file('foto');
            $timestamp = now()->timestamp;
            $fileName = $timestamp . '_' . $file->getClientOriginalName();
            
            $file->move('fotoProfil/', $fileName);
            $mahasiswa->update(['foto' => $file]);
        }        

        if ($request->filled('password')) {
            $password = bcrypt($request->input('password'));
            $user = User::where('email', $mahasiswa->email)->first();
            $user->update(['password' => $password]);
        }

        $mahasiswa->save();

        return redirect()->route('dashboard_mahasiswa')->with('success', 'Profil berhasil diperbarui.');
    }

}