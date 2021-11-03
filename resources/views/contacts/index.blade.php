@extends('layouts.fleet')
@section('content')
    <section aria-label="breadcrumb" style="margin-top:95px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost:8000">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('contacts.contacts')</li>
        </ol>
    </section>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 ofsset-md-4">
                <h3>@lang('contacts.howToCollectTitle')</h3>

                <p><b>@lang('contacts.howToCollectSubTitle')</b></p>

                <p>@lang('contacts.howToCollectText')</p>  

                <p>@lang('contacts.howToCollectTextTwo')</p>         
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>@lang('contacts.contacts')</h3>           
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <ul class="list-group shadow-lg">
                    <li class="list-group-item"><i class="fas fa-2x fa-phone-square-alt contactBox"></i> <a href="tel:351 282 315 700" class="text-muted ml-1"><strong> +351 282 315 700</strong></a></li>
                    <li class="list-group-item"><i class="fas fa-2x fa-mobile-alt contactBox"></i><a href="tel:351 966 972 041" class="text-muted ml-1"><strong> +351 966 972 041</strong></a></li>
                    <li class="list-group-item"><i class="fas fa-2x fa-print contactBox"></i><a href="tel:351 282 314 989" class="text-muted ml-1"><strong> +351 282 314 989</strong></a></li>
                    <li class="list-group-item"><i class="fas fa-2x fa-envelope-square contactBox"></i><a href="mailto:info@avrentcar.com" class="text-muted ml-1"><strong> info@avrentcar.com</strong></a></li>
                </ul>
                <ul class="list-group mt-4">
                    <li class="list-group-item"><i class="fas fa-2x fa-map-marker-alt"></i><strong class="ml-4">Armação de Pêra</strong></li>
                    <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">(Head Office)</strong></li>
                    <address>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">Rua da Praia, 13 - R/C</strong></li>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">8365 - Armação de Pêra</strong></li>
                    </address>
                </ul>
                <ul class="list-group mt-4">
                    <li class="list-group-item"><i class="fas fa-2x fa-map-marker-alt"></i><strong class="ml-4">Albufeira/Montechoro</strong></li>
                    <address>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">Av. Sá Carneiro, 173</strong></li>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">8200 Albufeira</strong></li>
                    </address>
                </ul>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-2x fa-map-marker-alt"></i><strong class="ml-4">Albufeira</strong></li>
                    <address>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">Sitio Praia do Castelo</strong></li>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">Torre Velha, Galé - Sesmarias</strong></li>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">8200 – Albufeira</strong></li>
                    </address>
                </ul>
                <ul class="list-group mt-4">
                    <li class="list-group-item" style="margin-top: 7px;"><i class="fas fa-2x fa-map-marker-alt"></i><strong class="ml-4">Portimão/Alvor</strong></li>
                    <address>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">Urb. Quinta da Praia</strong></li>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">Lote 4, Loja 9</strong></li>
                        <li class="list-group-item"><span class="contactBox"></span><strong class="ml-5">8500 Alvor</strong></li>
                    </address>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 shadow-lg border contactEmail">
                <h4 class="mt-2">@lang('contacts.sendMessage')</h4>
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">@lang('contacts.name')</label>
                        <input type="text" name="name" placeholder="John Smith" id="contactName" 
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? '' }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="name">@lang('contacts.email')</label>
                        <input type="email" name="email" placeholder="johnsmith@gmail.com" id="contactEmail" 
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? '' }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="name">@lang('contacts.message')</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="contactSms"" 
                            rows="5" name="message" value="{{ old('message') ?? '' }}" required></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @include('includes.spinner')
                    <input type="submit" value="@lang('contacts.submit')" id="submit" class="btn btn-primary mb-3" style="width:100%;"> 
                </form>
            </div>
        </div>
    </div><!-- end container -->
        <h3 id="ondeestamos" class="text-center mt-5" >@lang('contacts.ourOffices')</h3>
        <hr style="background-color: grey;width:100px;height:1px;margin-left: auto;margin-right:auto;">
        <div id="map" style="width:100%;height:400px;"></div>
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