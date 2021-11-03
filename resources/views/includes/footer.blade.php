<footer class="footer sticky-bottom mt-5">
    <div class="container-fluid">   
        <div class="row footerBox">
            
        </div>
        <div class="row cor0"> 
            <div class="offset-md-2 col-md-4">
                <h3 class="mt-5">Navigation</h3>
                <table class="table" style="min-width:250px;">
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td><a href="{{ url('/') }}" class="text-white">Home</a></td>
                        <td><a href="{{ url('booking-form') }}" class="text-white">@lang('nav.bookingForm')</a></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td><a href="{{ url('/#aboutUs') }}" class="text-white">@lang('nav.aboutUs')</a></td>
                        <td><a href="{{ url('contacts') }}" class="text-white">@lang('nav.contacts')</a></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td><a href="{{ url('rent-a-car-fleet') }}" class="text-white">@lang('nav.ourFleet')</a></td>
                        <td><a class="text-white" href="{{ url('tours') }}">@lang('nav.tourBlog')</a></td>
                    </tr>

                    <!-- facebook and instagram brand pages -->
                    <tr>
                        <th scope="row"></th>
                            <td><a class="text-white" target="_blank">Facebook <i class="fab fa-2x fa-facebook"></i></a></td>
                            <td><a class="text-white" target="_blank">Instagram <i class="fab fa-2x fa-instagram-square"></i></a></td>
                    </tr>
                </tbody>
                </table>
            </div> 
            <div class="col-md-6 text-center">
                <h3 class="mt-5">Av Rent a Car, <small>Faro Airport Car Hire.</small></h3>
                <address>
                    <p>Helpdesk: <a href="tel:351 282 315 700" class="text-white">+351 282 315 700</a></br>  
                    24H assistance: <a href="tel:351 966 972 041" class="text-white">+351 966 972 041</a></br>
                    Fax: <a href="tel:351 282 314 989" class="text-white">+351 282 314 989</a></br>
                    E-mail: <a href="mailto:info@avrentcar.com<" class="text-white">info@avrentcar.com</a></p>
                   
                </address>
            </div>        
        </div>
        <div class="row bg-dark">
            <div id="cookieConsent">
                This website is using cookies. <a data-toggle="modal" data-target="#cookieModal" >More info</a>. <a class="cookieConsentOK">That's Fine</a>
            </div>
        </div>    
    </div>
</footer>
