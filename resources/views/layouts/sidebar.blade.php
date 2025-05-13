<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ Storage::url('aPX4K4aDd19la5xvHOFJbPIx1pwlL6BTbxFefnhM.png') }}" alt="Htwave Logo" class="brand-image">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
                <li class="nav-item">
                    @if(Auth::check()) 
                    <a href="{{ route('home') }}" class="nav-link">
                        <img src="{{ Auth::user()->avatar ? \Storage::url(Auth::user()->avatar) : '' }}"
                        class="border rounded" style="width: 50px; height: 50px; object-fit: cover;">
                        <p>
                            Hello, {{ Auth::user()->name }}
                        </p>
                    </a>
                    @endif
                </li>
                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('view-any', App\Models\Contact::class)
                <li class="nav-item">
                    <a href="{{ route('contacts.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Contacts</p>
                    </a>
                </li>
                @endcan
                @can('view-any', App\Models\Technology::class)
                <li class="nav-item">
                    <a href="{{ route('technologies.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Technologies</p>
                    </a>
                </li>
                @endcan
                @can('view-any', App\Models\Inquiry::class)
                <li class="nav-item">
                    <a href="{{ route('inquiries.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Inquiries</p>
                    </a>
                </li>
                @endcan
                @can('view-any', App\Models\Solution::class)
                <li class="nav-item">
                    <a href="{{ route('solutions.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Solutions</p>
                    </a>
                </li>
                @endcan
                @can('view-any', App\Models\Banner::class)
                <li class="nav-item">
                    <a href="{{ route('banners.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Banners</p>
                    </a>
                </li>
                @endcan
                <li class="nav-item menu-is-opening menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-key"></i>
                        <p>
                            Company introduce
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bannerintro.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Banner introduction</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('history.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>History</p>
                            </a>
                        </li>
                        @can('view-any', App\Models\AwardsAndCertification::class)
                        <li class="nav-item">
                            <a href="{{ route('awards-and-certifications.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Awards And Certifications</p>
                            </a>
                        </li>
                        @endcan
                        @can('view-any', App\Models\TechnologyStatus::class)
                        <li class="nav-item">
                            <a href="{{ route('technology-statuses.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Technology Statuses</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>


                @can('view-any', App\Models\User::class)
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                        <p>Users</p>
                    </a>
                </li>
                @endcan

                </li>

                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-key"></i>
                        <p>
                            Access Management
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', Spatie\Permission\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan

                        @can('view-any', Spatie\Permission\Models\Permission::class)
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
                @endauth
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>