<!DOCTYPE html>
<html lang="en" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'; }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maati | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/style.css') }}">
    @if( App::getLocale() == 'ar')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@800&family=Amiri&family=Cairo:wght@400;500;700&family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    @endif
</head>

<body>
    <div class="myContainer">
        @include('layouts.dashboard.sidebar')
        <main>
            <div class="top">
                <div class="menu-icon">
                    <i class="bi bi-list"></i>
                </div>
                <h2>
                    @lang('Dashboard')
                </h2>
                <div class="left">
                    <div class="date">
                        <input type="date" class="p-1" value="{{ date('Y-m-d') }}">
                    </div>
                    <!-- Dark mode and light mode -->
                    <div class="theme-toggler">
                        <i class="bi bi-brightness-high active"></i>
                        <i class="bi bi-moon"></i>
                    </div>
                    <!-- Dark mode and light mode -->
                    <x-notification-menu count="4" />
                    <!-- Language -->
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-globe fs-4  ms-4"></i>
                        </a>
                        <ul class="dropdown-menu MyBgdark" aria-labelledby="dropdownMenuButton2">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="dropdown-item">
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="Mydark">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Language -->
                    <!-- Admin info -->
                    <div class="info">
                        <p>@lang('Hey'), {{ auth()->user()->name }}</p>
                        <small class="text-muted">@lang('Admin')</small>
                    </div>
                    <div class="profile-photo">
                        <a href="{{ route('dashboard.profile.index') }}" id="drop-down">
                            <img src="{{ auth()->user()->image_path }}" alt="logo">
                        </a>
                    </div>
                    <!-- Admin info -->
                </div>
            </div>
            <div class="content mt-4">
                @include('sweetalert::alert')
                @include('layouts.dashboard._error-message')
                @include('layouts.dashboard._flash-messages')
                @yield('content')
            </div>
        </main>
    </div>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <script>
        const userId = "{{ Auth::user()->id }}";
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <script>
          const chart = new Chartisan({
            el: '#chart',
            url: "@chart('sample_chart')", 
            hooks: new ChartisanHooks()
                .colors(['#ffbb55', '#7380ec'])
                .datasets([{
                    type: 'bar',
                    fill: false,
                }, 'bar']), 
          });
          const chart_two = new Chartisan({
            el: '#chart_two',
            url: "@chart('user_chart')", 
            hooks: new ChartisanHooks()
                .colors(['#7380ec', '#ffbb55'])
                .datasets([{
                    type: 'pie',
                    fill: false,
                }]), 
          });
    </script>
    <script src="{{ asset('dashboard_files/js/main.js') }}"></script>

</body>

</html>