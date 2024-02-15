@extends('layout.main')

@section('content')
<div class="container mx-auto mb-4">
    <h1 class="text-2xl mb-4 pt-4">Status PKL Terbarumu, <span class="text-blue-500">{{ $mahasiswa->nama }}</span></h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-8">
        <!-- First Card -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 10px;">
            <h2 class="text-xl font-semibold mb-4">Masukkan Laporan PKLmu.</h2>

           
            <form action="{{ route('entryPkl_mahasiswa') }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                
                <div class="mb-4 pt-10">

                    
                    <label for="status_pkl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status PKL</label>
                    <select id="status_pkl" name="status_pkl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status_pkl') border-red-500 @enderror">
                        @error('status_pkl')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
    
                        
                        <option value="" disabled selected >--Pilih Status PKL--</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Belum Lulus">Belum Lulus</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    
                    <label for="nilai_pkl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai PKL</label>
                    <select id="nilai_pkl" name="nilai_pkl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nilai_pkl') border-red-500 @enderror">
                        @error('nilai_pkl')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
    
                        
                        <option value="" disabled selected >--Nilai PKL--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
    
                <div class="mb-4">     
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="berkas_PKL">Upload berkas PKL</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('berkas_PKL') border-red-500 @enderror" aria-describedby="berkas_PKL_help" id="berkas_PKL" name="berkas_PKL" type="file">
                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="berkas_PKL_help"></div>
                    @error('berkas_PKL')
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
                    <h1 class="font-bold text-center text-3xl text-gray-900 pt-10">PKL</h1>
                    <p class="text-center text-sm text-gray-400 font-medium">{{ $mahasiswa->nama }}</p>
                    <p class="text-center text-sm text-gray-400">{{ $mahasiswa->NIM }}</p>
                    <p>
                        <span>
                            
                        </span>
                    </p>
                    


                    <div class="my-5 px-6">
                        @if ($pkl->persetujuan == 'Sudah Disetujui')
                        <div class="w-full">
                            <h3 class="font-medium text-gray-900 text-left px-6">Detail</h3>
                            <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
                                <a href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        {{$pkl->status_pkl}}
                                        <span class="text-gray-500 text-xs">Status PKL </span>
                                </a>
    
                                <a href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        {{$pkl->nilai_pkl}}
                                        <span class="text-gray-500 text-xs">Nilai PKL </span>
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="p-2 bg-gradient-to-r from-red-500 to-red-700 text-white text-xs" style="border-radius: 10px;">
                            <h2 class="text-sm  text-center">Belum Disetujui</h2>
                            </div> 
                        @endif
                    </div>

                </div>
   
    </div>
</div>
    </div>
</div>
@endsection