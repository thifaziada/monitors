
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
                    {{isset ($mahasiswaAngk1Aktif) ? $mahasiswaAngk1Aktif->count() : 0 }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{isset ($mahasiswaAngk2Aktif) ? $mahasiswaAngk1Aktif->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk3Aktif) ? $mahasiswaAngk1Aktif->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk4Aktif) ? $mahasiswaAngk1Aktif->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk5Aktif) ? $mahasiswaAngk1Aktif->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk6Aktif) ? $mahasiswaAngk1Aktif->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk7Aktif) ? $mahasiswaAngk1Aktif->count() : 0 }}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  CUTI
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{isset ($mahasiswaAngk1Cuti) ? $mahasiswaAngk1Cuti->count() : 0 }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{isset ($mahasiswaAngk2Cuti) ? $mahasiswaAngk1Cuti->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk3Cuti) ? $mahasiswaAngk1Cuti->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk4Cuti) ? $mahasiswaAngk1Cuti->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk5Cuti) ? $mahasiswaAngk1Cuti->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk6Cuti) ? $mahasiswaAngk1Cuti->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk7Cuti) ? $mahasiswaAngk1Cuti->count() : 0 }}
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  MANGKIR
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{isset ($mahasiswaAngk1Mangkir) ? $mahasiswaAngk1Mangkir->count() : 0 }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{isset ($mahasiswaAngk2Mangkir) ? $mahasiswaAngk1Mangkir->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk3Mangkir) ? $mahasiswaAngk1Mangkir->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk4Mangkir) ? $mahasiswaAngk1Mangkir->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk5Mangkir) ? $mahasiswaAngk1Mangkir->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk6Mangkir) ? $mahasiswaAngk1Mangkir->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk7Mangkir) ? $mahasiswaAngk1Mangkir->count() : 0 }}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  MENINGGAL
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{isset ($mahasiswaAngk1Meninggal) ? $mahasiswaAngk1Meninggal->count() : 0 }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{isset ($mahasiswaAngk2Meninggal) ? $mahasiswaAngk1Meninggal->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk3Meninggal) ? $mahasiswaAngk1Meninggal->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk4Meninggal) ? $mahasiswaAngk1Meninggal->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk5Meninggal) ? $mahasiswaAngk1Meninggal->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk6Meninggal) ? $mahasiswaAngk1Meninggal->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk7Meninggal) ? $mahasiswaAngk1Meninggal->count() : 0 }}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                  DO
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{isset ($mahasiswaAngk1DO) ? $mahasiswaAngk1DO->count() : 0 }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{isset ($mahasiswaAngk2DO) ? $mahasiswaAngk1DO->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk3DO) ? $mahasiswaAngk1DO->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk4DO) ? $mahasiswaAngk1DO->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk5DO) ? $mahasiswaAngk1DO->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk6DO) ? $mahasiswaAngk1DO->count() : 0 }}
                </td>
                <td class="px-6 py-4">
                    {{isset ($mahasiswaAngk7DO) ? $mahasiswaAngk1DO->count() : 0 }}
                </td>
            </tr>
        </tbody>
    </table>
</div>