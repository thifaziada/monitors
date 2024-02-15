@extends('layout.main') 
@section('content')

<div class="flex-1 min-h-screen p-4">
    <!-- Content -->
    <div class="container mx-auto  mb-10 rounded-lg">
        <h1 class="text-2xl mb-4">Rekapan Data <span class="text-blue-500"> PKL</span> Mahasiswa</h1>
        <!-- Dashboard Content -->
        {{-- <h1 class="text-2xl font-bold mb-4">Welcome, Operator123!</h1> --}}
        @can('view_dashboard')
        <div class="container border">
        <div class="relative overflow-x-auto shadow pt-4" style="border-radius: 10px; p-4">
            <table class="w-full text-base text-left text-gray-500 dark:text-gray-400 p-4"> <!-- Added p-4 for padding -->
                <thead class="text-lg text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center pt-4">
                        <td class="border" colspan="2">2017</td>
                        <td class="border" colspan="2">2018</td>
                        <td class="border" colspan="2">2019</td>
                        <td class="border" colspan="2">2020</td>
                        <td class="border" colspan="2">2021</td>
                        <td class="border" colspan="2">2022</td>
                        <td class="border" colspan="2">2023</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center p-4">
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>                
                    </tr>
                    <tr class="text-center">
                        <td class="border">{{$mahasiswaAngkPklLulus1->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus1->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus2->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus2->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus3->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus3->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus4->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus4->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus5->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus5->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus6->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus6->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus7->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus1S->count()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
 
    
    <div class="items-right text-right ml-auto pt-10">
        <a href="/exportpdf">
        <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">Export as PDF</button>
        </a>
    </div>
    </div>

    <hr class="border-t-2 border-gray-500 my-4">

        {{-- Rekapan data mahasiswa skripsi --}}

        <div class="container mx-auto border pt-4 ">
            <h1 class="text-2xl mb-4">Rekapan Data <span class="text-blue-500">Skripsi</span> Mahasiswa</h1>
        <div class="relative overflow-x-auto shadow pt-4" style="border-radius: 10px;">
            <table class="w-full text-base text-left text-gray-500 dark:text-gray-400 p-4"> <!-- Added p-4 for padding -->
                <thead class="text-lg text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center pt-4">
                        <td class="border" colspan="2">2017</td>
                        <td class="border" colspan="2">2018</td>
                        <td class="border" colspan="2">2019</td>
                        <td class="border" colspan="2">2020</td>
                        <td class="border" colspan="2">2021</td>
                        <td class="border" colspan="2">2022</td>
                        <td class="border" colspan="2">2023</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center p-4">
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>
                        <td class="border">Belum Lulus</td>
                        <td class="border">Lulus</td>                
                    </tr>
                    <tr class="text-center">
                        <td class="border">{{$mahasiswaAngkPklLulus1S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus1S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus2S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus2S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus3S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus3S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus4S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus4S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus5S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus5S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus6S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklBelumLulus6S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus7S->count()}}</td>
                        <td class="border">{{$mahasiswaAngkPklLulus7S->count()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    <div class="items-right text-right ml-auto pt-10">
        <a href="/exportpdf1">
        <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">Export as PDF</button>
        </a>
    </div>
</div>

<hr class="border-t-2 border-gray-500 my-4">

<div class="container mx-auto border pt-4 ">
    <h1 class="text-2xl mb-4">Rekapan Data <span class="text-blue-500">Status</span> Mahasiswa</h1>
<div class="relative overflow-x-auto shadow pt-4" style="border-radius: 10px;">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-4"> <!-- Added p-4 for padding -->
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                  Status
                </th>
                <th scope="col" class="px-6 py-3">
                    2017
                </th>
                <th scope="col" class="px-6 py-3">
                    2018
                </th>
                <th scope="col" class="px-6 py-3">
                    2019
                </th>
                <th scope="col" class="px-6 py-3">
                    2020
                </th>
                <th scope="col" class="px-6 py-3">
                    2021
                </th>
                <th scope="col" class="px-6 py-3">
                    2022
                </th>
                <th scope="col" class="px-6 py-3">
                    2023
                </th>
            </tr>
            <div class="m-2">
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  AKTIF
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk1Aktif->count()}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk2Aktif->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk3Aktif->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk4Aktif->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk5Aktif->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk6Aktif->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk7Aktif->count()}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  CUTI
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk1Cuti->count()}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk2Cuti->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk3Cuti->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk4Cuti->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk5Cuti->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk6Cuti->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk7Cuti->count()}}
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  MANGKIR
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk1Mangkir->count()}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk2Mangkir->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk3Mangkir->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk4Mangkir->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk5Mangkir->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk6Mangkir->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk7Mangkir->count()}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  MENINGGAL
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk1Meninggal->count()}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk2Meninggal->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk3Meninggal->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk4Meninggal->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk5Meninggal->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk6Meninggal->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk7Meninggal->count()}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  DO
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk1DO->count()}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$mahasiswaAngk2DO->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk3DO->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk4DO->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk5DO->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk6DO->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$mahasiswaAngk7DO->count()}}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="items-right text-right ml-auto pt-10">
<a href="/exportpdf2">
<button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">Export as PDF</button>
</a>
</div>
</div>
        

      
        @endcan
  

@endsection
