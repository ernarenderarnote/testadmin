<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Slider;

class HomeController extends Controller
{
    private $data;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = [];
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	
    public function frontPage()
    {
        $this->data['users']   = User::get();
        $this->data['slide'] = Slider::where('is_default','1')->first();
		return view('welcome', $this->data);
    }
}
