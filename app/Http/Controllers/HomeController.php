<?php

namespace App\Http\Controllers;

use App\Models\Recette;

use App\Http\Requests;
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
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Recette::take(3)->orderBy('created_at', 'DESC')->get();
        return view('/home', compact('list'));
    }

}
