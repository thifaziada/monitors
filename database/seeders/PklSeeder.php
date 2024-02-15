<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Pkl;

class PklSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pkl::updateOrCreate([
            'id_pkl' => '33',
            'status_pkl' =>'Belum Lulus',
            'nilai_pkl' => '', //hash untuk mengenkripsi
            'berkas_PKL' => '',
            'id_mhs' =>'67',
            'NIM' => '24060121141000',
            'persetujuan' => 'Belum Disetujui',
        ]);
    }
}
