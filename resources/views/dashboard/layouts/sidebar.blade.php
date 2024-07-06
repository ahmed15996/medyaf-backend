<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo.png')}}" alt="" height="100" width="100">
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

                {{--  dashboard  --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">{{ __('models.home') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}" class="nav-link" data-key="t-analytics">{{ __('models.home') }}</a>
                            </li>

                        </ul>
                    </div>
                </li>


                {{--  roles  --}}
                <x-permission name="roles-read">
                    <x-menu name="roles">
                        <x-nav-item route="{{ route('admin.roles.index') }}" label="{{ __('models.roles') }}"/>
                        <x-nav-item route="{{ route('admin.roles.create') }}" label="{{ __('models.add_role') }}"/>
                    </x-menu>
                </x-permission>


                {{--  admins  --}}
                <x-permission name="admins-read">
                    <x-menu name="admins">
                        <x-nav-item route="{{ route('admin.admins.index') }}" label="{{ __('models.admins') }}"/>
                        <x-nav-item route="{{ route('admin.admins.create') }}" label="{{ __('models.add_admin') }}"/>
                    </x-menu>
                </x-permission>




                {{--  users  --}}
                <x-permission name="users-read">
                    <x-menu name="users">
                        <x-nav-item route="{{ route('admin.users.index') }}" label="{{ __('models.users') }}"/>
                    </x-menu>
                </x-permission>

                {{--  countries  --}}
                <x-permission name="countries-read">
                    <x-menu name="countries">
                        <x-nav-item route="{{ route('admin.countries.index') }}" label="{{ __('models.countries') }}"/>
                        <x-nav-item route="{{ route('admin.countries.create') }}" label="{{ __('models.add_country') }}"/>
                    </x-menu>
                </x-permission>

                 {{--  events  --}}
                 <x-permission name="events-read">
                    <x-menu name="events">
                        <x-nav-item route="{{ route('admin.events.index') }}" label="{{ __('models.events') }}"/>
                        <x-nav-item route="{{ route('admin.events.create') }}" label="{{ __('models.add_event') }}"/>
                        <x-nav-item route="{{ route('admin.event-users.index') }}" label="{{ __('models.event_users') }}"/>
                    </x-menu>
                </x-permission>





                {{--  static  --}}
                {{--  <x-permission name="static-read">
                    <x-menu name="static">
                        <x-nav-item route="{{ route('admin.about') }}" label="{{ __('models.about') }}"/>
                        <x-nav-item route="{{ route('admin.education') }}" label="{{ __('models.education') }}"/>
                        <x-nav-item route="{{ route('admin.setting') }}" label="{{ __('models.setting') }}"/>
                    </x-menu>
                </x-permission>  --}}

                 {{--  reservations  --}}
                {{--  <x-permission name="reservations-read">
                    <x-menu name="reservations">
                        <x-nav-item route="{{ route('admin.reservations') }}" label="{{ __('models.reservations') }}"/>
                    </x-menu>
                </x-permission>  --}}



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
