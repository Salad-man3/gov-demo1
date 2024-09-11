<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .active {
            color: black;
            font-weight: 600;
            border-bottom: 2px solid rgb(0, 191, 255);
        }

        .action-column {
            width: 100px;
        }

        .admin-action-column {
            width: 250px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <img src="/images/Screenshot 2024-08-18 204008.png" alt="Bootstrap" width="100" height="32">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @if (Auth::guard('admin')->check())
                        <a class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}"
                            href="{{ url('admin/news') }}">الأخبار</a>
                        <a class="nav-link {{ request()->is('admin/decisions*') ? 'active' : '' }}"
                            href="{{ url('admin/decisions') }}">القرارات</a>
                        <a class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}"
                            href="{{ url('admin/services') }}">الخدمات</a>
                        <a class="nav-link {{ request()->is('admin/activities*') ? 'active' : '' }}"
                            href="{{ url('admin/activities') }}">النشاطات</a>
                        <a class="nav-link {{ request()->is('admin/complaints*') ? 'active' : '' }}"
                            href="{{ url('admin/complaints') }}">الشكاوي</a>
                        <a class="nav-link {{ request()->is('council*') ? 'active' : '' }}"
                            href="{{ url('/council') }}">أعضاء المجلس</a>
                    @else
                        <a class="nav-link {{ request()->is('news*') ? 'active' : '' }}"
                            href="{{ url('news') }}">الأخبار</a>
                        <a class="nav-link {{ request()->is('decisions*') ? 'active' : '' }}"
                            href="{{ url('decisions') }}">القرارات</a>
                        <a class="nav-link {{ request()->is('services*') ? 'active' : '' }}"
                            href="{{ url('services') }}">الخدمات</a>
                        <a class="nav-link {{ request()->is('activities*') ? 'active' : '' }}"
                            href="{{ url('activities') }}">النشاطات</a>
                        <a class="nav-link {{ request()->is('complaints*') ? 'active' : '' }}"
                            href="{{ url('complaints') }}">الشكاوي</a>
                        <a class="nav-link {{ request()->is('council*') ? 'active' : '' }}"
                            href="{{ url('/council') }}">أعضاء المجلس</a>
                    @endif
                </div>
            </div>
            @auth
                <!-- Settings Dropdown for authenticated users -->
                <div style="margin-right: 62px;" class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        style="visibility: visible !important; opacity: 1 !important; display: block !important;">
                        {{ 'مشرف' }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li>
                            <form method="POST"
                                action="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item"
                                    style="visibility: visible !important; opacity: 1 !important; display: block !important;">{{ 'تسجيل خروج' }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </nav>


    <div class="my-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
