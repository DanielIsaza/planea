<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fp = fopen("storage/home.txt", "r");
        $linea = null;
        while(!feof($fp)) {
            $linea = $linea.' '.fgets($fp);
        }
        fclose($fp);
        return view('/home',['contenido'=>$linea]);
    }
}
