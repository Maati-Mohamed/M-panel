<div class="MyAside">
    <div class="MyHeader text-center">
        <div class="MyDitels">
            <h2>{{ $settings->website_name }}</h2>
            <small>{{ $settings->contact_email }}</small>
        </div>
        <span class="close-icon"><i class="bi bi-x-circle"></i></span>
    </div>
    <hr>
    <div class="AsideNav mt-3">
        <div class="aside-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <span><i class="bi bi-house-door"></i></span>
                <p>@lang('Home')</p>
            </a>
        </div>

        <div class="aside-link ">
            <a href="#" class="">
                <span><i class="bi bi-tags"></i></span>
                <p>@lang('Categories')</p>
            </a>
        </div>
        <div class="aside-link" >
            <a class="aside-content-word" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class=""><i class="bi bi-columns"></i></span>
                <p>@lang('Content')</p>
            </a>
        </div>

        <div class="collapse" id="collapseExample">
            <ul class="list-group">
                <li>
                    <a href="">
                        <span><i class="bi bi-bag"></i></span>
                        <p>@lang('Products')</p>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="">
                        <span><i class="bi bi-tags"></i></span>
                        <p>@lang('Categories')</p>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="">
                        <span><i class="bi bi-shop"></i></span>
                        <p>@lang('Stors')</p>
                    </a>
                </li>
                
            </ul>
        </div>
        @permission('roles-read')
        <div class="aside-link {{ Route::is('admin.roles.*') ? 'active' : '' }} ">
            <a href="{{ route('admin.roles.index') }}" class="">
                <span><i class="bi bi-lock"></i></span>
                <p>@lang('Roles')</p>
            </a>
        </div>
        @endpermission

        <div class="aside-link  {{ Route::is('admin.users.*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}" class="">
                <span><i class="bi bi-person"></i></span>
                <p>@lang('Users')</p>
            </a>
        </div>
       
        @permission('settings-update')
        <div class="aside-link {{ Route::is('admin.settings.*') ? 'active' : '' }}">
            <a href="{{ route('admin.settings.index') }} " class="">
                <span><i class="bi bi-gear"></i></span>
                <p>@lang('Setting')</p>
            </a>
        </div>
        @endpermission
        <div class="aside-link">
            <a href="{ route('logout') }}" id="logout-link">
                <span><i class="bi bi-box-arrow-right"></i></span>
                <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
                    @csrf
                </form>
                <p>@lang('Logout')</p>
            </a>
        </div>
    </div>
</div>