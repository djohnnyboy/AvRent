@extends('layouts.fleet') 
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
                var myCenter = new google.maps.LatLng({{ $post->coordinates }});

                var mapCanvas = document.getElementById("map");
                var mapOptions = {center: myCenter, zoom: 12,mapTypeId: google.maps.MapTypeId.HYBRID};
                

                var map = new google.maps.Map(mapCanvas, mapOptions);
              
                var marker = new google.maps.Marker({position:myCenter});
                marker.setMap(map);
                var infowindow = new google.maps.InfoWindow({
                    content: "{{ $post->title }}"
                });
                infowindow.open(map,marker);

            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApPqqu5r1MXjg0WgyXmwt1PaT8i5YLw18&callback=myMap"></script>
@endsection