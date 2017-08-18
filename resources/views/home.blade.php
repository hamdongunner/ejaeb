@extends('layouts.app')

@section('content')


    <style> html, body, #map_canvas {
            margin: 0;
            padding: 0;
            height: 100%
        }
    </style>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe5wskKH6ChjF04K4VVghlpC6sAd4L5z4&callback=initMap&sensor=false">
    </script>
    <body>Lat:
    <input id="lat" name="lat" val="40.713956" />Long:
    <input id="long" name="long" val="74.006653" />
    <br />
    <br />
    <div id="map" style="width: 500px; height: 250px;"></div>
    </body>
    <script>
        function initMap() {
            var uluru = new google.maps.LatLng(40.713956, -74.006653);
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                draggable: true,
                position: uluru,
                map: map,
                title: "Your location"
            });

            google.maps.event.addListener(marker, 'dragend', function (event) {


                document.getElementById("lat").value = event.latLng.lat();
                document.getElementById("long").value = event.latLng.lng();
            });

            google.maps.event.addListener(map, 'click', function (event) {


                document.getElementById("lat").value = event.latLng.lat();
                document.getElementById("long").value = event.latLng.lng();
            });
        }
    </script>
   
    </body>





    {{--<div class="container-fluid">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 col-lg-12">--}}

    {{--<div id="map" class="text-center" style="width:100%;height:550px;background:black;"></div>--}}


    {{--<script>--}}
    {{--function myMap() {--}}
    {{--var mapOptions = {--}}
    {{--center: new google.maps.LatLng(33.312805, 44.361488),--}}
    {{--zoom: 10,--}}
    {{--mapTypeId: google.maps.MapTypeId.HYBRID--}}
    {{--}--}}
    {{--var map = new google.maps.Map(document.getElementById("map"), mapOptions);--}}
    {{--}--}}
    {{--</script>--}}

    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
