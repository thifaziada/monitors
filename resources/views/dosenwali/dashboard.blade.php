@extends('layout.main')
@section('content')



<div class="flex-1 min-h-screen p-4">  
  <!-- Content -->
  <div class="container mx-auto mb-4">
      <!-- Dashboard Content -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Card 1 -->
        <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
        <div class="grid grid-cols-2  bg-white p-4 rounded-lg shadow">
            <div class="ml-4 mt-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                </svg>
            </div>
            <div class="grid grid-rows-1">
                <div>
                    <div>
                    <h2 class="text-2xl font-semibold">Mahasiswa Perwalian</h2>
                    </div>
                    <div class="text-4xl">
                    <p>{{ $jumlahMahasiswa ->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Card 2 -->
        <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
        <div class="grid grid-cols-2  bg-white p-4 rounded-lg shadow">
            <div class="ml-4 mt-4 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-moon-fill" viewBox="0 0 16 16">
                    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                  </svg>
            </div>
            <div class="grid grid-rows-1">
                <div>
                    <div>
                        <h2 class="text-2xl font-semibold">Mahasiswa Belum Disetujui</h2>
                    </div>
                    <div class="text-4xl text-red-500">
                        <h2>{{ $mahasiswaBelumDisetujui->count() }}</h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Card 3 -->
        <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
        <div class="grid grid-cols-2  bg-white p-4 rounded-lg shadow">
            <div class="ml-4 mt-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg>
            </div>
            <div class="grid grid-rows-1">
                <div>
                    <div>
                        <h2 class="text-2xl font-semibold">Mahasiswa Sudah Disetujui</h2>
                    </div>
                    <div class="text-4xl text-green-500">
                    <h1>{{ $mahasiswaDisetujui->count() }}</h1>
                    </div>
                </div>
            </div>
          
        </div>
            
        </div>
    </div>
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            <div class="card-body bg-white p-4 rounded-lg shadow">
                {!! $perwalianPklChart->container() !!}
            </div>
            <div class="card-body bg-white p-4 rounded-lg shadow">
                {{-- {!! $mahasiswaSkripsiChart->container() !!} --}}
            </div>
        </div>
    </div>
  </div>
  <div class="container mx-auto p-4 bg-gray-200"> <!-- Added p-4 for padding -->
    

    <div class="container mx-auto">
      {{-- <h1 class="font-bold text-xl mb-4">Generate new student account</h1> --}}
    </div>
   
    {{-- <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-4"> <!-- Added p-4 for padding -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                </tr>
                <div class="m-2">
            </thead>
            @foreach ($data as $d)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$loop->iteration}}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$d->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$d->email}}
                    </td>
                </tr>
              
                @endforeach
            </tbody>
        </table> --}}
    </div>
</div>
</div>

</div>
<script src="{{ $perwalianPklChart->cdn() }}"></script>
{{ $perwalianPklChart->script() }}
@endsection