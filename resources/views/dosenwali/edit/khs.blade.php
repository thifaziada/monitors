@extends('layout.main')

@section('content')
<div class="container mx-auto mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-8">
        <!-- First Card -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 10px;">
            <h2 class="text-xl font-semibold mb-4">KHS</h2>

            <form action="{{ route('updateKhs_dosenwali', ['idKhs' => $khsData->id_khs]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4 pt-10">
                    
                    <label for="smt_aktif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                    <select id="smt_aktif" name="smt_aktif" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('smt_aktif') border-red-500 @enderror">
                        @error('smt_aktif')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
    
                        
                        <option value="{{ $khsData->smt_aktif }}" selected >{{ $khsData->smt_aktif }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                    </select>
                </div>
    
                <div class="mb-6">
                    <label for="SKS_semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah SKS</label>
                    <input type="number" id="SKS_semester" name="SKS_semester" value="{{ $khsData->SKS_semester }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                    @error('SKS_semester') border-red-500 @enderror">
    
                    @error('SKS_semester')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="IP_smt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IP Semester</label>
                    <input type="number" step="0.01" id="IP_smt" name="IP_smt" value="{{ $khsData->IP_smt }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500                @error('IP_smt') border-red-500 @enderror">
    
                    @error('IP_smt')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-4">     
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="berkas_KHS">Upload scan KHS</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('berkas_KHS') border-red-500 @enderror" aria-describedby="berkas_KHS_help" id="berkas_KHS" name="berkas_KHS" type="file">
                    @if($khsData->berkas_KHS)
                        <span class="text-sm text-gray-500 dark:text-gray-300">{{ $khsData->berkas_KHS }}</span>
                    @endif
                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="berkas_KHS_help"></div>
                    @error('berkas_KHS')
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