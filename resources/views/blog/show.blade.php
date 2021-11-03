@extends('layouts.admin') 
@section('content')

<h1 style="margin-top:100px;" class="text-center">Tours</h1>
<hr />
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 mb-5">
             <div id="map" style="width:400px;height:100%; min-heigh:600px;"></div>
            </div>
            <div class="col-md-6 col-sm-12 mb-5 ">
                <div class="card" style="min-width: 500px;">
                    <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="postImage">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->body }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <script>
            function myMap() {
                // armacao de pera
                var myCenter = new google.maps.LatLng(37.100974, -8.357671);
                // alvor
                var newCenter = new google.maps.LatLng(37.1272764, -8.5901315,19);
                // Albufeira
                var newCenter1 = new google.maps.LatLng(37.0742339, -8.3004307,17.62);
                // montechoro
                var newCenter2 = new google.maps.LatLng(37.0972961, -8.230934,17);


                var mapCanvas = document.getElementById("map");
                var mapOptions = {center: myCenter, zoom: 12,mapTypeId: google.maps.MapTypeId.HYBRID};
                

                var map = new google.maps.Map(mapCanvas, mapOptions);
                // armacao de pera
                var marker = new google.maps.Marker({position:myCenter});
                marker.setMap(map);
                // alvor
                var newMarker = new google.maps.Marker({position:newCenter});
                newMarker.setMap(map);
                // albufeira
                var newMarker1 = new google.maps.Marker({position:newCenter1});
                newMarker1.setMap(map);
                // montechoro
                var newMarker2 = new google.maps.Marker({position:newCenter2});
                newMarker2.setMap(map);

                var infowindow = new google.maps.InfoWindow({
                    content: "Av rent a car,<br/>Armação de Pêra<br/>Head Office"
                });
                infowindow.open(map,marker);

                var infowindow1 = new google.maps.InfoWindow({
                    content: "Av rent a car,<br/>Alvor"
                });
                infowindow1.open(map,newMarker);

                var infowindow2 = new google.maps.InfoWindow({
                    content: "Av rent a car,<br/>Praia do Castelo"
                });
                infowindow2.open(map,newMarker1);

                var infowindow3 = new google.maps.InfoWindow({
                    content: "Av rent a car,<br/>Montechoro"
                });
                infowindow3.open(map,newMarker2);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApPqqu5r1MXjg0WgyXmwt1PaT8i5YLw18&callback=myMap"></script>
@endsection