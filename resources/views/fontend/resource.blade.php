@extends('layouts.fontend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="submit-content text-center main-content">
                <h2 class="section-title">Submit Your Resources</h2>
                <p>We are happy that you are interested to share your resources with us. Please fill the form below to
                    submit your resources.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-7 mx-auto">
            <div class="contact-form">
                <form method="POST" action="{{ route('resource.submit') }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="preview_resource">Link to resource preview *</label>
                            <input type="text" name="preview_resource" class="w-100 border">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="sketch_resource">Link to <span style="color:#FC9C00">Sketch,</span> <span
                                    style="color:#19BCFE">Figma</span> or <span style="color:#FE28BD">Adobe XD</span>
                                file *</label>
                            <input type="text" name="sketch_resource" class="w-100 border">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="name">Author's name *</label>
                            <input type="text" name="name" class="w-100 border">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="preview_website">Author's website *</label>
                            <input type="text" name="preview_website" class="w-100 border">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="email">Your email *</label>
                            <input type="email" name="email" class="w-100 border">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn theme-btn">Submit Your Resource</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
