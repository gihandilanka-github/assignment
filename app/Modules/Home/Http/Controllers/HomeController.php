<?php

namespace App\Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Gmopx\LaravelOWM\LaravelOWM;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    /**
     * home page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['meta_title'] = 'Home';
        return view('home::index', $data);
    }
}