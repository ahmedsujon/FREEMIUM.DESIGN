@extends('layouts.fontend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="advertise-content text-center main-content">
                <h2 class="section-title">Advertise</h2>
                <p>You can advertise your brand, product or service with us. It will boost a good amount of visitors in
                    your website from here. <br> <br>

                    Eevery time you purchase or renew an ad slot, you also be promoted in our newsletter, a tweet and a
                    Facebook post to our followers.

                    <br> <br> To know more about advertising you can contact us on <a
                        href="#"><span>advertise@freemium.com</span></a></p>
                <a href="{{ Route('contact_info') }}" class="btn theme-btn">Contact Us</a>
            </div>
        </div>
    </div>

</div>
@endsection
