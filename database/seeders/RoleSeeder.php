<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'departemen']);
        Role::create(['name' => 'mahasiswa']);
        Role::create(['name' => 'operator']);
        Role::create(['name' => 'dosenwali']);

        //biar gak dobel bisa pakai 
        // Role::updateOrCreate(
        //     ['name' => 'departemen'],
        //     ['name' => 'departemen']
        // );
    }
}
