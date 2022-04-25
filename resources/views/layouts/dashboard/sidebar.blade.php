<aside class="aside">
    <div class="top">
        <div class="logo">
            <img src="{{ $config->logo_image }}" alt="logo">
        </div>
        <h1>Ma<span class="primary">ati</span></h1>
        <i class="bi bi-x-circle" id="close-btn"></i>
    </div>
    <div class="sidebar">
        <a href="{{ route('dashboard.index') }}">
            <div class="icon">
                <i class="bi bi-columns-gap"></i>
            </div>
            <h3>@lang('Dashboard')</h3>
        </a>
        <a href="{{ route('dashboard.users.index') }}" class="active">
            <div class="icon">
                <i class="bi bi-person"></i>
            </div>
            <h3>@lang('Users')</h3>
        </a>
        <a href="{{ route('dashboard.admins.index') }}" class="active">
            <div class="icon">
            <i class="bi bi-person-bounding-box"></i>
            </div>
            <h3>@lang('Admins')</h3>
        </a>
        <a href="{{ route('dashboard.roles.index') }}" class="active">
            <div class="icon">
            <i class="bi bi-shield-lock"></i>
            </div>
            <h3>@lang('Permissions')</h3>
        </a>
        <a href="{{ route('dashboard.configs.index') }}">
            <div class="icon">
                <i class="bi bi-gear"></i>
            </div>
            <h3>@lang('Setting')</h3>
        </a>
        
        <form id="logout-admin" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="{{ route('dashboard.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-admin').submit();">
            <div class="icon">
                <i class="bi bi-box-arrow-left"></i>
            </div>
            <h3>@lang('Logout')</h3>
        </a>
        
    </div>
</aside>