@extends('layout.main')
@section('content')



<div class="flex-1 min-h-screen p-4">  
  <!-- Content -->

  <div class="container mx-auto p-2"> <!-- Added p-4 for padding -->
    

    <div class="container mx-auto">
      <h1 class="font-bold text-xl mb-4">List Mahasiswa Keseluruhan</h1>
    </div>
    <div class=" w-full items-center"> <!-- Use flex container to align content in the same line -->
     
      <div> <!-- Add more additional content as needed -->
        
          <!-- Your second additional content here -->
      </div>
        
    </div>
    <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
        



        {{-- Search bar --}}



        <form action="{{ route('carimahasiswa_departemen')}}" method="GET"> 

                <div class="relative w-full">
                    <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Cari Mahasiswa Berdasarkan NIM / Nama..." value="{{ request('search') }}"  required>
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>




        {{-- Mahasiswa Table --}}



        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-4"> <!-- Added p-4 for padding -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fakultas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Angkatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jalur Masuk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
                <div class="m-2">
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($mahasiswaData as $mhs)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$no++}}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$mhs->NIM}}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$mhs->fakultas}}
                    </td>
                    <td class="px-6 py-4">
                        {{$mhs->nama}}
                    </td>
                    <td class="px-6 py-4">
                        {{$mhs->angkatan}}
                    </td>
                    <td class="px-6 py-4">
                        {{$mhs->status}}
                    </td>
                    <td class="px-6 py-4">
                        {{$mhs->jalur_masuk}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center">
                            <a href="{{route('departemen.detailmahasiswa',['id_mhs'=>$mhs->id_mhs])}}" class="bg-gradient-to-r from-purple-500 to-purple-700 text-white px-4 py-2 rounded hover:from-blue-700 hover:to-blue-900 mr-2">Detail</a>
                           
                        </div> 
                    </td>
                </tr>
              
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

</div>
@endsection








            {{-- <div class="flex pl-4 pr-4 pb-2">
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                <button id="search-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">Semua Semester <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg></button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">1</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">3</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">4</button>
                    </li>
                    </ul>
                </div> --}}
