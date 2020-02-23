@extends('layouts.fontend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="contact-content text-center main-content">
                <h2 class="section-title">Contact Us</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry’s.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="contact-form">
            <form method="POST" action="{{route('contact.send')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <label for="name">Your Name *</label>
                        <input type="text" name="name" class="w-100 border">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label for="email">Your Email *</label>
                        <input type="email" name="email" class="w-100 border">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label for="subject">Subject *</label>
                        <input type="text" name="subject" class="w-100 border">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="message">Your Message *</label>
                        <textarea rows="5" name="message" class="w-100 border"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <button class="btn theme-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
