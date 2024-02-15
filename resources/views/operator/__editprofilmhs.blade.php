@extends('layout.main')
@section('content')


<body class="bg-gray-100">

  <div class="container mx-auto my-10">
      <div class="bg-white shadow-md rounded-md p-6">
          <form action="{{route('updatedata',$mahasiswa->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <!-- NIM -->
              <div class="mb-4">
                  <label class="block text-sm font-bold text-gray-700">NIM</label>
                  <input type="text" class="form-input mt-1 block w-full @error('nim') border-red-500 @enderror" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" disabled>
                  @error('nim')
                      <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                  @enderror
              </div>

              <!-- Nama -->
              <div class="mb-4">
                  <label class="block text-sm font-bold text-gray-700">Nama</label>
                  <input type="text" class="form-input mt-1 block w-full @error('nama') border-red-500 @enderror" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" disabled>
                  @error('nama')
                      <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                  @enderror
              </div>

              <!-- Alamat -->
              <div class="mb-4">
                  <label class="block text-sm font-bold text-gray-700">Alamat</label>
                  <input type="text" class="form-input mt-1 block w-full @error('alamat') border-red-500 @enderror" name="alamat" value="{{ old('alamat', $mahasiswa->alamat) }}" disabled>
                  @error('alamat')
                      <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                  @enderror
              </div>

              <!-- Provinsi -->
              <div class="mb-4">
                  <label class="block text-sm font-bold text-gray-700">Provinsi</label>
                  <input type="text" class="form-input mt-1 block w-full @error('provinsi') border-red-500 @enderror" name="provinsi" value="{{ old('provinsi', $mahasiswa->provinsi) }}" disabled>
                  @error('provinsi')
                      <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                  @enderror
              </div>

              <!-- Kota -->
              <div class="mb-4">
                  <label class="block text-sm font-bold text-gray-700">Kota</label>
                  <input type="text" class="form-input mt-1 block w-full @error('kota') border-red-500 @enderror" name="kota" value="{{ old('kota', $mahasiswa->kota) }}" disabled>
                  @error('angkatan')
                      <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                  @enderror
              </div>

              <!-- Angkatan -->
              <div class="mb-4">
                  <label class="block text-sm font-bold text-gray-700">Angkatan</label>
                  <input type="text" class="form-input mt-1 block w-full @error('angkatan') border-red-500 @enderror" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" disabled>
              </div>

              <!-- Status -->
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

              <!-- No Handphone -->
              <div class="mb-4">
                  @error('no_handphone')
                      <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                  @enderror
                  <label class="block text-sm font-bold text-gray-700">No Handphone</label>
                  <input type="text" class="form-input mt-1 block w-full @error('no_handphone') border-red-500 @enderror" name="no_handphone" value="{{ old('no_handphone', $mahasiswa->no_handphone) }}" disabled>
              </div>

              <!-- Jalur Masuk -->
              <div class="mb-4">
                  @error('jalur_masuk')
                      <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                  @enderror
                  <label class="block text-sm font-bold text-gray-700">Jalur Masuk</label>
                  <input type="text" class="form-input mt-1 block w-full @error('jalur_masuk') border-red-500 @enderror" name="jalur_masuk" value="{{ old('jalur_masuk', $mahasiswa->jalur_masuk) }}" disabled>
              </div>

              <div class="flex">
                  <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded hover:from-blue-700 hover:to-blue-900 mr-2">Update</button>
              </div>
          </form>
      </div>
  </div>

</body>
@endsection