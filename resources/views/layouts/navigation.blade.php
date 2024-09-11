<nav class="navbar navbar-expand-lg bg-light" style="position: relative; z-index: 1000; overflow: visible !important;">
    <div class="container-fluid" style="overflow: visible !important;">
        <img src="/images/Screenshot 2024-08-18 204008.png" alt="Bootstrap" width="100" height="32">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="position: static; overflow: visible !important;">
            <ul class="navbar-nav" style="position: static; overflow: visible !important;">
                <li class="nav-item" style="position: static; overflow: visible !important;">
                    <a class="nav-link {{ request()->is('admin/dashboard*') || request()->is('dashboard*') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}"
                        style="position: static; visibility: visible !important; opacity: 1 !important; display: block !important;">Dashboard</a>
                </li>
                <li class="nav-item" style="position: static; overflow: visible !important;">
                    <a class="nav-link {{ request()->is('admin/decisions*') || request()->is('decisions*') ? 'active' : '' }}"
                        href="decisions"
                        style="position: static; visibility: visible !important; opacity: 1 !important; display: block !important;">Decision</a>
                </li>
                <li class="nav-item" style="position: static; overflow: visible !important;">
                    <a class="nav-link {{ request()->is('admin/services*') || request()->is('services*') ? 'active' : '' }}"
                        href="services"
                        style="position: static; visibility: visible !important; opacity: 1 !important; display: block !important;">Services</a>
                </li>
                <li class="nav-item" style="position: static; overflow: visible !important;">
                    <a class="nav-link {{ request()->is('admin/complaints*') || request()->is('complaints*') ? 'active' : '' }}"
                        href="complaints"
                        style="position: static; visibility: visible !important; opacity: 1 !important; display: block !important;">Complaints</a>
                </li>
            </ul>
        </div>

        @auth
            <!-- Settings Dropdown for authenticated users -->
            <div style="margin-right: 60px;" class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false"
                    style="visibility: visible !important; opacity: 1 !important; display: block !important;">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if (!Auth::user() instanceof App\Models\Admin)
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"
                                style="visibility: visible !important; opacity: 1 !important; display: block !important;">{{ __('Profile') }}</a>
                        </li>
                    @endif
                    <li>
                        <form method="POST"
                            action="{{ Auth::user() instanceof App\Models\Admin ? route('admin.logout') : route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item"
                                style="visibility: visible !important; opacity: 1 !important; display: block !important;">{{ __('Log Out') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <!-- Login button for unauthenticated users -->
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        @endauth
    </div>
</nav>
