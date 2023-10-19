<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
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
</nav>

<div class="container mt-4">

    @if (session()->has('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    @if (session()->has("panier"))
        <div class="table-responsive shadow mb-3">
            <table class="table table-bordered table-hover bg-white mb-0">
                <thead class="thead-dark" >
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Opérations</th>
                </tr>
                </thead>
                <tbody>
                <!-- Initialisation du total général à 0 -->
                @php $total = 0 @endphp

                    <!-- On parcourt les produits du panier en session : session('panier') -->
                @foreach (session("panier") as $key => $item)

                    <!-- On incrémente le total général par le total de chaque produit du panier -->
                    @php $total += $item['price'] * $item['quantity'] @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong><a href="{{ route('products.show', $key) }}" title="Afficher le produit" >{{ $item['name'] }}</a></strong>
                        </td>
                        <td>{{ $item['price'] }} $</td>
                        <td>
                            <!-- Le formulaire de mise à jour de la quantité -->
                            <form method="POST" action="{{ route('panier.add', $key) }}" class="form-inline d-inline-block" >
                                {{ csrf_field() }}
                                <input type="number" name="quantity" placeholder="Quantité ?" value="{{ $item['quantity'] }}" class="form-control mr-2" style="width: 80px" >

                            </form>
                        </td>
                        <td>
                            <!-- Le total du produit = prix * quantité -->
                            {{ $item['price'] * $item['quantity'] }} $
                        </td>
                        <td>
                            <!-- Le Lien pour retirer un produit du panier -->
                            <a href="{{ route('panier.remove', $key) }}" class="btn btn-outline-danger" title="Retirer le produit du panier" ><i class="fa-solid fa-trash" ></i></a>
                        </td>
                    </tr>
                @endforeach
                <tr colspan="2" >
                    <td colspan="2" ><strong> Total de la commande :</strong> </td>
                    <td colspan="2">
                        <x-secondary-button>
                        <input type="submit" value="Actualiser" />
                    </x-secondary-button>
                    </td>

                    <td colspan="2">
                        <!-- On affiche total général -->
                        <strong>{{ $total }} $</strong>
                    </td>
                </tr>
                </tbody>

            </table>
        </div>

        <!-- Lien pour vider le panier -->
        <a class="btn btn-danger" href="{{ route('panier.empty') }}" title="Retirer tous les produits du panier" >Vider le panier</a>
        <a class="btn btn-danger" href="{{ route('register') }}" >Valider la commande</a>

    @else
        <div class="alert alert-info">Aucun produit au panier</div>
    @endif

</div>

</body>
</html>

