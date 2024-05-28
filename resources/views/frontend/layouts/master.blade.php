@include('frontend.layouts.header')
<div class="icon" style="position: fixed;right:100px;bottom:70px;">
    <a href="//api.whatsapp.com/send?phone=+81-47-727-2794&text=Send Message to MH" target="_blank"
        rel="noopener noreferrer">
        <img src="{{ asset('images/whatsapp.png') }}"style="height:50px" alt="" class="img-fluid">
    </a>
</div>
@yield('content')

@include('frontend.layouts.footer')
