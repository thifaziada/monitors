@extends('layout.main')

@section('content')
<div class="container mx-auto mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-8">
        <!-- First Card -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 10px;">
            <h2 class="text-xl font-semibold mb-4">Update Skripsi</h2>

           
            <form  action="{{ route('updateSkripsi_dosenwali', ['idSkripsi' => $skripsiData->id_skripsi]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4 pt-10">
                    
                    <label for="status_skripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Skripsi</label>
                    <select id="status_skripsi" name="status_skripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status_skripsi') border-red-500 @enderror">
                        @error('status_skripsi')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
    
                        
                        <option value="{{ $skripsiData->status_skripsi }}" selected >{{ $skripsiData->status_skripsi }}</option>
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
    
                        
                        <option value="{{ $skripsiData->nilai_skripsi }}" selected >{{ $skripsiData->nilai_skripsi }}</option>
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
    
                        
                        <option value="{{ $skripsiData->lama_studi }}" selected >{{ $skripsiData->lama_studi }}</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="lama_studi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Sidang</label>
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input value="{{ $skripsiData->tanggal_sidang }}" datepicker datepicker-format="yy/mm/" id="card-expiration-input" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12/23" required>
                </div>
    
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
                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan IRS</button>
                    </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection