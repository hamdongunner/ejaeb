@extends('layouts.app')

@section('content')

    <head>
        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
    <div id="map"></div>
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 2,
                center: {lat: -33.865427, lng: 151.196123},
                mapTypeId: 'terrain'
            });

            // Create a <script> tag and set the USGS URL as the source.
            var script = document.createElement('script');

            // This example uses a local copy of the GeoJSON stored at
            // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
            script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
            document.getElementsByTagName('head')[0].appendChild(script);

            map.data.setStyle(function(feature) {
                var magnitude = feature.getProperty('mag');
                return {
                    icon: getCircle(magnitude)
                };
            });
        }

        function getCircle(magnitude) {
            return {
                path: google.maps.SymbolPath.CIRCLE,
                fillColor: 'red',
                fillOpacity: .2,
                scale: Math.pow(2, magnitude) / 2,
                strokeColor: 'white',
                strokeWeight: .5
            };
        }

        function eqfeed_callback(results) {
            map.data.addGeoJson(results);
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe5wskKH6ChjF04K4VVghlpC6sAd4L5z4&callback=initMap">
    </script>
    </body>
@endsection
