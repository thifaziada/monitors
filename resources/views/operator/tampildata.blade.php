@extends('layout.main')
@section('content')



<div class="flex-1 min-h-screen p-4">  
  <!-- Content -->

  <div class="container mx-auto p-2"> <!-- Added p-4 for padding -->
    

    <div class="container mx-auto">
      <h1 class="font-bold text-xl mb-4">Edit Profil Mahasiswa</h1>
    </div>
    <div class=" w-full items-center"> <!-- Use flex container to align content in the same line -->
     
      <div> <!-- Add more additional content as needed -->
        
          <!-- Your second additional content here -->
      </div>
        
    </div>
    <div id="editProfileForm" class="relative overflow-x-auto bg-gray-100 p-10" style="border-radius: 10px;">
      <form class="max-w-sm mx-auto" action="{{ route('tampilkandata', ['id_mhs' => $mahasiswa->id_mhs]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
          <label for="NIM" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
          <input type="text" id="NIM" name="NIM" aria-label="NIM" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('NIM',$mahasiswa->NIM) }}" disabled>
        </div>
        <div class="mb-5">
          <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
          <input type="text" id="nama" name="nama" aria-label="nama" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('nama',$mahasiswa->nama) }}" disabled>
        </div>
        <div class="mb-5">
          <label for="angkatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Angkatan</label>
          <input type="text" id="angkatan" name="angkatan" aria-label="angkatan" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('angkatan',$mahasiswa->angkatan) }}" disabled>
        </div>
        <div class="mb-4">
            @error('status')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
            <label class="block text-sm font-bold text-gray-700">Status</label>
            <select class="form-select mt-1 block w-full @error('status') border-red-500 @enderror" name="status">
                <option value="Aktif" {{ old('status', $mahasiswa->status) === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Cuti" {{ old('status', $mahasiswa->status) === 'Cuti' ? 'selected' : '' }}>Cuti</option>
                <option value="Mangkir" {{ old('status', $mahasiswa->status) === 'Mangkir' ? 'selected' : '' }}>Mangkir</option>
                <option value="DO" {{ old('status', $mahasiswa->status) === 'DO' ? 'selected' : '' }}>DO (Drop Out)</option>
                <option value="Undur Diri" {{ old('status', $mahasiswa->status) === 'Undur Diri' ? 'selected' : '' }}>Undur Diri</option>
                <option value="Meninggal Dunia" {{ old('status', $mahasiswa->status) === 'Meninggal Dunia' ? 'selected' : '' }}>Meninggal Dunia</option>
                <option value="Lulus" {{ old('status', $mahasiswa->status) === 'Lulus' ? 'selected' : '' }}>Lulus</option>
            </select>
        </div>
        {{-- <div class="mb-5">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>{{ old('status',$mahasiswa->status) }}</option>
                <option value="AKTIF">AKTIF</option>
                <option value="CUTI">CUTI</option>
                <option value="DO">DO</option>
                <option value="MANGKIR">MANGKIR</option>
                <option value="MENINGGAL">MENINGGAL</option>
            </select>
        </div> --}}
        <div class="mb-5">
          <label for="jalur_masuk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jalur Masuk</label>
          <input type="text" id="jalur_masuk" name="jalur_masuk" aria-label="jalur_masuk" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('jalur_masuk',$mahasiswa->jalur_masuk) }}" disabled>
        </div>
        <div class="mb-5">
          <label for="no_HP" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Handphone</label>
          <input type="text" id="no_HP" name="no_HP" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ old('no_HP',$mahasiswa->no_HP) }}" value="{{ old('no_HP',$mahasiswa->no_HP) }}" required @error('no_HP') border-red-500 @enderror>
          @error('no_HP')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
          <input type="text" id="alamat" name="alamat" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ old('alamat',$mahasiswa->alamat) }}" value="{{ old('alamat',$mahasiswa->alamat) }}" required @error('alamat') border-red-500 @enderror disabled>
          @error('alamat')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
          @enderror
        </div>
      
       


      
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Perubahan</button>
      </form>
       
    </div>
    
</div>
</div>

</div>
<script>
  document.getElementById('editProfileButton').addEventListener('click', function() {
      document.getElementById('editProfileForm').classList.remove('hidden');
  });
</script>
@endsection