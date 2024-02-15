@extends('layout.main')
@section('content')

<div class="container mx-auto py-8">
    <div class="grid grid-cols-1 gap-6">
        <div class="bg-white rounded shadow p-8">
            <h1 class="text-2xl font-bold mb-6 text-justify text-grey-700">Generate Akun</h1>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="/operator/generate_account" class="text-left" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-input mt-1 block w-full border-2 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for "nim" class="block text-sm font-medium text-gray-700">NIM:</label>
                    <input type="text" name="nim" id="nim" class="form-input mt-1 block w-full border-2 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="angkatan" class="block text-sm font-medium text-gray-700">Angkatan:</label>
                    <input type="text" name "angkatan" id="angkatan" class="form-input mt-1 block w-full border-2 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="nama_dosen" class="block text-sm font-medium text-gray-700">Dosen Wali:</label>
                    <input type="text" name "nama_dosen" id="nama_dosen" class="form-input mt-1 block w-full border-2 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="jalur_masuk" class="block text-sm font-medium text-gray-700">Jalur Masuk:</label>
                    <select name="jalur_masuk" id="jalur_masuk" class="form-select mt-1 block w-full border-2 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="snmptn">SNMPTN</option>
                        <option value="sbmptn">SBMPTN</option>
                        <option value="mandiri">Mandiri</option>
                    </select>
                </div>

                <div class="flex justify-left">
                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus-ring-4 focus-outline-none focus-ring-blue-300 dark-focus-ring-blue-800 font-sm rounded-lg text-medium px-5 py-2.5 text-center mt-8">Generate Akun</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="text-left mt-6">
        <form action="{{ route('generate.from.csv') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="scan_csv">Generate From CSV:</label>
            <div class="flex items-center justify-center w-full">
                <label for="scan_csv" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover-bg-gray-800 dark-bg-gray-700 hover-bg-gray-100 dark-border-gray-600 dark-hover-border-gray-500 dark-hover-bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark-text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark-text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark-text-gray-400">File .csv</p>
                    </div>
                    <input type="file" name="csv_file" accept=".csv">
                </label>
            </div>
            <div class="flex justify-left mt-8">
                <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus-ring-4 focus-outline-none focus-ring-blue-300 dark-focus-ring-blue-800 font-sm rounded-lg text-medium px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
</div>
</main>
</div>
@endsection

