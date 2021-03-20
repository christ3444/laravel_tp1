<?php

namespace App\Http\Controllers;

use App\Tache;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = Tache::paginate(10);
//->reject(function ($tache){
   //      return $tache->done==0;
    // });
    return view('taches.index',compact('datas'));
    }
}
