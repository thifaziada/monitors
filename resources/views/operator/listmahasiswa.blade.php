@extends('layout.main')
@section('content')



<div class="overflow-y:auto flex-1 min-h-screen p-4">  
  <!-- Content -->

  <div class="container mx-auto p-2"> <!-- Added p-4 for padding -->
    

    <div class="container mx-auto">
      <h1 class="font-bold text-xl mb-4">List Mahasiswa Keseluruhan</h1>
    </div>
    <div class=" w-full items-center"> <!-- Use flex container to align content in the same line -->
     
      <div> <!-- Add more additional content as needed -->
        
          <!-- Your second additional content here -->
      </div>
        
    </div>
    <div class="relative overflow-x-auto bg-blue-400 pt-4" style="border-radius: 10px;">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-4"> <!-- Added p-4 for padding -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fakultas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Angkatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jalur Masuk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
                <div class="m-2">
            </thead>
            @foreach ($mahasiswaData as $mhs)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$loop->iteration}}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$mhs->NIM}}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$mhs->fakultas}}
                    </td>
                    <td class="px-6 py-4">
                        {{$mhs->nama}}
                    </td>
                    <td class="px-6 py-4">
                        {{$mhs->angkatan}}
                    </td>
                    <td class="px-6 py-4">
                        {{$mhs->status}}
                    </td>
                    <td class="px-6 py-4">
                        {{$mhs->jalur_masuk}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center justify-center">
                            <a href="{{route('tampilkandata',['id_mhs'=>$mhs->id_mhs])}}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded hover:from-blue-700 hover:to-blue-900 mr-2">Edit</a>
                            <a href="" class="bg-gradient-to-r from-red-500 to-red-700 text-white px-4 py-2 rounded hover:from-red-700 hover:to-red-900">Delete</a>
                        </div>                      
                    </td>     
                </tr>
              
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

</div>
@endsection
