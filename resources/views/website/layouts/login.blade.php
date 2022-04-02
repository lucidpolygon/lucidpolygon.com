<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Tags -->
    <title>{{ config('app.name', 'Lucid Polygon') }}</title>
    <meta name="robots" content="noindex">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <main>
        <div class="ml-12 mt-12">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="flex">
                <form method="POST" action="{{ route('login') }}">
                    <span>@csrf</span>
                    <input type="text" placeholder="Email" id="email" name="email" class="sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0" />
                    <input type="password" placeholder="Password" id="password" name="password" class="sm:text-sm border-gray-300 focus:border-gray-300 focus:ring-0" />
                    <input type="submit" value="Login" class="sm:text-sm px-4 border border-gray-300 h-9 focus:outline-none focus:bg-secondary w-auto" />
                </form>
            </div>
        </div>
    </main>
</body>

</html>