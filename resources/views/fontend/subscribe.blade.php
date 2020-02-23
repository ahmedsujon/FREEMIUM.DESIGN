<!-- news latter area -->
<section class="newslatter-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="subs-content">
                    <h2>Get The Best Resources, Every Week, In Your Inbox</h2>
                    <h4>1000+ designers trust us with their email</h4>
                    <div class="subs-form">
                        <form method="POST" action="{{route('subscriber.store')}}">
                            @csrf
                            <input type="email" name="email" placeholder="Your E-mail">
                            <button class="btn theme-btn subs-btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of news latter area -->
