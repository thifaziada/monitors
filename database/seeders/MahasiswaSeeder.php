<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::updateOrCreate([
            'NIM' =>'24060121140165',
            'fakultas' =>'Sains dan Matematika',
            'nama' => 'Hidayatullah', //hash untuk mengenkripsi
            'email' => 'Hidayah@students.undip.ac.id',
            'alamat' => 'Jl Sawo Mateng',
            'no_HP' => '081210011234',
            'angkatan' => '2021',
            'status' => 'MENINGGAL',
            'jalur_masuk' => 'SBMPTN',
            'foto' => '',
            'kode_kota_kab' => '13',
            'nama_doswal' => 'Dr. Aris Puji Widodo, S.Si, M.T',
            'persetujuan' => 'Belum Disetujui',
        ]);
        Mahasiswa::updateOrCreate([
            'NIM' =>'24060121140166',
            'fakultas' =>'Sains dan Matematika',
            'nama' => 'Japirong Kusunamingrum', //hash untuk mengenkripsi
            'email' => 'Japirong@students.undip.ac.id',
            'alamat' => 'Jl Pecicilan',
            'no_HP' => '081210011235',
            'angkatan' => '2021',
            'status' => 'CUTI',
            'jalur_masuk' => 'SBMPTN',
            'foto' => '',
            'kode_kota_kab' => '14',
            'nama_doswal' => 'Dr. Aris Puji Widodo, S.Si, M.T',
            'persetujuan' => 'Belum Disetujui',
        ]);
        Mahasiswa::updateOrCreate([
            'NIM' =>'24060121140170',
            'fakultas' =>'Sains dan Matematika',
            'nama' => 'Thifong jigong', //hash untuk mengenkripsi
            'email' => 'Thifong@students.undip.ac.id',
            'alamat' => 'Jl Kematengan',
            'no_HP' => '081210011222',
            'angkatan' => '2021',
            'status' => 'DO',
            'jalur_masuk' => 'SBMPTN',
            'foto' => '',
            'kode_kota_kab' => '14',
            'nama_doswal' => 'Dr. Aris Puji Widodo, S.Si, M.T',
            'persetujuan' => 'Belum Disetujui',
        ]);
        Mahasiswa::updateOrCreate([
            'NIM' =>'24060121140180',
            'fakultas' =>'Sains dan Matematika',
            'nama' => 'Gemcana Ki Jungkik', //hash untuk mengenkripsi
            'email' => 'Gemcana@students.undip.ac.id',
            'alamat' => 'Jl Kekoreaan',
            'no_HP' => '081210011000',
            'angkatan' => '2021',
            'status' => 'MENINGGAL',
            'jalur_masuk' => 'SBMPTN',
            'foto' => '',
            'kode_kota_kab' => '13',
            'nama_doswal' => 'Dr. Aris Puji Widodo, S.Si, M.T',
            'persetujuan' => 'Belum Disetujui',
        ]);
        Mahasiswa::updateOrCreate([
            'NIM' =>'24060121141000',
            'fakultas' =>'Sains dan Matematika',
            'nama' => 'Cukong Bagong', //hash untuk mengenkripsi
            'email' => 'Ukong@students.undip.ac.id',
            'alamat' => 'Jl Mawar',
            'no_HP' => '081210011201',
            'angkatan' => '2021',
            'status' => 'AKTIF',
            'jalur_masuk' => 'SBMPTN',
            'foto' => '',
            'kode_kota_kab' => '09',
            'nama_doswal' => 'Zenobia as Dosen',
            'persetujuan' => 'Belum Disetujui',
        ]);

        Mahasiswa::updateOrCreate([
            'NIM' =>'24060121141222',
            'fakultas' =>'Sains dan Matematika',
            'nama' => 'Doremi Lala', //hash untuk mengenkripsi
            'email' => 'Doremi@students.undip.ac.id',
            'alamat' => 'Jl Pelangi',
            'no_HP' => '08121008888',
            'angkatan' => '2021',
            'status' => 'AKTIF',
            'jalur_masuk' => 'SBMPTN',
            'foto' => '',
            'kode_kota_kab' => '09',
            'nama_doswal' => 'Zenobia as Dosen',
            'persetujuan' => 'Belum Disetujui',
        ]);
    }
}
