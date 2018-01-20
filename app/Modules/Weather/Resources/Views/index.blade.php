@extends('layouts.app')
@section('content')

    <form id="togglingForm" method="get" class="form-inline">
        <div class="form-group">
            <div class="col-lg-6">
                <input id="location"  class="form-control" maxlength="100" name="location" placeholder="" type="text" value="{{ucfirst($city)}}"> <br />
            </div>

            <div class="col-lg-2">
                <button type="submit" class="btn btn-outline-success" name="search">Search</button>
            </div>
            <div class="col-lg-2">
                <a href="{{url('weather')}}"><button type="button" class="btn btn-outline-dark" name="clear">Clear</button></a>
            </div>
        </div>
    </form>

    <div class="row col-lg-12 text-center">
        <div class="page-header">
            <h3 class="title"><i class="fa fa-map-marker"></i> {{ucfirst($city)}}</h3>

        </div>
    </div>
    <div class="row">

        @foreach($weatherForcast as $key => $weather)
{{--            @php dd($weather);@endphp--}}
            @php $timeFromTo = "from " . $weather->time->from->format('H:i') . " to " . $weather->time->to->format('H:i'); @endphp

            @if($timeFromTo == 'from 12:00 to 15:00')
                <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$weather->time->from->format('l')}}</h4>
                        <small>{{$weather->time->from->format('jS F Y')}}</small>

                    </div>
                    <div class="card-body">
                        <h4>{{$weather->weather->description}}</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="card-text"><i class="wi wi-thermometer" aria-hidden="true"></i> Temperature</p>
                                    </td>
                                    <td>
                                        {{$weather->temperature}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="card-text"><i class="wi wi-humidity" aria-hidden="true"></i> Humidity</p>
                                    </td>
                                    <td>
                                        {{$weather->humidity->getFormatted()}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="card-text"><i class="wi wi-barometer" aria-hidden="true"></i> Pressure</p>
                                    </td>
                                    <td>
                                        {{$weather->pressure->getFormatted()}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="card-text"><i class="wi wi-strong-wind" aria-hidden="true"></i> Wind</p>
                                    </td>
                                    <td>
                                        {{$weather->wind->speed}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="card-text"><i class="wi wi-cloudy" aria-hidden="true"></i> Clouds</p>
                                    </td>
                                    <td>
                                        {{$weather->clouds->getFormatted()}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endsection
<script async 
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&callback=initMap&libraries=places">
</script>
{{--<script type="text/javascript" src="{{asset('js/location-autocomplete.js')}}"--}}
<script>
//    (function() {
        var inputCity;
        var cityName;
        var optionsCity;
        var autocompleteCity;

        function initMap() {
            optionsCity = {
                types: ['(cities)']
            };
            inputCity = document.getElementById('location');//
            autocompleteCity = new google.maps.places.Autocomplete(inputCity , optionsCity);
            autocompleteCity.addListener('place_changed', function() {
                var place = autocompleteCity.getPlace();
                $('#location').val(place.address_components[0].long_name);
                cityName = place.address_components[0].long_name;
            });
        }

//    })();




</script>