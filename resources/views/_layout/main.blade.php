<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Primary Meta Tags -->
    <title>IC Markets Investment</title>
    <meta name="title" content="IC Markets Investment" />
    <meta name="description"
        content="Discover top investment solutions with {{ env('APP_NAME') }}, a leading broker offering secure, fast, and easy trading services. Join now to start your investment journey with expert support and advanced technology" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://metatags.io/" />
    <meta property="og:title" content="IC Markets Investment" />
    <meta property="og:description"
        content="Discover top investment solutions with {{ env('APP_NAME') }}, a leading broker offering secure, fast, and easy trading services. Join now to start your investment journey with expert support and advanced technology" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://metatags.io/" />
    <meta property="twitter:title" content="IC Markets Investment" />
    <meta property="twitter:description"
        content="Discover top investment solutions with {{ env('APP_NAME') }}, a leading broker offering secure, fast, and easy trading services. Join now to start your investment journey with expert support and advanced technology" />

    <!-- Meta Tags Generated with https://metatags.io -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <script src="https://kit.fontawesome.com/c29d9477a2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('') }}build/assets/app-DZ5BqmE-.css">
    <link rel="manifest" href="{{ asset('') }}build/manifest.json">
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.label-mobile')

    <main class="w-full overflow-hidden" x-data="{ open: false }">
        <div class="h-dvh flex">
            @include('components.sidebar')

            <section class="w-full overflow-y-auto">
                @include('components.navbar')
                @include('components.widget-tradingview')

                <section class="p-6 " x-bind:class="open ? 'block w-[700px]' : 'w-full'">
                    @yield('content')
                </section>
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{ asset('') }}build/assets/app-I5i9CKeh.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('') }}js/api.js"></script>
    @yield('javascript')

    <script>
        function logout() {
            Swal.fire({
                icon: "info",
                title: "Are you sure want to logout?",
                showDenyButton: true,
                confirmButtonText: "OK, Logout",
                denyButtonText: `No, Not Now!`
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = "/auth/logout"
                }
            });
        }
    </script>

    @if (Session::has('error'))
        <script>
            const errorMessage = @json(Session::get('error'));
            Swal.fire({
                text: errorMessage,
                icon: "error"
            });
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            const successMessage = @json(Session::get('success'));
            Swal.fire({
                text: successMessage,
                icon: "success"
            });
        </script>
    @endif
</body>

</html>
