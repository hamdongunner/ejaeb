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

        sites = [
            {
                "id": 1,
                "name": "كرادة مريم",
                "description": "فاست_لنك_اسود_الرافدين",
                "rate": 0,
                "y": 33.320427,
                "z": 44.397339,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 2,
                "name": "المنصور - شارع14 رمضان",
                "description": "أفاق_العين_عين_الفهد",
                "rate": 0,
                "y": 33.316509,
                "z": 44.337784,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 3,
                "name": "المنصور حي دراغ",
                "description": "أفاق_العين_غزوان",
                "rate": 0,
                "y": 33.323582,
                "z": 44.360062,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 4,
                "name": "العطيفية - قرب محكمة الكاظمية",
                "description": "أفاق_العين_سلام_فون",
                "rate": 0,
                "y": 33.354809,
                "z": 44.35487,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 5,
                "name": "بغداد / الحارثية",
                "description": "أفاق_العين_الساعة",
                "rate": 0,
                "y": 33.310764,
                "z": 44.363274,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 6,
                "name": "بغداد / شارع الربيعي",
                "description": "فاست لنك_الفضل",
                "rate": 0,
                "y": 33.320267,
                "z": 44.446571,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 7,
                "name": "بغداد / الحارثية",
                "description": "خمائل_فراس",
                "rate": 0,
                "y": 33.310764,
                "z": 44.363274,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 8,
                "name": "بغداد/ العامرية بداية شارع العسل ",
                "description": "مثلث_شارقه",
                "rate": 0,
                "y": 33.299118,
                "z": 44.290348,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 9,
                "name": "بغداد/ الحارثية / شارع البورصة ",
                "description": "تراينكل_سعدون 4",
                "rate": 0,
                "y": 33.310764,
                "z": 44.363274,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 10,
                "name": "بغداد / المنصور / مقر الشركة",
                "description": "افاق العين _ مبيعات",
                "rate": 0,
                "y": 33.319637,
                "z": 44.34446,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 11,
                "name": "بغداد / المنصور مجاور شركة زين الرئيسية",
                "description": "فاست_لنك4",
                "rate": 0,
                "y": 33.318802,
                "z": 44.349491,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 12,
                "name": "بغداد / المنصور حي الاميرات/ مقر الشركة",
                "description": "تراينكل_بغداد2",
                "rate": 0,
                "y": 33.298801,
                "z": 44.426987,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 13,
                "name": "بغداد / المنصور خلف مول المنصور",
                "description": "خمائل بغداد 4",
                "rate": 0,
                "y": 33.320663,
                "z": 44.346176,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 14,
                "name": "بغداد/ حي دراغ",
                "description": "توب فشن_جملة",
                "rate": 0,
                "y": 33.323582,
                "z": 44.360062,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 15,
                "name": "بغداد / الحارثيه سوق البورصه قرب مول بغداد ",
                "description": "فاست لنك_مصطفى فون",
                "rate": 0,
                "y": 33.310764,
                "z": 44.363274,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 16,
                "name": "بغداد / شارع الربيعي مجاور اسواق كل يوم",
                "description": "أفاق العين_متمم",
                "rate": 0,
                "y": 33.320232,
                "z": 44.44672,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 17,
                "name": "بغداد /العامرية شارع المنظمة",
                "description": "أفاق_العين_الوسام",
                "rate": 0,
                "y": 33.297577,
                "z": 33.297577,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 18,
                "name": "بغداد / المنصور الداودي قرب المجلس البلدي",
                "description": "فاست لنك_الطريق المختصر",
                "rate": 0,
                "y": 33.316677,
                "z": 44.309433,
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 19,
                "name": "اربيل سي متري قرب جامع حجي حسين",
                "description": "اي تو_اربيل",
                "rate": 0,
                "y": 36.189396,
                "z": 43.999004,
                "created_at": null,
                "updated_at": null
            }
        ]
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

        {{--var sites = {!! json_encode($atms->toArray()) !!};--}}

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
