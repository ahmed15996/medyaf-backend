<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('img/logo.svg')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('img/logo.svg')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('img/logo.svg')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('img/logo.svg')}}" alt="" height="100" width="100">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">{{ __('models.menu') }}</span></li>





                <x-menu name="home" icon="mdi mdi-speedometer" active="{{ areActiveRoutes(['admin.home']) }}">
                    <x-nav-item route="{{ route('admin.home') }}"  nav_link="{{ areActiveRoutes(['admin.home']) }}" label="{{ __('models.home') }}"/>
                </x-menu>




                {{--  roles  --}}
                <x-permission name="roles-read">
                    <x-menu name="roles" icon="ri-registered-fill" active="{{ areActiveRoutes(['admin.roles.index' , 'admin.roles.create']) }}">
                        <x-nav-item route="{{ route('admin.roles.index') }}"  nav_link="{{ areActiveRoutes(['admin.roles.index']) }}" label="{{ __('models.roles') }}"/>
                        <x-nav-item route="{{ route('admin.roles.create') }}" nav_link="{{ areActiveRoutes(['admin.roles.create']) }}"  label="{{ __('models.add_role') }}"/>
                    </x-menu>
                </x-permission>


                {{--  admins  --}}
                <x-permission name="admins-read">
                    <x-menu name="admins" icon="ri-user-fill" active="{{ areActiveRoutes(['admin.admins.index' , 'admin.admins.create']) }}">
                        <x-nav-item route="{{ route('admin.admins.index') }}" label="{{ __('models.admins') }}" nav_link="{{ areActiveRoutes(['admin.admins.index']) }}"/>
                        <x-nav-item route="{{ route('admin.admins.create') }}" label="{{ __('models.add_admin') }}" nav_link="{{ areActiveRoutes(['admin.admins.create']) }}"/>
                    </x-menu>
                </x-permission>




                {{--  users  --}}
                <x-permission name="users-read">
                    <x-menu name="users" icon="ri-user-heart-fill" active="{{ areActiveRoutes(['admin.users.index']) }}">
                        <x-nav-item route="{{ route('admin.users.index') }}" nav_link="{{ areActiveRoutes(['admin.users.index']) }}" label="{{ __('models.users') }}"/>
                    </x-menu>
                </x-permission>

                {{--  countries  --}}
                <x-permission name="countries-read">
                    <x-menu name="countries" icon="ri-map-pin-fill" active="{{ areActiveRoutes(['admin.countries.index' , 'admin.countries.create']) }}">
                        <x-nav-item route="{{ route('admin.countries.index') }}" nav_link="{{ areActiveRoutes(['admin.countries.index']) }}" label="{{ __('models.countries') }}"/>
                        <x-nav-item route="{{ route('admin.countries.create') }}" nav_link="{{ areActiveRoutes(['admin.countries.create']) }}" label="{{ __('models.add_country') }}"/>
                    </x-menu>
                </x-permission>

                {{--  events  --}}
                <x-permission name="events-read">
                    <x-menu name="events" icon="ri-mail-open-fill" active="{{ areActiveRoutes(['admin.events.index' , 'admin.events.create' , 'admin.event-users.index']) }}">
                        <x-nav-item route="{{ route('admin.events.index') }}" label="{{ __('models.events') }}" nav_link="{{ areActiveRoutes(['admin.events.index']) }}"/>
                        <x-nav-item route="{{ route('admin.events.create') }}" label="{{ __('models.add_event') }}" nav_link="{{ areActiveRoutes(['admin.events.create']) }}"/>
                        <x-nav-item route="{{ route('admin.event-users.index') }}" label="{{ __('models.event_users') }}" nav_link="{{ areActiveRoutes(['admin.event-users.index']) }}"/>
                    </x-menu>
                </x-permission>


                {{--  parties  --}}
                <x-permission name="parties-read">
                    <x-menu name="parties" icon="ri-hand-heart-fill" active="{{ areActiveRoutes(['admin.parties.index']) }}">
                        <x-nav-item route="{{ route('admin.parties.index') }}" label="{{ __('models.parties') }}" nav_link="{{ areActiveRoutes(['admin.parties.index']) }}"/>
                    </x-menu>
                </x-permission>


                <x-menu name="send_notifications" icon=" ri-notification-2-fill" active="{{ areActiveRoutes(['admin.page-notification']) }}">
                    <x-nav-item route="{{ route('admin.page-notification') }}" label="{{ __('models.send_notifications') }}" nav_link="{{ areActiveRoutes(['admin.page-notification']) }}"/>
                </x-menu>



                {{--  static  --}}
                <x-menu name="static" icon="ri-settings-4-fill" active="{{ areActiveRoutes(['admin.questions.index' , 'admin.boardings.index' , 'admin.us' , 'admin.terms' , 'admin.setting' , 'admin.contact-us' ]) }}">
                    <x-nav-item route="{{ route('admin.questions.index') }}" label="{{ __('models.questions') }}" nav_link="{{ areActiveRoutes(['admin.questions.index']) }}"/>
                    <x-nav-item route="{{ route('admin.boardings.index') }}" label="{{ __('models.static') }}" nav_link="{{ areActiveRoutes(['admin.boardings.index']) }}"/>
                    <x-nav-item route="{{ route('admin.us') }}" label="{{ __('models.us') }}" nav_link="{{ areActiveRoutes(['admin.us']) }}"/>
                    <x-nav-item route="{{ route('admin.terms') }}" label="{{ __('models.terms') }}" nav_link="{{ areActiveRoutes(['admin.terms']) }}"/>
                    <x-nav-item route="{{ route('admin.setting') }}" label="{{ __('models.setting') }}" nav_link="{{ areActiveRoutes(['admin.setting']) }}"/>
                    <x-nav-item route="{{ route('admin.contact-us') }}" label="{{ __('models.contact_us') }}" nav_link="{{ areActiveRoutes(['admin.contact-us']) }}"/>
                </x-menu>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
