@extends('layout.main') 
@section('content')

<div class="flex-1 min-h-screen p-4">
    <!-- Content -->
    <div class="container mx-auto">
        <h1 class="text-2xl mb-4">Status mahasiswa secara keseluruhan</h1>
        <!-- Dashboard Content -->
        {{-- <h1 class="text-2xl font-bold mb-4">Welcome, Operator123!</h1> --}}
        @can('view_dashboard')
        <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 ">
            <div class="container">
            <div class="bg-white p-4" style="border-radius: 10px;">

                <!-- Content for the first section goes here -->
             <div class="w-full lg:w-4/12 px-4 mx-auto">
  
    <div class="px-6">
      <div class="flex flex-wrap justify-center">
        <div class="w-full px-4 flex justify-center">
          <div class="relative">
            <img alt="..." src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
          </div>
        </div>
      </div>
      {{-- <div class="text-center mt-12">
        <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
          Jenna Stones
        </h3>
        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
          <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
          Los Angeles, California
        </div>
      
      </div> --}}
     
    </div>

</div>
            </div>
            </div>

        <div class="grid grid-rows-3 md:grid-rows-3 lg:grid-rows-3 gap-4">
            
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
                        <div class="p-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white text-center" style="border-radius: 10px;">
                            MAHASISWA AKTIF
                         </div>
                         <div class="text-4xl text-gray-700 text-center pt-2">
                        <p>{{ $mahasiswaStatusAktif->count()}}</p>
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
                        <div class="p-2 bg-gradient-to-r from-purple-500 to-purple-700 text-white text-center" style="border-radius: 10px;">
                            MAHASISWA CUTI
                         </div>
                         <div class="text-4xl text-gray-700 text-center pt-2">
                            <h2>{{ $mahasiswaStatusCuti->count()}}</h2>
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
                        <div class="p-2 bg-gradient-to-r from-red-500 to-red-700 text-white text-center" style="border-radius: 10px;">
                            MAHASISWA TIDAK AKTIF
                         </div>
                         <div class="text-4xl text-gray-700 text-center pt-2">
                        <h1>{{ $mahasiswaStatusTidakAktif->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        </div>
        @endcan
        <div class="container mx-auto p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                <div class="card-body bg-white p-4 rounded-lg shadow">
                    {!! $mahasiswaPklChart->container() !!}
                </div>
                <div class="card-body bg-white p-4 rounded-lg shadow">
                    {!! $mahasiswaSkripsiChart->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ $mahasiswaPklChart->cdn() }}"></script>
{{ $mahasiswaPklChart->script() }}
<script src="{{ $mahasiswaSkripsiChart->cdn() }}"></script>
{{ $mahasiswaSkripsiChart->script() }}

@endsection
