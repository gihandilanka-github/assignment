<?php

namespace App\Modules\Weather\Http\Controllers;

use App\Http\Controllers\Controller;
use Gmopx\LaravelOWM\LaravelOWM;

class WeatherController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $lowm = new LaravelOWM();
        $currentWeather = $lowm->getCurrentWeather('london', 'en', 'degree');


        $data['temperature'] = $currentWeather;
        $data['meta_title'] = 'Weather';

        return view('weather::index', $data);
    }
}