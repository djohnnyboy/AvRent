<nav class="navbar navbar-expand-lg navbar-dark cor5 fixed-top" id="nav" style="transition: 1.5s;min-height: 120px;">
    <div id="navBox" style="height:100px;transition: 0.8s;" class="mb-1 navBox">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/images/websiteMains/logo.png') }}" class="img-fluid" style="width:80%;height:auto;" alt="logo"/></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="margin-top:-25px;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml-3 mb-5" id="navbarSupportedContent">
        <div class="navbar-nav top-right">
            @php $locale = session()->get('locale'); @endphp
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#aboutUs') }}">@lang('nav.aboutUs')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('rent-a-car-fleet') }}">@lang('nav.ourFleet')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contacts') }}">@lang('nav.contacts')</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('booking-form') }}">@lang('nav.bookingForm')</a>
                </li>          
            </ul>
        </div>  
    </div>
</nav>
<script>

window.onscroll = function() {scrollFunction()};
   
function scrollFunction() {
  if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
    document.getElementById("nav").style.fontSize = "15px";
    document.getElementById("navBox").style.height = "70px";
    document.getElementById("nav").style.backgroundColor = "rgba(0,93,130,0.9)";     
  } else {
    document.getElementById("nav").style.fontSize = "13px";
    document.getElementById("navBox").style.height = "90px"; 
    document.getElementById("nav").style.backgroundColor = "rgb(0,93,130)"; 
  }  
}
</script>