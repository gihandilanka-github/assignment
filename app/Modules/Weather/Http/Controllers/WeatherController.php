<?php

namespace App\Modules\Weather\Http\Controllers;

use App\Http\Controllers\Controller;
use Gmopx\LaravelOWM\LaravelOWM;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Showing weather
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['city'] = 'Colombo';

        if(!empty($request->location)){
            $data['city'] = $request->location;
        }

        $lowm = new LaravelOWM();
        $weatherForcast = $lowm->getWeatherForecast($data['city'],'en', 'metric','3');

        $data['weatherForcast'] = $weatherForcast;
        $data['meta_title'] = 'Weather';

        return view('weather::index', $data);
    }
}