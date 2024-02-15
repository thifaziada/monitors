<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js">
    @extends('layout.main')
    
    
    @section('content')
    <div class="container mx-auto mb-4">
        <h1 class="text-2xl mb-4 pt-4">Status Skripsi Terbarumu, <span class="text-blue-500">{{ $mahasiswa->nama }}</span></h1>
    
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-8">
            <!-- First Card -->
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 10px;">
                <h2 class="text-xl font-semibold mb-4">Masukkan Laporan Skripsimu.</h2>
    
               
                <form action="{{ route('entrySkripsi_mahasiswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    
                    <div class="mb-4 pt-10">
                        
                        <label for="status_skripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Skripsi</label>
                        <select id="status_skripsi" name="status_skripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status_skripsi') border-red-500 @enderror">
                            @error('status_skripsi')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
        
                            
                            <option value="" disabled selected >--Pilih Status skripsi--</option>
                            <option value="Belum Ambil">Belum Ambil</option>
                            <option value="Sudah Ambil">Sudah Ambil</option>
                        </select>
                    </div>
        
                    <div class="mb-4">
                        
                        <label for="nilai_skripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Skripsi</label>
                        <select id="nilai_skripsi" name="nilai_skripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nilai_skripsi') border-red-500 @enderror">
                            @error('nilai_skripsi')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
        
                            
                            <option value="" disabled selected >--Nilai skripsi--</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
        
        
                    <div class="mb-4">
                        <label for="lama_studi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lama Studi (tahun)</label>
                        <select id="lama_studi" name="lama_studi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('lama_studi') border-red-500 @enderror">
                            @error('lama_studi')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
        
                            
                            <option value="" disabled selected >Lama Studi</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
        
                    {{-- <div class="mb-4">
                        <label for="lama_studi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Sidang</label>
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker datepicker-format="yy/mm/" id="card-expiration-input" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12/23" required>
                    </div> --}}
    
                    
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" id="tanggal_sidang" name="tanggal_sidang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                    </div>
      
        
                    <script src="../path/to/flowbite/dist/datepicker.js"></script>
                    
                    <div class="mb-4">     
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="berkas_skripsi">Upload berkas Skripsi</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('berkas_skripsi') border-red-500 @enderror" aria-describedby="berkas_skripsi_help" id="berkas_skripsi" name="berkas_skripsi" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="berkas_skripsi_help"></div>
                        @error('berkas_skripsi')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
    
        
                    <div class="flex">
                        <div class="ml-auto mt-10 pt-10">
                            <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Laporan</button>
                        </div>
                        </div>
                </form>
            </div>
    
            <!-- Second Card -->
            <div class=" shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 10px;">
                <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto">
                   
                    
                    <div class="mt-16">
                        <h1 class="font-bold text-center text-3xl text-gray-900 pt-10">Skripsi</h1>
                        <p class="text-center text-sm text-gray-400 font-medium">{{ $mahasiswa->nama }}</p>
                        <p class="text-center text-sm text-gray-400">{{ $mahasiswa->NIM }}</p>
                        <p>
                            <span>
                                
                            </span>
                        </p>
                        
    
    
                        <div class="my-5 px-6">
                            @if ($skripsi->persetujuan == 'Sudah Disetujui')
                                <div class="text-gray-200 block rounded-lg text-center font-medium leading-6 px-6 py-3 bg-gray-900 hover:bg-black hover:text-white">Connect with <span class="font-bold">@pantazisoft</span></div>
                            @else
                            <div class="p-2 bg-gradient-to-r from-red-500 to-red-700 text-white text-xs" style="border-radius: 10px;">
                                <h2 class="text-sm  text-center">Belum Disetujui</h2>
                                </div> 
                            @endif
                        </div>
    
                        <div class="w-full">
                            <h3 class="font-medium text-gray-900 text-left px-6">Detail</h3>
                            <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
                                <a href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        {{$skripsi->status_skripsi}}
                                        <span class="text-gray-500 text-xs">Adalah Status Skrpisi saat ini.</span>
                                </a>
    
                                <a href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        {{$skripsi->nilai_skripsi}}
                                        <span class="text-gray-500 text-xs">Adalah Nilai Skripsi saat ini.</span>
                                </a>
                                <a href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        {{$skripsi->lama_studi}}
                                        <span class="text-gray-500 text-xs">Lama Studi</span>
                                </a>
                                <a href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        {{$skripsi->tanggal_sidang}}
                                        <span class="text-gray-500 text-xs">Tanggal Sidang.</span>
                                </a>      
                            </div>
                        </div>
                    </div>
       
        </div>
    </div>
        </div>
    </div>
    @endsection