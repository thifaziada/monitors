@extends('layout.main')
@section('content')

<div class="bg-gray-100 overflow-y:auto flex-1 min-h-screen p-4">  
  <!-- Content -->
  <div class="container mx-auto mb-4">

      <!-- Dashboard Content -->
      <h1 class="text-2xl mb-4">Yuk Cek Progress Studimu, <span class="text-blue-500">{{ $mahasiswa->nama }}</span></h1>
      
        {{-- Profile in dashboard --}}
        <div class="p-0">
            <div class="p-8 bg-white shadow mt-24" style="border-radius: 10px;">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                <div>
                    @if ($mahasiswa->status == 'AKTIF')
                    <div class="p-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white" style="border-radius: 10px;">
                        AKTIF
                    </div>
                    @elseif ($mahasiswa->status == 'CUTI')
                    <div class="p-2 bg-gradient-to-r from-purple-500 to-purple-700 text-white" style="border-radius: 10px;">
                        CUTI
                    </div>
                    @else
                    <div class="p-2 bg-gradient-to-r from-red-500 to-red-700 text-white" style="border-radius: 10px;">
                        TIDAK AKTIF
                    </div>
                    @endif
                </div>
                <div class="ml-4">
                    <p class="text-gray-400">Dosen Wali</p>
                    <p class=" text-blue-500"> {{ $mahasiswa->nama_doswal }} </p>
                </div>
            
                </div>
                <div class="relative">
                <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                <img class="w-48 h-48 object-cover rounded-full" src="{{ asset('fotoProfil/'.$mahasiswa->foto) }}" alt="user photo">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg> --}}
                </div>
                </div>
            
                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">

                </div>
            </div>
            
            <div class="mt-20 text-center border-b pb-12">
                <h1 class="text-4xl font-medium text-gray-700">{{ $mahasiswa->nama }}</h1>
                <p class="text-2xl font-light text-gray-600 mt-3 mb-4">{{ $mahasiswa->NIM }} | {{ ucfirst($mahasiswa->email) }} </p>
                <hr />
                <p class="font-bold text-gray-600 mt-3">{{ $mahasiswa->angkatan }}</p>
                <p class="font-light text-gray-600 mt-3">{{ $mahasiswa->jalur_masuk }}</p>
                <p class="font-light text-gray-600 mt-3">{{ $mahasiswa->alamat }}</p>
            </div>
            
            
            </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 pt-4">
        <!-- Card 1 -->
        @if($irsNull)
        <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
            <div class="grid grid-cols-2  bg-gray-200 p-4 rounded-lg shadow ">
                <div class="ml-4 mt-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="gray" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                    </svg>
                </div>
                <div class="grid grid-rows-1">
                    <div>
                        <div>
                        <h2 class="text-2xl font-semibold text-gray-500">Detail IRS</h2>
                        </div>
                        <div class="text-gray-500 mt-1 mb-20">
                            <p>Anda belum mengisi</p>
                        </div>
                    </div>
                </div>
                {{-- status --}}
 
            </div>
        </div>
        @else
            <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
            <a href="{{route('detailIrs_mahasiswa')}}" class="block">
            <div class="grid grid-cols-2  bg-white hover:bg-gray-200 to-white p-4 rounded-lg shadow">
                <div class="ml-4 mt-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                    </svg>
                </div>
                <div class="grid grid-rows-1">
                    <div>
                        <div>
                        <h2 class="text-2xl font-semibold">Detail IRS</h2>
                        </div>
                            <div class="">
                                <p>Semester   :{{ $irs->smst_aktif }}</p>
                                <p>Jumlah SKS :{{ $irs->jumlah_sks }}</p>
                            </div>
                    </div>
                </div>
            
                {{-- status --}}
                <div class="grid grid-rows-1">
                    <div>
                        <div class="text-center">
                            @if ($irs->persetujuan == 'Belum Disetujui')
                                <div class="p-2 bg-gradient-to-r from-red-500 to-red-700 text-white text-xs" style="border-radius: 10px;">
                                    <h2 class="text-sm  text-center">Belum Disetujui</h2>
                                </div> 
                            @else
                                <div class="p-2 bg-gradient-to-r from-green-500 to-green-700 text-white text-xs" style="border-radius: 10px;">
                                    <h2 class="text-sm text-center">Sudah Disetujui</h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>
        @endif
         <!-- Card 2 -->
        @if($khsNull)
        <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
            <div class="grid grid-cols-2  bg-gray-200 p-4 rounded-lg shadow ">
                <div class="ml-4 mt-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="gray" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                    </svg>
                </div>
                <div class="grid grid-rows-1">
                    <div>
                        <div>
                        <h2 class="text-2xl font-semibold text-gray-500">Detail KHS</h2>
                        </div>
                        <div class="text-gray-500 mt-1 mb-20">
                            <p>Anda belum mengisi</p>
                        </div>
                    </div>
                </div>
                {{-- status --}}
 
            </div>
        </div>
        @else
            <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
            <a href="{{ route('detailKhs_mahasiswa') }}" class="block">
            <div class="grid grid-cols-2  bg-white hover:bg-gray-200 p-4 rounded-lg shadow">
                <div class="ml-4 mt-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                    </svg>
                </div>
                <div class="grid grid-rows-1">
                    <div>
                        <div>
                        <h2 class="text-2xl font-semibold">Detail KHS</h2>
                        </div>
                            <div class="">
                                <p>IP Semester: {{ $khs->IP_smt }}</p>
                                <p>IP Kumulatif: {{ $khs->IP_kumulatif }}</p>
                            </div>
                    </div>
                </div>
                        {{-- status --}}
                        <div class="grid grid-rows-1">
                            <div>
                                <div class="text-center">
                                    @if ($khs->persetujuan == 'Belum Disetujui')
                                        <div class="p-2 bg-gradient-to-r from-red-500 to-red-700 text-white text-xs" style="border-radius: 10px;">
                                            <h2 class="text-sm  text-center">Belum Disetujui</h2>
                                        </div> 
                                    @else
                                        <div class="p-2 bg-gradient-to-r from-green-500 to-green-700 text-white text-xs" style="border-radius: 10px;">
                                            <h2 class="text-sm text-center">Sudah Disetujui</h2>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
        @endif

        <!-- Card 3 -->
        @if($pklNull)
        <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
            <div class="grid grid-cols-2  bg-gray-200 p-4 rounded-lg shadow ">
                <div class="ml-4 mt-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="gray" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                    </svg>
                </div>
                <div class="grid grid-rows-1">
                    <div>
                        <div>
                        <h2 class="text-2xl font-semibold text-gray-500">Detail PKL</h2>
                        </div>
                        <div class="text-gray-500 mt-1 mb-20">
                            <p>Anda belum mengisi</p>
                        </div>
                    </div>
                </div>
                {{-- status --}}
 
            </div>
        </div>
        @elseif (!$irsNull && $irs->smst_aktif >= 6)
            <a href="{{route('detailPkl_mahasiswa')}}" class="block">
                <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
                    <div class="grid grid-cols-2  bg-white p-4 rounded-lg shadow hover:bg-gray-200">
                        <div class="ml-4 mt-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                            </svg>
                        </div>
                        <div class="grid grid-rows-1">
                            <div>
                                <div>
                                <h2 class="text-2xl font-semibold">Detail PKL</h2>
                                </div>
                                <div class="">
                                    <p>Status PKL  :{{ $pkl->status_pkl }}</p>
                                    <p>Nilai pkl   :{{ $pkl->nilai_pkl }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- status --}}
                        <div class="grid grid-rows-1">
                            <div>
                                <div class="text-center">
                                    @if ($pkl->persetujuan == 'Belum Disetujui')
                                        <div class="p-2 bg-gradient-to-r from-red-500 to-red-700 text-white text-xs" style="border-radius: 10px;">
                                            <h2 class="text-sm  text-center">Belum Disetujui</h2>
                                        </div> 
                                    @else
                                        <div class="p-2 bg-gradient-to-r from-green-500 to-green-700 text-white text-xs" style="border-radius: 10px;">
                                            <h2 class="text-sm text-center">Sudah Disetujui</h2>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            
        @else
            <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
                <div class="grid grid-cols-2  bg-gray-200 p-4 rounded-lg shadow ">
                    <div class="ml-4 mt-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="gray" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                        </svg>
                    </div>
                    <div class="grid grid-rows-1">
                        <div>
                            <div>
                            <h2 class="text-2xl font-semibold text-gray-500">Detail PKL</h2>
                            </div>
                            <div class="text-gray-500 mt-1 mb-20">
                                <p>--</p>
                            </div>
                        </div>
                    </div>
                    {{-- status --}}
     
                </div>
            </div>
            
        @endif
       
       
        <!-- Card 3 -->
        @if($skripsiNull)
        <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
            <div class="grid grid-cols-2  bg-gray-200 p-4 rounded-lg shadow ">
                <div class="ml-4 mt-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="gray" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                    </svg>
                </div>
                <div class="grid grid-rows-1">
                    <div>
                        <div>
                        <h2 class="text-2xl font-semibold text-gray-500">Detail Skripsi</h2>
                        </div>
                        <div class="text-gray-500 mt-1 mb-20">
                            <p>Anda belum mengisi</p>
                        </div>
                    </div>
                </div>
                {{-- status --}}
 
            </div>
        </div>
        @elseif (!$irsNull && $irs->smst_aktif >= 7)
            <a href="{{route('detailSkripsi_mahasiswa')}}" class="block">
                <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
                    <div class="grid grid-cols-2  bg-white p-4 rounded-lg shadow hover:bg-gray-200">
                        <div class="ml-4 mt-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                            </svg>
                        </div>
                        <div class="grid grid-rows-1">
                            <div>
                                <div>
                                <h2 class="text-2xl font-semibold">Detail Skripsi</h2>
                                </div>
                                <div class="">
                                    <p>Nilai skripsi   :{{ $skripsi->nilai_skripsi }}</p>
                                    <p>Tanggal Sidang   :{{ $skripsi->tanggal_sidang }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- status --}}
                        <div class="grid grid-rows-1">
                            <div>
                                <div class="text-center">
                                    @if ($skripsi->persetujuan == 'Belum Disetujui')
                                        <div class="p-2 bg-gradient-to-r from-red-500 to-red-700 text-white text-xs" style="border-radius: 10px;">
                                            <h2 class="text-sm  text-center">Belum Disetujui</h2>
                                        </div> 
                                    @else
                                        <div class="p-2 bg-gradient-to-r from-green-500 to-green-700 text-white text-xs" style="border-radius: 10px;">
                                            <h2 class="text-sm text-center">Sudah Disetujui</h2>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        @else
            <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
                <div class="grid grid-cols-2  bg-gray-200 p-4 rounded-lg shadow ">
                    <div class="ml-4 mt-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="gray" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                        </svg>
                    </div>
                    <div class="grid grid-rows-1">
                        <div>
                            <div>
                            <h2 class="text-2xl font-semibold text-gray-500">Detail Skripsi</h2>
                            </div>
                            <div class="text-gray-500 mt-1 mb-20">
                                <p>--</p>
                            </div>
                        </div>
                    </div>
                    {{-- status --}}
     
                </div>
            </div>
        </div>
  
  </div>
            
        @endif
    
       

</div>
<div class="flex flex-wrap text-center">
    @if ($irsNull && $khsNull)
        <a href="{{ route('detailsemestermhs_departemen', ['id_mhs' => $mahasiswa->id_mhs]) }}">
            <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">1</div>
        </a>
    @else
        <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">1</div>
    @endif
    

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">2</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 2)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">2</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">2</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">3</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 3)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">3</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">3</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">4</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 4)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">4</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">4</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">5</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 5)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">5</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">5</div>
    @endif

    @if ($irsNull && $khsNull && $pklNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">6</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 6)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">6</div>
    @elseif (!is_null($pkl) && $pkl->status_pkl == 'Lulus')
        <div class="card bg-gradient-to-r from-green-500 to-green-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">6</div>
    @elseif (!is_null($pkl) && $pkl->status_pkl == 'Belum Lulus')
        <div class="card bg-gradient-to-r from-purple-500 to-purple-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">6</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">6</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">7</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 7)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">7</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">7</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">8</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 8)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">8</div>
    @elseif (!is_null($skripsi) && $skripsi->status_skripsi == 'Lulus')
        <div class="card bg-gradient-to-r from-green-500 to-green-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">8</div>
    @elseif (!is_null($skripsi) && $skripsi->status_skripsi == 'Belum Lulus')
        <div class="card bg-gradient-to-r from-purple-500 to-purple-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">8</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">7</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">9</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 9)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">9</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">9</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">10</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 10)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">10</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">10</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">11</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 11)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">11</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">11</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">12</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 12)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">12</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">12</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">13</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 13)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">13</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">13</div>
    @endif

    @if ($irsNull && $khsNull)
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">14</div>
    @elseif (!is_null($irs) && $irs->smst_aktif == 14)
        <div class="card bg-gradient-to-r from-blue-500 to-blue-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">14</div>
    @else
    <div class="card bg-gradient-to-r from-red-500 to-red-700 p-4 m-2 flex-1 text-white" style="border-radius: 10px;">14</div>
    @endif



    {{-- -------------- --}}

    <!-- First Row -->

</div>
@endsection