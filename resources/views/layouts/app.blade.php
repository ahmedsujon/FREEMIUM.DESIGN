<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'TEAMOREO') }}</title>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>


    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


    <!-- Font-icon css -->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
    <script>
        // If you put this on end of the body it doesn't work properly
        if (localStorage.getItem('sidebarStyle')) {
            $('.app').addClass('sidenav-toggled');
        }

    </script>
    <!-- Navbar -->
    <header class="app-header">
        <a class="app-header__logo" href="{{ url('admin/dashboard') }}">
            {{
                config('app.name', 'TEAMOREO')
            }}
        </a>
        <!-- Sidebar toggle button -->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu -->
        <ul class="app-nav">
            <!-- User Menu -->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <i class="fa fa-user fa-lg"></i>
                </a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-lg"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img class="app-sidebar__user-avatar" src="{{ asset('images/profile.png') }}" alt>
            <div>
                <p class="app-sidebar__user-name"></p>
                <p class="app-sidebar__user-designation">System Admin</p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="{{ Route('admin.dashboard') }}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-pie-chart"></i>
                    <span class="app-menu__label">{{ __('Category') }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{Route('admin.category.create')}}">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Add Category') }}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{Route('admin.category.index')}}" rel="noopener">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Category List') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-pie-chart"></i>
                    <span class="app-menu__label">{{ __('Tags') }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{Route('admin.tags.create')}}">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Add Tag') }}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{Route('admin.tags.index')}}" rel="noopener">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Tag List') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-laptop"></i>
                    <span class="app-menu__label">{{ __('Items') }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{Route('admin.items.index')}}">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Item List') }}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{Route('admin.items.create')}}" rel="noopener">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Add Item') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="{{Route('admin.contact_info.index')}}">
                    <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">{{__('Contact List') }}</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="{{Route('admin.subscriber.index')}}">
                    <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">{{__('Subscriber List') }}</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="{{Route('admin.resource_submit.index')}}">
                    <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">{{__('Submit Resource') }}</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-pie-chart"></i>
                    <span class="app-menu__label">{{ __('Advertise') }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{Route('admin.advertise.create')}}">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Add Advertise') }}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{Route('admin.advertise.index')}}" rel="noopener">
                            <i class="icon fa fa-circle-o"></i>
                            {{ __('Advertise List') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
    <main class="app-content">@yield('content')</main>
    <!-- Essential javascripts for application to work -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <!-- The javascript plugin to display page loading on top -->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <!-- Data table plugin -->
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('.data-table').DataTable();
        $('.select2').select2();
        $('.date-picker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });

        $('.app-menu a[href^="' + location.href + '"].app-menu__item').addClass('active');
        $('a[href^="' + location.href + '"]').closest('.treeview').addClass('is-expanded');

    </script>
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
</body>

</html>
