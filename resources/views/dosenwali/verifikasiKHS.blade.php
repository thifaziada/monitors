@extends('layout.main')
@section('content')



<div class="flex-1 min-h-screen p-4">  
  <!-- Content -->
  <div class="container mx-auto mb-4">
    <!-- IRS Content -->
    <div class=" overflow-x-auto shadow-md sm:rounded-lg">
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
                            Semester
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Jumlah SKS Semester
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Jumlah SKS Kumulatif
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            IP Semester
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            IP Kumulatif
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Scan KHS
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                           Action
                        </th>
                    </tr>
                </thead>
                <tbody action="">
                    @foreach ($verifKHS as $key => $verifkhs)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $verifkhs->mahasiswa->nama }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $verifkhs->NIM }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $verifkhs->mahasiswa->angkatan }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $verifkhs->smt_aktif }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $verifkhs->SKS_semester }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $verifkhs->SKS_kumulatif }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $verifkhs->IP_smt }}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">{{ $verifkhs->IP_kumulatif}}</td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">
                                <a href="#" type="button" class="text-black-600 hover:underline dark:text-black-500 btn btn-link view-khs" data-scan-url="{{ asset($verifkhs->berkas_KHS) }}">View KHS</a>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-no-wrap">
                                <button onclick="window.location.href='{{ route('tolak_verifikasi_khs', ['idKhs' => $verifkhs->id_khs]) }}'" type="button" class="text-white bg-gradient-to-r hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
                                        <g fill="#e92727" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.33333,5.33333)"><path d="M24,4c-3.50831,0 -6.4296,2.62143 -6.91992,6h-6.8418c-0.08516,-0.01457 -0.17142,-0.02176 -0.25781,-0.02148c-0.07465,0.00161 -0.14908,0.00879 -0.22266,0.02148h-3.25781c-0.54095,-0.00765 -1.04412,0.27656 -1.31683,0.74381c-0.27271,0.46725 -0.27271,1.04514 0,1.51238c0.27271,0.46725 0.77588,0.75146 1.31683,0.74381h2.13867l2.51758,26.0293c0.27108,2.80663 2.65553,4.9707 5.47461,4.9707h14.73633c2.81922,0 5.20364,-2.16383 5.47461,-4.9707l2.51953,-26.0293h2.13867c0.54095,0.00765 1.04412,-0.27656 1.31683,-0.74381c0.27271,-0.46725 0.27271,-1.04514 0,-1.51238c-0.27271,-0.46725 -0.77588,-0.75146 -1.31683,-0.74381h-3.25586c-0.15912,-0.02581 -0.32135,-0.02581 -0.48047,0h-6.84375c-0.49032,-3.37857 -3.41161,-6 -6.91992,-6zM24,7c1.87916,0 3.42077,1.26816 3.86133,3h-7.72266c0.44056,-1.73184 1.98217,-3 3.86133,-3zM11.65039,13h24.69727l-2.49219,25.74023c-0.12503,1.29513 -1.18751,2.25977 -2.48828,2.25977h-14.73633c-1.29892,0 -2.36336,-0.96639 -2.48828,-2.25977zM20.47656,17.97852c-0.82766,0.01293 -1.48843,0.69381 -1.47656,1.52148v15c-0.00765,0.54095 0.27656,1.04412 0.74381,1.31683c0.46725,0.27271 1.04514,0.27271 1.51238,0c0.46725,-0.27271 0.75146,-0.77588 0.74381,-1.31683v-15c0.00582,-0.40562 -0.15288,-0.7963 -0.43991,-1.08296c-0.28703,-0.28666 -0.67792,-0.44486 -1.08353,-0.43852zM27.47656,17.97852c-0.82766,0.01293 -1.48843,0.69381 -1.47656,1.52148v15c-0.00765,0.54095 0.27656,1.04412 0.74381,1.31683c0.46725,0.27271 1.04514,0.27271 1.51238,0c0.46725,-0.27271 0.75146,-0.77588 0.74381,-1.31683v-15c0.00582,-0.40562 -0.15288,-0.7963 -0.43991,-1.08296c-0.28703,-0.28666 -0.67792,-0.44486 -1.08353,-0.43852z"></path></g></g>
                                    </svg>
                                </button>
                                <button onclick="window.location.href='{{ route('editKhs_dosenwali', ['idKhs' => $verifkhs->id_khs]) }}'" type="button" class="text-white bg-gradient-to-r hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
                                        <g fill="#2e4faa" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M18.41406,2c-0.256,0 -0.51203,0.09797 -0.70703,0.29297l-2,2l-1.41406,1.41406l-11.29297,11.29297v4h4l14.70703,-14.70703c0.391,-0.391 0.391,-1.02406 0,-1.41406l-2.58594,-2.58594c-0.195,-0.195 -0.45103,-0.29297 -0.70703,-0.29297zM18.41406,4.41406l1.17188,1.17188l-1.29297,1.29297l-1.17187,-1.17187zM15.70703,7.12109l1.17188,1.17188l-10.70703,10.70703h-1.17187v-1.17187z"></path></g></g>
                                    </svg>
                                </button>
                                <button onclick="window.location.href='{{ route('setujui_verifikasi_khs', ['idKhs' => $verifkhs->id_khs]) }}'" type="button" class="text-white bg-gradient-to-r hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
                                        <g fill="#37cc22" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,2c-12.683,0 -23,10.317 -23,23c0,12.683 10.317,23 23,23c12.683,0 23,-10.317 23,-23c0,-4.56 -1.33972,-8.81067 -3.63672,-12.38867l-1.36914,1.61719c1.895,3.154 3.00586,6.83148 3.00586,10.77148c0,11.579 -9.421,21 -21,21c-11.579,0 -21,-9.421 -21,-21c0,-11.579 9.421,-21 21,-21c5.443,0 10.39391,2.09977 14.12891,5.50977l1.30859,-1.54492c-4.085,-3.705 -9.5025,-5.96484 -15.4375,-5.96484zM43.23633,7.75391l-19.32227,22.80078l-8.13281,-7.58594l-1.36328,1.46289l9.66602,9.01563l20.67969,-24.40039z"></path></g></g>
                                    </svg>
                                </button>
                            </td>                      
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal structure -->
        <div class="modal" id="khsModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">View KHS</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <iframe id="pdfViewer" src="{{ asset('storage/KHS/'.$verifkhs->berkas_KHS)}}"width="100%" height="500px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script>
            setTimeout(function () {
                var notification = document.getElementById('notification');
                notification.style.display = 'none';
            }, 3000);

            document.addEventListener('DOMContentLoaded', function () {
                var khsButtons = document.querySelectorAll('.view-khs');
                var pdfViewer = document.getElementById('pdfViewer');

                khsButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        var scanUrl = button.getAttribute('data-scan-url');
                        pdfViewer.src = scanUrl;
                        $('#khsModal').modal('show');
                    });
                });
            });
        </script>
  </div>
</div>
@endsection