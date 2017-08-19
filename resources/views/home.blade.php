@extends('layouts.app')

@section('content')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 500px;
            width: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100px;

            margin: 0;
            padding: 0;
        }
    </style>
    <div id="map"></div>
    {{--<!-- Scripts -->--}}
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: new google.maps.LatLng(33.312805,44.361488),
                mapTypeId: 'terrain'
            });

            // Create a <script> tag and set the USGS URL as the source.
            var script = document.createElement('script');

            script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
            document.getElementsByTagName('head')[0].appendChild(script);
        }

        // Loop through the results array and place a marker for each
        // set of coordinates.
        window.eqfeed_callback = function(results) {
            console.log(results);
//            for (var i = 0; i < results.features.length; i++) {
            var latLng = new google.maps.LatLng(33.312805,44.361488);
            var marker = new google.maps.Marker({
                position: latLng,
                map: map
            });
//            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe5wskKH6ChjF04K4VVghlpC6sAd4L5z4&callback=initMap">
    </script>
@endsection
