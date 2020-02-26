<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        <nav class="navbar shadow mb-8 py-4 fixed top-0 right-0 left-0">
            <div class="container-fluid px-6">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="{{ route('home') }}" class="text-gray-300 font-bold text-lg block">
                            {{ config('app.name') }}
                        </a>
                        
                        <div class="md:hidden lg:hidden">
                        </div>
                        <div class="xs:hidden sm:hidden md:block">
                        </div>
                    </div>
                    <div class="text-right">
                        @guest
                            <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <span class="text-sm">
                                <dropdown inline caret position="right">
                                    <avatar 
                                        :user-id="{{ auth()->user()->id }}"
                                    ></avatar>
                                    <span class="text-gray-300">
                                        {{ Auth::user()->name }}
                                    </span>
                                    
                                    <template v-slot:dropdown-items>
                                        <li>
                                            <a href="{{ route('users.show', auth()->user()->id) }}" class="text-gray-800 p-3 block hover:bg-gray-200 hover:rounded">
                                                Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                class="text-gray-800 p-3 block hover:bg-gray-200 hover:rounded"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        </li>
                                    </template>
                                </dropdown>
                            </span>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @guest
            <div class="pt-20"> <!-- pt-20 if using fixed top-navbar -->
                @yield('content')
            </div>
        @else
            @include('layouts.sidebar')

            <div class="xs:ml-0 sm:ml-0 lg:ml-48 pt-20 pl-5 mr-6 pb-48"> <!-- pt-20 if using fixed top-navbar -->
                @yield('content')
            </div>
        @endguest

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
