<?php

namespace App\Modules\Weather\Http\Controllers;

use App\Http\Controllers\Controller;
use Gmopx\LaravelOWM\LaravelOWM;

class WeatherController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Showing weather
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $lowm = new LaravelOWM();
//        $date = new \DateTime();
//        $date->add(\DateInterval::createFromDateString('yesterday'));
//        $history = $lowm->getWeatherHistory('london', $date);
//        dd($history);
//        $currentWeather = $lowm->getCurrentWeather('london', 'en', 'celsius');
        $weatherForcast = $lowm->getWeatherForecast('colombo','en', 'metric','4', false, 1200);
//dd($weatherForcast);
//        $next4DaysForcast = array_chunk($weatherForcast->);
        $data['weatherForcast'] = $weatherForcast;
        $data['meta_title'] = 'Weather';

        return view('weather::index', $data);
    }
}