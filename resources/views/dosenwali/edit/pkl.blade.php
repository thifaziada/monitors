@extends('layout.main')

@section('content')
<div class="container mx-auto mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-8">
        <!-- First Card -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 10px;">
            <h2 class="text-xl font-semibold mb-4">Update PKL</h2>
           
            <form action="{{ route('updatePkl_dosenwali', ['idPkl' => $pklData->id_pkl]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="mb-4 pt-10">
                    <label for="status_pkl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status PKL</label>
                    <select id="status_pkl" name="status_pkl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status_pkl') border-red-500 @enderror">
                        @error('status_pkl')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
    
                        <option value="{{ $pklData->status_pkl }}" selected >{{ $pklData->status_pkl }}-</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Belum Lulus">Belum Lulusl</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    
                    <label for="nilai_pkl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai PKL</label>
                    <select id="nilai_pkl" name="nilai_pkl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nilai_pkl') border-red-500 @enderror">
                        @error('nilai_pkl')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
    
                        <option value="{{ $pklData->nilai_pkl }}" disabled selected >{{ $pklData->nilai_pkl }}</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
    
                <div class="mb-4">     
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="berkas_PKL">Upload berkas PKL</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('berkas_PKL') border-red-500 @enderror" aria-describedby="berkas_PKL_help" id="berkas_PKL" name="berkas_PKL" type="file">
                    @if($pklData->berkas_PKL)
                        <span class="text-sm text-gray-500 dark:text-gray-300">{{ $pklData->berkas_PKL }}</span>
                    @endif
                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="berkas_PKL_help"></div>
                    @error('berkas_PKL')
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