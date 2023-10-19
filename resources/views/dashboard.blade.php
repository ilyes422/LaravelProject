<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body >
{{--Navbar du site--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light" data-bs-theme="grey">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>

        <div class="d-flex justify-content-between align-items-center">

        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <x-nav-link>
                    <a href="{{ route('products.index') }}">Mes produits</a>
                </x-nav-link>

                <x-nav-link>
                    <a href="{{ route('panier.show') }}">Mon panier<i class="fa-solid fa-cart-shopping"></i></a>
                </x-nav-link>
            </ul>


            @if (Route::has('login'))
                <div>
                    @auth
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->fname }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">@lang('Profile')</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">@lang('Log Out')</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Mon compte
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('login') }}">@lang('Log in')</a>
                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{ route('register') }}">@lang('Register')</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    @endauth
                    @endif
                </div>
        </div>
    </div>
    </div>
</nav>
{{-- Fin Navbar du site--}}

<section class="discover-section text-center text-white position-relative">
    <img src="{{ asset('images/banner.png') }}" alt="Banner" class="w-100" style="object-fit: cover; object-position: center;">
    <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
        <x-secondary-button>
            <a href="{{ route('produits.index') }}" >Découvrez nos produits</a>
        </x-secondary-button>
    </div>
</section>









</body>
</html>
