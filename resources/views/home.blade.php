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

    <div class="container-fluid">
    <div id="map"></div>
        <br><br>
    </div>

    <!-- Scripts -->
    <script>
        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var icons = {
            parking: {
                icon: iconBase + 'parking_lot_maps.png'
            },
            library: {
                icon: iconBase + 'library_maps.png'
            },
            info: {
                icon: iconBase + 'info-i_maps.png'
            }
        };


        var image = '/images/atm.png'

        var sites = {!! json_encode($atms->toArray()) !!};

        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: new google.maps.LatLng(33.312805, 44.361488),
                mapTypeId: 'terrain'
            });

            // Create a <script> tag and set the USGS URL as the source.
            var script = document.createElement('script');

            script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
            document.getElementsByTagName('head')[0].appendChild(script);
        }

        window.eqfeed_callback = function () {
            for (var i = 0; i < sites.length; i++) {
                var latLng = new google.maps.LatLng(sites[i].y, sites[i].z);
                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    icon: image,
//                        icon: icons.info.icon,
                });

            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe5wskKH6ChjF04K4VVghlpC6sAd4L5z4&callback=initMap">
    </script>
@endsection
