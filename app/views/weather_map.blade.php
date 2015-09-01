<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta charset="utf-8">
    <!-- If you delete this meta tag World War Z will become a reality -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/foundation.css">
    <!-- If you are using the gem version, you need this only -->
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/vendor/modernizr.js"></script>
	<title>Weather API</title>
    <style type="text/css">
        main{
            margin-right: auto;
            margin-left: auto;
            width: 80%;
            background-color: #ABDCFD;
        }
        .row{
            max-width: none;
            padding: 20px;
        }
        .panel{
            margin-bottom: 0px;
        }
        .display{
            text-align: center;
            padding-top: 40px;
        }
        span{
            font-size: 1.7rem;
            font-weight: bold;
        }
        h1{
            padding-left: 20px;
            padding-top: 20px;
        }
        h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
          color: #6f6f6f;
          font-size: 70%;
          line-height: 0;
        }
        #map-canvas {
          height: 400px;
          margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <main>
    	<h1>Weather Application<small> | San Antonio</small></h1>
        <div class="row" id="forecast"><h3>3 Day Forecast</h3>
            <div id="day1" class="medium-4 panel display column"></div>
            <div id="day2" class="medium-4 panel display column"></div>
            <div id="day3" class="medium-4 panel display column"></div>
        </div>
        <div class="row">
        <!-- div to hold map -->
            <div id="map-canvas" class="medium-12 column"></div>
        </div>
    </main>
	<script src="/js/jquery.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPIWmV7Hr4cSzUt_5xQryNKNfmqFRIGpk"></script>
	<script>
        'use strict';
       
        var getForecastWeather = function(lat, lon) {
    		var ajaxRequest = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
                APPID: '6b489de4bdc204fcc2edd0aeb72f4542',
                lat: lat,
                lon: lon,
                units: 'Imperial'
            });

            ajaxRequest.always(function(){
                console.log('Request sent');
            });

            ajaxRequest.fail(function(){
                console.log(error);
                console.log(ajaxRequest.status);
            });

            ajaxRequest.done(function(data){
                console.log(data);
                showForecast(data);
            });
        };
        var showForecast= function(data){
            var weatherData = data;
            for(var i = 0; i < 3; i++){
                var forecast_highLow = '<span>' + weatherData.list[i].temp.max.toFixed(0) + '&#176/ ' + weatherData.list[i].temp.min.toFixed(0) + '&#176</span>';
                var forecast_image = '<p><img src="http://openweathermap.org/img/w/' + weatherData.list[i].weather[0].icon + '.png" alt=""></p>';
                var forecast_description = '<p><strong>' + weatherData.list[i].weather[0].main + ': </strong>' + weatherData.list[i].weather[0].description + '</p>';
                var forecast_humidity = '<p><strong>Humidity: </strong>' + weatherData.list[i].humidity + '%</p>';
                var forecast_wind = '<p><strong>Wind: </strong>' + weatherData.list[i].speed + ' mph, ' + weatherData.list[i].deg + ' deg</p>';   
                var forecast_pressure = '<p><strong>Pressure: </strong>' + (weatherData.list[i].pressure * 0.0295333727).toFixed(2) + ' inHg</p>'; 
                var forecast = forecast_highLow + forecast_image + forecast_description + forecast_humidity + forecast_wind + forecast_pressure;
                var day = "#day" + (i + 1);
                $(day).html(forecast);
            }
        };
        //renders 3 day forecast in San Antonio
        getForecastWeather(29.446756, -98.492432); 
        
        // Set initial map options
        var mapOptions = {
          // Set the zoom level
          zoom: 10,
          // This sets the center of the map in San Antonio
          center: { lat: 29.4284595, lng: -98.492433 }
        };
        // Render the map
        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        //intial marker
        var marker = new google.maps.Marker({
            position: mapOptions.center,
            map: map,
            animation: google.maps.Animation.DROP
        });
        //allow user to drop marker wherever they click and weather updates to this location
        google.maps.event.addListener(map, 'click', function(event) {
            //hide old markers
            marker.setMap(null);
            //set lat and lon to location of click
            var lat = event.latLng.A;
            var lon = event.latLng.F;
            //ajaxrequest for weather info at new location and update the display accordingly
            getForecastWeather(lat, lon);
            //add marker to the location of click
            marker = new google.maps.Marker({
                position: event.latLng, 
                map: map,
                animation: google.maps.Animation.DROP
            });
        });

    </script>
    <script src="/js/foundation.min.js"></script>
    <script>$(document).foundation();</script>
</body>
</html>