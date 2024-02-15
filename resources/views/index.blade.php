@extends('layout.main')
@section('content')



<div class="flex-1 min-h-screen p-4">  
  <!-- Content -->
  <div class="container mx-auto mb-4">
      <!-- Dashboard Content -->
      <h1 class="text-2xl font-bold mb-4">Welcome, Operator123!</h1>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <!-- Card 1 -->
          <div class="bg-white p-4 rounded-lg shadow">
              <h2 class="text-lg font-semibold">Card 1</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <!-- Card 2 -->
          <div class="bg-white p-4 rounded-lg shadow">
              <h2 class="text-lg font-semibold">Card 2</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <!-- Card 3 -->
          <div class="bg-white p-4 rounded-lg shadow">
              <h2 class="text-lg font-semibold">Card 3</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
      </div>
  </div>
  <div class="container mx-auto p-4 bg-gray-200"> <!-- Added p-4 for padding -->
    <form action="/user-import" method="post" enctype="multipart/form-data">
      @csrf
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type ="file" name="file">
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">submit</button>
    </form>

    <div class="container mx-auto">
      {{-- <h1 class="font-bold text-xl mb-4">Generate new student account</h1> --}}
    </div>
    <div class=" w-full items-center"> <!-- Use flex container to align content in the same line -->
      <div class="mb-4"> <!-- Adjust the margin as needed -->
        {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label> --}}
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
        {{-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p> --}}
      </div>
      <div> <!-- Add more additional content as needed -->
        
          <!-- Your second additional content here -->
      </div>
        <div> <!-- Add more additional content as needed -->
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">submit</button>
      </div> 
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-4"> <!-- Added p-4 for padding -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                </tr>
                <div class="m-2">
            </thead>
            @foreach ($data as $d)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$loop->iteration}}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$d->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$d->email}}
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