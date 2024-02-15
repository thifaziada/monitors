@extends('layout.main')

@section('content')
<div class="container mx-auto mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-8">
        <!-- First Card -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 10px;">
            <h2 class="text-xl font-semibold mb-4">Update IRS</h2>

           
        <form action="{{ route('updateIrs_dosenwali', ['idIrs' => $irsData->id_irs]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4 pt-10">
                
                <label for="smst_aktif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                <select id="smst_aktif" name="smst_aktif" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                @error('smst_aktif') border-red-500 @enderror">

                @error('smst_aktif')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror

                    <option value="{{ $irsData->smst_aktif }}" selected >{{ $irsData->smst_aktif }} </option>
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
                <label for="jumlah_sks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah SKS</label>
                <input type="number" id="jumlah_sks" name="jumlah_sks" value="{{ $irsData->jumlah_sks }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                @error('jumlah_sks') border-red-500 @enderror">

                @error('jumlah_sks')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">     
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="berkas_irs">Upload scan IRS</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                @error('berkas_irs') border-red-500 @enderror" aria-describedby="berkas_irs_help" id="berkas_irs" name = "berkas_irs" type="file">
                @if($irsData->berkas_irs)
                        <span class="text-sm text-gray-500 dark:text-gray-300">{{ $irsData->berkas_irs }}</span>
                    @endif
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="berkas_irs_help"></div>
                @error('berkas_irs')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror

            </div>
            <div class="flex">
                <div class="ml-auto mt-10 pt-10">
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">Update IRS</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection