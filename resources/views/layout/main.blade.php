<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<!-- 
  add this in your css

  @layer components {
    .sidebar{
      transition:all .4s ease-in-out;
    }
  }
-->
<div class="min-h-screen flex bg-blue-800">
    <div class="flex">
    <!-- Sidebar -->
    <div class="fixed sidebar min-h-screen w-[3.35rem] hover:w-56 overflow-hidden bg-blue-800 hover:bg-blue-800 hover:shadow-lg  z-10">
    <div class=" flex h-screen flex-col justify-between pt-2 pb-6">
      <div>
        <div class="w-max p-2.5">
          <img src="https://1.bp.blogspot.com/-tThKR0i2DdQ/XrO4fFiulNI/AAAAAAAAB_s/4_UY2xeR3SsE9_5MGBdvsQtBJgNxf9e_wCLcBGAsYHQ/s1600/Logo%2BUndip%2BUniversitas%2BDiponegoro.png" class="w-9" alt="">
        </div>
        <ul class="mt-6 space-y-2 tracking-wide">
          
          {{-- <li class="min-w-max">
            <a href="#" aria-label="dashboard" class="relative flex items-center space-x-4 rounded-full focus:bg-gradient-to-r from-gray-800 to-blue-800 px-4 py-3 text-white">
              <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-gray-400 dark:fill-white"></path>
                <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-gray-200 group-hover:text-yellow-300"></path>
                <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current group-hover:text-yellow-300"></path>
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Dashboard</span>
            </a>
          </li> --}}



          {{-- side bar operator --}}

          
          @can('view_sidebar_operator')
          <li class="min-w-max">
            <a href="{{ route('dashboard_operator')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-gray-400 dark:fill-white group-hover:text-yellow-500 group-focus:text-yellow-500""></path>
                <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-gray-200 group-hover:text-yellow-300 group-focus:text-yellow-300"></path>
                <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current group-hover:text-yellow-300 group-focus:text-yellow-300"></path>
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Halaman Utama</span>
            </a>
          </li>
          <li class="min-w-max">
            <a href="{{ route('generate.account')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Generate Akun</span>
            </a>
          </li>
          <li class="min-w-max">
            <a href="{{ route('listmahasiswa_operator')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Daftar Mahasiswa</span>
            </a>
          </li>
          @endcan

          {{-- sidebar dosenwali --}}


          {{-- sidebar dosenwali --}}
          @can('view_sidebar_dosenwali')
          <li class="min-w-max">
            <a href="{{ route('dosenwali.daftarMahasiswa')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Informasi Perwalian</span>
            </a>
          </li>
          <li class="min-w-max">
            <a href="{{ route('listperwalian_dosenwali')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">List Perwalian</span>
            </a>
          </li>
          <li class="min-w-max">
            <span class="text-gray-300 group-hover:font-medium group-focus:font-medium text-center">------------------<span class="group-hover:font-medium group-focus:font-medium text-center">Verifikasi</span>------------------</span>
          </li>
          <li class="min-w-max">
            <a href="{{ route('verifikasiIRS_dosenwali')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Verifikasi IRS</span>
            </a>
          </li>
          <li class="min-w-max">
            <a href="{{ route('verifikasiKHS_dosenwali')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Verifikasi KHS</span>
            </a>
          </li>
          <li class="min-w-max">
            <a href="{{ route('verifikasiPKL_dosenwali')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Verifikasi PKL</span>
            </a>
          </li>
          <li class="min-w-max">
            <a href="{{ route('verifikasiSkripsi_dosenwali')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Verifikasi Skripsi</span>
            </a>
          </li>
          <li class="min-w-max">
            <span class="text-gray-300 group-hover:font-medium group-focus:font-medium text-center">------------------<span class="group-hover:font-medium group-focus:font-medium text-center">Rekap</span>------------------</span>
          </li>
          <li class="min-w-max">
            <a href="#" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Rekap Skripsi</span>
            </a>
          </li>
          <li class="min-w-max">
            <a href="#" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Rekap PKL</span>
            </a>
          </li>
          @endcan

           {{-- sidebar departemen --}}



           @can('view_sidebar_departemen')
           <li class="min-w-max">
            <a href="{{ route('dashboard')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-gray-400 dark:fill-white group-hover:text-yellow-500 group-focus:text-yellow-500""></path>
                <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-gray-200 group-hover:text-yellow-300 group-focus:text-yellow-300"></path>
                <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current group-hover:text-yellow-300 group-focus:text-yellow-300"></path>
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Halaman Utama</span>
            </a>
          </li>
           <li class="min-w-max">
             <a href="{{ route('listmahasiswa_departemen')}} " class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                 <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                 <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
               </svg>
               <span class="group-hover:font-medium group-focus:font-medium">List Mahasiswa</span>
             </a>
           </li>
           <li class="min-w-max">
            <span class="text-gray-300 group-hover:font-medium group-focus:font-medium text-center">------------------<span class="group-hover:font-medium group-focus:font-medium text-center">Rekap</span>------------------</span>
          </li>
           <li class="min-w-max">
            <a href="{{ route('rekapmahasiswa_departemen')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Rekap Pkl</span>
            </a>
          </li>
          <

           @endcan


           {{-- Sidebar Mahasiswa --}}


           @can('view_sidebar_mahasiswa')
           <li class="min-w-max">
            <a href="{{ route('dashboard_mahasiswa')}}" class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white hover:bg-gradient-to-r from-gray-800 to-blue-800 focus:bg-gradient-to-r from-gray-800 to-blue-800 active:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-gray-400 dark:fill-white group-hover:text-yellow-500 group-focus:text-yellow-500"></path>
                <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-gray-200 group-hover:text-yellow-300 group-focus:text-yellow-300"></path>
                <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current group-hover:text-yellow-300 group-focus:text-yellow-300"></path>
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Halaman Utama</span>
            </a>
          </li>
           <li class="min-w-max">
             <a href="{{ route('detailIrs_mahasiswa')}} " class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white hover:bg-gradient-to-r from-gray-800 to-blue-800 focus:bg-gradient-to-r from-gray-800 to-blue-800 active:bg-gradient-to-r from-gray-800 to-blue-800">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                 <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                 <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
               </svg>
               <span class="group-hover:font-medium group-focus:font-medium">Detail Irs</span>
             </a>
           </li>
           <li class="min-w-max">
            <a href="{{ route('detailKhs_mahasiswa')}} " class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-white hover:bg-gradient-to-r from-gray-800 to-blue-800 focus:bg-gradient-to-r from-gray-800 to-blue-800 active:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-300 group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                <path class="fill-current text-white group-hover:text-yellow-400  group-focus:text-yellow-400" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Detail Khs</span>
            </a>
          </li>
       
           @endcan


{{-- 
          <li class="min-w-max">
            <a href="#" class="group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-white group-hover:text-yellow-300 group-focus:text-yellow-300" fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                <path class="fill-current text-gray-300 group-hover:text-yellow-400 group-focus:text-yellow-400" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
              </svg>
              <span class="group-hover:font-medium group-focus:font-medium">Reports</span>
            </a>
          </li>
          <li class="min-w-max">
            <a href="#" class="group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-white group-hover:text-yellow-300 group-focus:text-yellow-300" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                <path class="fill-current text-gray-300 group-hover:text-yellow-400 group-focus:text-yellow-400" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
              </svg>
              <span class="group-hover:font-meidum group-focus:font-meidum">Other data</span>
            </a>
          </li> --}}
       
        </ul>
      </div>
      <div class="w-max -mb-3">
        <a href="#" class="group flex items-center space-x-4 rounded-full px-4 py-3 text-white focus:bg-gradient-to-r from-gray-800 to-blue-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:fill-yellow-600" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
          </svg>
          <span class="group-hover:font-medium">Settings</span>
        </a>
      </div>
    </div>
    </div>
    <!-- Navbar -->
    
    </div>
    <div class="min-h-screen flex bg-gray-100">
    <div class="flex flex-col max-h-screen">
      <!-- Top Navigation Bar -->
      <div class="bg-gradient-to-r from-gray-800 to-blue-800  text-white p-4 w-screen">
        <!-- Navigation content (e.g., logo and menu items) -->
        <div class="container mx-auto flex justify-between items-center">
          <div class="text-2xl font-bold ml-auto mr-4">👋 {{ auth()->user()->nama }}</div>
          <nav>
            <div class="relative inline-block text-left">
              <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

              


                {{-- button untuk mahasiswa --}}
              
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                  <span class="sr-only">Open user menu</span>
                  @can('view_sidebar_mahasiswa')
                  <img class="w-10 h-10 rounded-full" src="{{ asset('fotoProfil/'.$mahasiswa->foto) }}" alt="user photo">
                  @endcan
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                  <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->nama }}</span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }} </span>
                  </div>
                  <ul class="py-2" aria-labelledby="user-menu-button">
                   
                    <li>
                      <a href="{{ route('tampilProfil_mahasiswa')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Atur Profil</a>
                    </li>
                    <li>
                      <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-600 dark:hover:text-red" method="get">Keluar</a>
                    </li>
                  </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                  </svg>
              </button>
            </div>
          </div>
          </nav>
        </div>
      </div>
    @yield('content')
</div>



  
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($message = Session::get('failed'))
  <script>
    Swal.fire({
        icon: 'error',
        title: 'Waduh!',
        text: '{{ $message }}',
    })
  </script>
@elseif($message = Session::get('success'))
  <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil Tersubmit!',
        text: '{{ $message }}',
    })
  </script>

  <script>
    function toggleCard() {
        var toggleContainer = document.getElementById("toggleContainer");

        // Toggle the visibility of the container
        if (toggleContainer.style.display === "none") {
            toggleContainer.style.display = "block";
        } else {
            toggleContainer.style.display = "none";
        }
    }
</script>
@endif
</body>
</html>