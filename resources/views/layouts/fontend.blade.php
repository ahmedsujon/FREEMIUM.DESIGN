<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Freemium | Resource Showcase</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- favicon -->
    @php
    $link = \Illuminate\Support\Facades\URL::current();
    @endphp
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <meta property="og:title" content="Freemium.Design">
    <meta property="og:description" content="Freemium|Resource Showcase.">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <!-- All CSS -->
    <link rel="stylesheet" href="{{ asset('fontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('fontend/css/fontawesome.all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('fontend/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('fontend/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('fontend/css/responsive.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
    <!-- preloader start -->
    <div class="preloader">
        <div class="preloader-spinner"></div>
    </div>
    <!-- preloader end -->
    <!-- header -->
    <header class="header-area">
        <div class="container">
            <div class="header-top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ url('/') }}">Freemium</a>
                </div>
                <div class="search-btn">
                    <form method="GET" action="{{route('search')}}">
                        <input type="text" name="query" value="{{ isset ($query) ? $query : ''}}"
                            placeholder="Search resources…" />
                        <button>
                            <img src="{{ asset('fontend/img/icon.svg') }}" alt="icon" />
                        </button>
                    </form>
                </div>
            </div>
            <div class="header-bottom text-center">
                <nav class="main-menu">
                    <ul>
                        <li><a href="{{ route('all_items') }}">All</a></li>
                        @foreach(App\Category::all() as $category)
                        <li>
                            <a href="{{route('category.items',$category->slug)}}">{{$category->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- end of header -->
    <!-- New Releases -->
    <section class="new-releases-area section-padding">
        @yield('content')
    </section>
    <!-- end of New Releases -->
    <!-- footer area -->
    <footer>
        <div class="container">
            <div class="border-top footer-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer-menu text-center text-lg-left">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>
                                    <a href="{{ Route('about_us') }}">About</a>
                                </li>
                                <li><a href="{{ Route('contact_info') }}">Contact</a></li>
                                <li>
                                    <a href="{{ Route('advertise') }}">Advertise</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="copyright text-center text-lg-right">
                            Copyright © Freemium. A project by
                            <a href="{{ url('/') }}">@Teamoreo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->
    <div class="scroll-top"><i class="fas fa-chevron-up"></i></div>

    <!-- All js -->
    <script src="{{
                asset('fontend/js/vendor/modernizr-3.6.0.min.js')
            }}"></script>
    <script src="{{
                asset('fontend/js/vendor/jquery-1.10.2.min.js')
            }}"></script>
    <script src="{{ asset('fontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('fontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fontend/js/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('fontend/js/main.js') }}"></script>

    @if(Session::has('response'))
    <script>
        var toastData = {
            html: '{{Session::get("response.message")}}',
            classes: '{{Session::get("response.type") == "success" ? "green" : "red"}}'
        };
        $.notify({
            title: '',
            message: '{{Session::get("response.message")}}',
            icon: '{{Session::get("response.type") == "success" ? "fa fa-check" : "fa fa-close"}}'
        }, {
            type: '{{Session::get("response.type") == "success" ? "success" : "danger"}}'
        });

    </script>
    @endif
    <script>
        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-buttons > a', function (e) {

            var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width=' + popupSize.width + ',height=' + popupSize.height +
                ',left=' + verticalPos + ',top=' + horisontalPos +
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });

    </script>
</body>

</html>
