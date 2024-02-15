<?php

namespace Database\Seeders;

use App\Models\User; // buat ambil moedl databasenya
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::updateOrCreate([
        //     'nama' =>'Zenobia as Dosen',
        //     'email' =>'ZenoDosen@zeno.com',
        //     'password' => Hash::make('123456'), //hash untuk mengenkripsi
        //     'role' => 'dosen',
        // ]);

        User::updateOrCreate([
            'nama' =>'Zenobia as Mahasiswa2',
            'email' =>'ZenoMahasiswa2@zeno.com',
            'password' => Hash::make('123456'), //hash untuk mengenkripsi
            'role' => 'mahasiswa',
        ]);
    }
}
