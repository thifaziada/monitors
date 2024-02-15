@extends('layout.main')
@section('content')



<div class="flex-1 min-h-screen p-4">  
  <!-- Content -->
  <div class="container mx-auto mb-4">
    <!-- IRS Content -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nama 
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            NIM
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Angkatan
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Jalur Masuk
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nomor Telpon
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                           View
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listmahasiswa as $key => $m)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 text-center whitespace-no-wrap">
                                <a href="#" class="text-black-600 hover:underline dark:text-black-500">{{ $m->nama }}</a>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $m->NIM }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $m->angkatan }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">
                                @if ($m->status == 'AKTIF')
                                    <span class="text-green-500">{{ $m->status }}</span>
                                @else
                                    <span class="text-red-500">{{ $m->status }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $m->jalur_masuk }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $m->alamat }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $m->no_HP}}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">
                                <a href="{{route('lihatdetailmahasiswa_dosenwali',['id_mhs'=>$m->id_mhs])}}" class="bg-gradient-to-r from-purple-500 to-purple-700 text-white px-4 py-2 rounded hover:from-blue-700 hover:to-blue-900 mr-2">Detail</a>
                            </td>                     
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
  </div>
</div>
@endsection