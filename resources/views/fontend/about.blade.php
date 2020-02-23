@extends('layouts.fontend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="about-content text-center main-content">
                <h2 class="section-title">What is Freemium?</h2>
                <p>Freemium helps designers find free, high-quality <span>Sketch/XD/Figma</span> resources for their
                    next project. We are still new community. We will be pleased if you share the website link with
                    other designers. <br> <br> If you would like to contribute and share a
                    <span>Sketch/XD/Figma</span> file that you designed, Fill the form to share your resources.</p>
                <a href="{{ Route('contact_info') }}" class="btn theme-btn">Contact Us</a>
            </div>
        </div>
    </div>
</div>
@endsection
