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
            {{-- <a class="navbar-brand" href="">Navbar</a> --}}
            <img src="/images/Screenshot 2024-08-18 204008.png" alt="Bootstrap" width="100" height="32">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    {{-- <a class="nav-link active" aria-current="page" href="/">Home</a> --}}
                    <a class="nav-link {{ request()->is('admin/decisions*') || request()->is('decisions*') ? 'active' : '' }}"
                        href="decisions">Decision</a>
                    <a class="nav-link {{ request()->is('admin/services*') || request()->is('services*') ? 'active' : '' }}"
                        href="services">Services</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="my-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
