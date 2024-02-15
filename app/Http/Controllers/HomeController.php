<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    //bikin template dashboard
    // public function dashboard(){
    //     return view('dashboard');
    // }

    //bikin method
    public function index(){ //STEP 1 
        //ngambil data user

        $data = User::get(); //ngeget dari model user
        dd($data);
        return view('index',compact('data')); //ngash datanya ke index
    }

    public function import(Request $request)
    {
        dd($request->file('file')); //bakal di tangkap disini file excelnya
    }
    

}
