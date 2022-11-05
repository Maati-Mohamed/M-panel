<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'; }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
    @if( App::getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    @endif
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/style.css') }}">

    <style>
        body {
            --main-color: {{ $settings->main_color }}
        }
    </style>
    @if($settings->dark_mode == 1)
    <style>
        :root {
            --color-background: #131923;
            --color-box-background: #1c222b;
            --color-dark: #edeffd;
            --color-white: #202528;

            --color-dark-variant: #a3bdcc;
            --color-light: rgba(0, 0, 0, 0.4);
            --box-shadow: 0 2rem 3rem var(--color-light);

        }

        body {
            background-color: var(--color-background);
            color: var(--color-dark);
        }

        .theme {
            background-color: var(--color-box-background) !important;
            color: var(--color-dark) !important;
        }

        input:focus,
        select {
            border: 1px solid #31344bc9;
            outline: 1px solid #31344bc9;
        }

        input,
        select {
            border: 1px solid #31344bc9 !important;
        }

        .dropdown-item:focus,
        .dropdown-item:hover {
            background-color: var(--main-color);
            color: var(--color-dark);
        }
    </style>
    @endif

</head>

<body>

    <div class="MyPage">
        <!-- Preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- /End Preloader -->
        @include('layouts.dashboard._aside')
        <div class="MyContent">
            <nav class="Mynav">
                <div class="MyLogo">
                    <span id="list-icon"><i class="bi bi-list"></i></span>
                    <span id="nav-icon"><i class="bi bi-list"></i></span>
                    <p class="mb-0"><span>{{ $settings->website_name }}</p>

                </div>
                <div class="MyOptions">
                    <!-- Language -->
                    <div class="local">
                        <div class="dropdown">
                            <a class="" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-translate"></i>
                            </a>
                            <ul class="dropdown-menu MyBgdark" aria-labelledby="dropdownMenuButton2">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li class="dropdown-item ">
                                    <a rel="alternate" class="language-text" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="Mydark">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <ul class="dropdown-menu MyBgdark" aria-labelledby="dropdownMenuButton2">
                            <li class="dropdown-item">

                            </li>
                        </ul>
                    </div>
                    <!-- Language -->
                    <li class="dropdown list-unstyled">

                        <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-bell"></i></a>
                        <ul class="dropdown-menu notification-menu">
                            <div class="header d-flex justify-content-between">
                                <span>@lang('Notification')</span>
                                <a href="#" class="text-decoration-none">@lang('View All')</a>
                            </div>
                            <li><a class="dropdown-item d-flex gap-2 pb-3" href="#">
                                    <div class="profile-img">
                                        <img src="{{ asset('dashboard_files/images/logo.jpg') }}" class="" alt="user">
                                    </div>
                                    <div>
                                        <p class=" my-0">Lorem ipsum dolor sit amet consectetur.
                                        </p>
                                        <small><i class="bi bi-alarm"></i> 5 minte ago</small>
                                    </div>
                                </a></li>

                            <li><a class="dropdown-item d-flex gap-2" href="#">
                                    <div class="profile-img">
                                        <img src="{{ asset('dashboard_files/images/logo.jpg') }}" class="" alt="user">
                                    </div>
                                    <div>
                                        <p class=" my-0">Lorem ipsum dolor sit amet consectetur.
                                        </p>
                                        <small><i class="bi bi-alarm"></i> 5 minte ago</small>
                                    </div>
                                </a></li>

                        </ul>
                    </li>
                    <div class="dropdown">
                        <div class="profile-img" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('dashboard_files/images/logo.jpg') }}" class="" alt="user">
                        </div>
                        <ul class="dropdown-menu theme profile-drop">
                            <li><a class="dropdown-item" href="{{ route('home') }}">
                                    <span><i class="bi bi-globe"></i></span>
                                    @lang('View Website')
                                </a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                                    <span><i class="bi bi-person-circle"></i></span>
                                    @lang('Profile Settings')
                                </a></li>

                            <li><a class="dropdown-item" href="{{ route('admin.change_password') }}">
                                    <span><i class="bi bi-file-lock2"></i></span>
                                    @lang('Change Password')
                                </a></li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="main-content p-3">
                @include('sweetalert::alert')
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('dashboard_files/js/main.js') }}"></script>


</body>

</html>