<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Khs;
use App\Models\Irs;
use App\Models\Pkl;
use App\Models\Skripsi;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Charts\MahasiswaPklChart;
use App\Charts\MahasiswaSkripsiChart;
use App\Charts\PerwalianPklChart;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DosenController extends Controller
{
    public function mahasiswaPerwalian(PerwalianPklChart $perwalianPklChart)
    {
    $currentUser = Auth::user();

    $mahasiswaBelumDisetujui = Mahasiswa::where('nama_doswal', $currentUser->nama)
    ->where('persetujuan', 'Belum Disetujui')
    ->get();

    $mahasiswaDisetujui = Mahasiswa::where('nama_doswal', $currentUser->nama)
    ->where('persetujuan', 'Disetujui')
    ->get();

    // Menggunakan nama user sebagai parameter untuk menghitung jumlah mahasiswa
    $jumlahMahasiswa = Mahasiswa::where('nama_doswal', $currentUser->nama)->get(); 

    return view('dosenwali.dashboard',[
        'perwalianPklChart' => $perwalianPklChart->build(),
        'mahasiswaBelumDisetujui' => $mahasiswaBelumDisetujui,
        'mahasiswaDisetujui' => $mahasiswaDisetujui,
        'jumlahMahasiswa' => $jumlahMahasiswa
    ]);
    }

    // public function daftarMahasiswa(Request $request)
    // {
    //     $search = $request->input('search');

    //     $query = Mahasiswa::where('nama_doswal', 'Dr. Aris Puji Widodo, S.Si, M.T');

    //     if ($search) {
    //         $query->where(function ($subquery) use ($search) {
    //             $subquery->where('nama', 'LIKE', '%' . $search . '%')
    //                      ->orWhere('NIM', 'LIKE', '%' . $search . '%');
    //         });
    //     }

    //     $mahasiswa = $query->get();

    //     return view('dosenwali.daftarMahasiswa', compact('mahasiswa'));
    // }

    public function listPerwalian(){
        $currentUser = Auth::user();

        $listmahasiswa = Mahasiswa::where('nama_doswal', $currentUser->nama)->get();

        return view('dosenwali.listperwalian',[
            'listmahasiswa' => $listmahasiswa
        ]);
    }

    public function verifikasiIrs(){
        $currentUser = Auth::user();

        $mahasiswas = Mahasiswa::where('nama_doswal', $currentUser->nama)->get();

        // Mengambil semua id_mhs yang sesuai dengan kriteria
        $idMhsArray = $mahasiswas->pluck('id_mhs')->toArray();

        // Mengambil semua data IRS yang sesuai dengan id_mhs yang telah diambil
        $verifIRS = Irs::whereIn('id_mhs', $idMhsArray)
            ->where('persetujuan', 'Belum Disetujui')
            ->with('mahasiswa')
            ->get();
        return view('dosenwali.verifikasiIRS',[
            'mahasiswas' => $mahasiswas,
            'verifIRS' => $verifIRS
        ]);
    }

    public function verifikasiKHS(){
        $currentUser = Auth::user();

        $mahasiswas = Mahasiswa::where('nama_doswal', $currentUser->nama)->get();

        // Mengambil semua id_mhs yang sesuai dengan kriteria
        $idMhsArray = $mahasiswas->pluck('id_mhs')->toArray();

        // Mengambil semua data IRS yang sesuai dengan id_mhs yang telah diambil
        $verifKHS = Khs::whereIn('id_mhs', $idMhsArray)
            ->where('persetujuan', 'Belum Disetujui')
            ->with('mahasiswa')
            ->get();

        return view('dosenwali.verifikasiKHS',[
            'verifKHS' => $verifKHS
        ]);
    }

    public function verifikasiPKL(){
        $currentUser = Auth::user();

        $mahasiswas = Mahasiswa::where('nama_doswal', $currentUser->nama)->get();

        // Mengambil semua id_mhs yang sesuai dengan kriteria
        $idMhsArray = $mahasiswas->pluck('id_mhs')->toArray();

        // Mengambil semua data IRS yang sesuai dengan id_mhs yang telah diambil
        $verifPKL = Pkl::whereIn('id_mhs', $idMhsArray)
            ->where('persetujuan', 'Belum Disetujui')
            ->with('mahasiswa')
            ->get();

        return view('dosenwali.verifikasiPKL',[
            'verifPKL' => $verifPKL
        ]);
    }

    public function verifikasiSkripsi(){
        $currentUser = Auth::user();

        $mahasiswas = Mahasiswa::where('nama_doswal', $currentUser->nama)->get();

        // Mengambil semua id_mhs yang sesuai dengan kriteria
        $idMhsArray = $mahasiswas->pluck('id_mhs')->toArray();

        // Mengambil semua data IRS yang sesuai dengan id_mhs yang telah diambil
        $verifSkripsi = Skripsi::whereIn('id_mhs', $idMhsArray)
            ->where('persetujuan', 'Belum Disetujui')
            ->with('mahasiswa')
            ->get();

        return view('dosenwali.verifikasiSkripsi',[
            'verifSkripsi' => $verifSkripsi
        ]);
    }

    public function setujuiVerifikasiIrs($idIrs)
    {
        // Temukan data IRS berdasarkan ID
        $verifIrs = Irs::findOrFail($idIrs);

        // Set status persetujuan menjadi 'Disetujui'
        $verifIrs->persetujuan = 'Sudah Disetujui';
        $verifIrs->save();

        // Redirect kembali ke halaman verifikasiIRS dengan pesan sukses
        return Redirect::route('verifikasiIRS_dosenwali')->with('success', 'Data IRS berhasil disetujui');
    }

    public function tolakVerifikasiIrs($idIrs)
    {
        // Temukan data IRS berdasarkan ID
        $verifIrs = Irs::findOrFail($idIrs);

        // Hapus data IRS dari database
        $verifIrs->delete();

        // Redirect kembali ke halaman verifikasiIRS dengan pesan sukses
        return Redirect::route('verifikasiIRS_dosenwali')->with('success', 'Data IRS berhasil ditolak');
    }

    public function setujuiVerifikasiKhs($idKhs)
    {
        // Temukan data IRS berdasarkan ID
        $verifKhs = Khs::findOrFail($idKhs);

        // Set status persetujuan menjadi 'Disetujui'
        $verifKhs->persetujuan = 'Sudah Disetujui';
        $verifKhs->save();

        // Redirect kembali ke halaman verifikasiIRS dengan pesan sukses
        return Redirect::route('verifikasiKHS_dosenwali')->with('success', 'Data KHS berhasil disetujui');
    }

    public function tolakVerifikasiKhs($idKhs)
    {
        // Temukan data IRS berdasarkan ID
        $verifKhs = Khs::findOrFail($idKhs);

        // Hapus data IRS dari database
        $verifKhs->delete();

        // Redirect kembali ke halaman verifikasiIRS dengan pesan sukses
        return Redirect::route('verifikasiKHS_dosenwali')->with('success', 'Data KHS berhasil ditolak');
    }

    public function setujuiVerifikasiPkl($idPkl)
    {
        // Temukan data IRS berdasarkan ID
        $verifPkl = Pkl::findOrFail($idPkl);

        // Set status persetujuan menjadi 'Disetujui'
        $verifPkl->persetujuan = 'Sudah Disetujui';
        $verifPkl->save();

        // Redirect kembali ke halaman verifikasiIRS dengan pesan sukses
        return Redirect::route('verifikasiPKL_dosenwali')->with('success', 'Data PKL berhasil disetujui');
    }

    public function tolakVerifikasiPkl($idPkl)
    {
        // Temukan data IRS berdasarkan ID
        $verifPkl = Pkl::findOrFail($idPkl);

        // Hapus data IRS dari database
        $verifPkl->delete();

        // Redirect kembali ke halaman verifikasiIRS dengan pesan sukses
        return Redirect::route('verifikasiPKL_dosenwali')->with('success', 'Data PKL berhasil ditolak');
    }

    public function setujuiVerifikasiSkripsi($idSkripsi)
    {
        // Temukan data IRS berdasarkan ID
        $verifSkripsi = SKripsi::findOrFail($idSkripsi);

        // Set status persetujuan menjadi 'Disetujui'
        $verifSkripsi->persetujuan = 'Sudah Disetujui';
        $verifSkripsi->save();

        // Redirect kembali ke halaman verifikasiIRS dengan pesan sukses
        return Redirect::route('verifikasiPKL_dosenwali')->with('success', 'Data Skripsi berhasil disetujui');
    }

    public function tolakVerifikasiSkripsi($idSkripsi)
    {
        // Temukan data IRS berdasarkan ID
        $verifSkripsi = SKripsi::findOrFail($idSkripsi);

        // Hapus data IRS dari database
        $verifSkripsi->delete();

        // Redirect kembali ke halaman verifikasiIRS dengan pesan sukses
        return Redirect::route('verifikasiSkripsi_dosenwali')->with('success', 'Data Skripsi berhasil ditolak');
    }

    /**
     * 
     * @param \App\Models\Irs $irs
     * @return \Illuminate\Http\Response
     */
    public function editIrs($idIrs)
    {
        $irsData = Irs::findOrFail($idIrs);

        return view('dosenwali.edit.irs', ['irsData' => $irsData]);
    }

    public function updateIrs(Request $request, $idIrs)
    {
        $validator = Validator::make($request->all(), [
            'smst_aktif' => 'required',
            'jumlah_sks' => 'required',
            'berkas_irs' => 'nullable|file|mimes:png,pdf,docx,jpeg,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('editIrs_dosenwali', ['idIrs' => $idIrs])->with('failed', 'IRS tidak dapat diupdate, cek kelengkapannya ya.');
        }

        $irs = Irs::findOrFail($idIrs);

        // Jika ada file baru diunggah, ganti file lama
        if ($request->hasFile('berkas_irs')) {
            $berkas_irs = $request->file('berkas_irs');
            $berkas_irs->storeAs('public/irs', $berkas_irs->getClientOriginalName());
            $irs->berkas_irs = $berkas_irs->getClientOriginalName();
        }

        // Update data IRS
        $irs->smst_aktif = $request->smst_aktif;
        $irs->jumlah_sks = $request->jumlah_sks;
        $irs->save();

        return redirect()->route('verifikasiIRS_dosenwali')->with('success', 'Data IRS berhasil diupdate.');
    }


    public function editKhs($idKhs)
    {
        $khsData = Khs::findOrFail($idKhs);

        return view('dosenwali.edit.khs', ['khsData' => $khsData]);
    }

    public function updateKhs(Request $request, $idKhs)
    {
        $validator = Validator::make($request->all(), [
            'smt_aktif' => 'required',
            'SKS_semester' => 'required',
            'IP_smt' => 'required|numeric',
            'berkas_KHS' => 'nullable|file|mimes:png,docx,pdf,jpeg,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('editKhs_dosenwali', ['idKhs' => $idKhs])->with('failed', 'KHS tidak dapat diupdate, cek kelengkapannya ya.');
        }

        $khs = KHS::findOrFail($idKhs);

        // Jika ada file baru diunggah, ganti file lama
        if ($request->hasFile('berkas_KHS')) {
            $berkas_KHS = $request->file('berkas_KHS');
            $berkas_KHS->storeAs('public/KHS', $berkas_KHS->getClientOriginalName());
            $khs->berkas_KHS = $berkas_KHS->getClientOriginalName();
        }

        // Update data KHS
        $khs->smt_aktif = $request->smt_aktif;
        $khs->SKS_semester = $request->SKS_semester;

        // Update SKS Kumulatif
        $previous_sks_kumulatif = KHS::where('id_mhs', $khs->id_mhs)
            ->where('id_khs', '<>', $idKhs)
            ->sum('SKS_semester');

        $SKS_kumulatif = $request->SKS_semester + $previous_sks_kumulatif;

        $khs->SKS_kumulatif = $SKS_kumulatif;

        // Update IP Kumulatif
        $IP_smt = $request->IP_smt;
        $previous_sks_kumulatif = $previous_sks_kumulatif ?? 0;

        $IPK_prev = KHS::where('id_mhs', $khs->id_mhs)
            ->where('id_khs', '<>', $idKhs)
            ->value('IP_kumulatif');

        $IP_kumulatif = (($IPK_prev * $previous_sks_kumulatif) + ($IP_smt * $request->SKS_semester)) / $SKS_kumulatif;

        $khs->IP_smt = $request->IP_smt;
        $khs->IP_kumulatif = $IP_kumulatif;

        $khs->save();

        return redirect()->route('verifikasiKHS_dosenwali')->with('success', 'Data KHS berhasil diupdate.');
    }

    public function editPkl($idPkl)
    {
        $pklData = Pkl::findOrFail($idPkl);

        return view('dosenwali.edit.pkl', ['pklData' => $pklData]);
    }

    public function updatePkl_dosenwali(Request $request, $idPkl)
    {
        $validator = Validator::make($request->all(), [
            'status_pkl' => 'required',
            'nilai_pkl' => 'required',
            'berkas_PKL' => 'nullable|file|mimes:png,pdf,docx,jpeg,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('verifikasiPKL_dosenwali')->with('failed', 'PKL tidak dapat diupdate, cek kelengkapannya ya.');
        }

        // Temukan data PKL berdasarkan ID
        $pkl = PKL::findOrFail($idPkl);

        // Jika ada file baru diunggah, ganti file lama
        if ($request->hasFile('berkas_PKL')) {
            $berkas_PKL = $request->file('berkas_PKL');
            $berkas_PKL->storeAs('public/PKL', $berkas_PKL->getClientOriginalName());
            $pkl->berkas_PKL = $berkas_PKL->getClientOriginalName();
        }

        // Update data PKL
        $pkl->status_pkl = $request->status_pkl;
        $pkl->nilai_pkl = $request->nilai_pkl;
        $pkl->save();

        return redirect()->route('verifikasiPKL_dosenwali')->with('success', 'Data PKL berhasil diupdate.');
    }

    public function editSkripsi($idSkripsi)
    {
        $skripsiData = Skripsi::findOrFail($idSkripsi);

        return view('dosenwali.edit.skripsi', ['skripsiData' => $skripsiData]);
    }

    // Dalam DosenController.php

    public function updateSkripsi(Request $request, $idSkripsi)
    {
        $validator = Validator::make($request->all(), [
            'status_skripsi' => 'required',
            'nilai_skripsi' => 'required',
            'berkas_skripsi' => 'nullable|file|mimes:png,pdf,docx,jpeg,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('verifikasiSkripsi_dosenwali')->with('failed', 'Skripsi tidak dapat diupdate, cek kelengkapannya ya.');
        }

        // Temukan data skripsi berdasarkan ID
        $skripsi = Skripsi::findOrFail($idSkripsi);

        // Jika ada file baru diunggah, ganti file lama
        if ($request->hasFile('berkas_skripsi')) {
            $berkas_skripsi = $request->file('berkas_skripsi');
            $berkas_skripsi->storeAs('public/skripsi', $berkas_skripsi->getClientOriginalName());
            $skripsi->berkas_skripsi = $berkas_skripsi->getClientOriginalName();
        }

        // Update data skripsi
        $skripsi->status_skripsi = $request->status_skripsi;
        $skripsi->nilai_skripsi = $request->nilai_skripsi;
        $skripsi->save();

        return redirect()->route('verifikasiSkripsi_dosenwali')->with('success', 'Data skripsi berhasil diupdate.');
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

        return view('dosenwali.detailmahasiswa', compact('mahasiswa','irs','khs','pkl','skripsi'))
        ->with('irsNull', is_null($irs))
        ->with('khsNull', is_null($khs))
        ->with('pklNull', is_null($pkl))
        ->with('skripsiNull', is_null($skripsi));

    }
    
}




    /**
     * Store a newly created resource in storage.
     */
  