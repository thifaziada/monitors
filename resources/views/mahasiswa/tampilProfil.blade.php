{{-- @extends('layout.main')
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
      <form class="max-w-sm mx-auto" action="{{ route('editProfil_mahasiswa', ['id' => Auth::user()->id]) }}" method="POST">
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
        <div class="mb-5">
          <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
          <input type="text" id="status" name="status" aria-label="status" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('status',$mahasiswa->status) }}" disabled>
        </div>
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
          <input type="text" id="alamat" name="alamat" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ old('alamat',$mahasiswa->alamat) }}" value="{{ old('alamat',$mahasiswa->alamat) }}" required @error('alamat') border-red-500 @enderror>
          @error('alamat')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto">Upload Foto Profile</label>
          <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="foto_help" id="foto" name="foto" type="file"@error('foto') border-red-500 @enderror>
          @error('foto')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update password</label>
          <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
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

 --}}





















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
    <div id="editProfileForm" name="editprofile" class="relative overflow-x-auto bg-gray-100 p-10" style="border-radius: 10px;">
      <form class="max-w-sm mx-auto" action="{{ route('editProfil_mahasiswa', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart\form-data">
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
        <div class="mb-5">
          <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
          <input type="text" id="status" name="status" aria-label="status" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('status',$mahasiswa->status) }}" disabled>
        </div>
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
          <input type="text" id="alamat" name="alamat" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ old('alamat',$mahasiswa->alamat) }}" value="{{ old('alamat',$mahasiswa->alamat) }}" required @error('alamat') border-red-500 @enderror>
          @error('alamat')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto">Upload Foto Profile</label>
          <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="foto_help" id="foto" name="foto" type="file"@error('foto') border-red-500 @enderror>
          @error('foto')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update password</label>
          <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>


      
        <button type="submit" name="editprofile" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Perubahan</button>
      </form>
       
    </div>
    
</div>
</div>

</div>

@endsection