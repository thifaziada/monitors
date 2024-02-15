<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void //abis membuat ini jangan lupa assign permissionnya ke role
    {   
        $role_departemen = Role::updateOrCreate(
            ['name' => 'departemen'],
            ['name' => 'departemen']
        );

        $role_mahasiswa = Role::updateOrCreate(
            ['name' => 'mahasiswa'],
            ['name' => 'mahasiswa']
        );
        
        $role_operator = Role::updateOrCreate(
            ['name' => 'operator'],
            ['name' => 'operator']
        );

        $role_dosenwali = Role::updateOrCreate(
            ['name' => 'dosenwali'],
            ['name' => 'dosenwali']
        );

        $permission = Permission::updateOrCreate(
            ['name' => 'view_dashboard'],
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            ['name' => 'view_chart_on_dashboard'],
            ['name' => 'view_chart_on_dashboard']
        );

        $permission1_sidebar_operator = Permission::updateOrCreate(
            ['name' => 'view_sidebar_operator'],
            ['name' => 'view_sidebar_operator']
        );

        $permission1_sidebar_dosenwali = Permission::updateOrCreate(
            ['name' => 'view_sidebar_dosenwali'],
            ['name' => 'view_sidebar_dosenwali']
        );

        $permission1_sidebar_departemen = Permission::updateOrCreate(
            ['name' => 'view_sidebar_departemen'],
            ['name' => 'view_sidebar_departemen']
        );

        $permission1_sidebar_departemen = Permission::updateOrCreate(
            ['name' => 'view_sidebar_departemen'],
            ['name' => 'view_sidebar_departemen']
        );

        $permission1_sidebar_mahasiswa = Permission::updateOrCreate(
            ['name' => 'view_sidebar_mahasiswa'],
            ['name' => 'view_sidebar_mahasiswa']
        );



        // $role_departemen->givePermissionTo($permission);
        // $role_dosenwali->givePermissionTo($permission2);
        // $role_departemen->givePermissionTo($permission1_sidebar_departemen);
        $role_mahasiswa->givePermissionTo($permission1_sidebar_mahasiswa);

        $user = User::find(37); //mencari user dengan id 13

        $user->assignRole('mahasiswa'); //assign role dosenwali ke users dengan id 13
    }
}
