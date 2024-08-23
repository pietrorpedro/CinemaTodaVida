<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema Toda Vida - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/master.css') }}>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand fs-2 fw-bold" href={{ route('home') }}>Cinema Toda Vida</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fs-5 fw-semibold text-center" href={{ route('home') }}>Página Inicial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 fw-semibold text-center" href={{ route('movies') }}>Filmes em
                                Cartaz</a>
                        </li>
                    </ul>
                    @auth
                        <a href={{ route('profile') }} class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/user-regular.png') }}" class="user-icon">
                        </a>
                    @else
                        <div class="navbar-text d-flex justify-content-center align-items-center gap-2">
                            <a href={{ route('signUp') }} class="p-2 button text-center">Criar Conta</a>
                            <a href={{ route('signIn') }} class="p-2 button text-center">Entrar</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- <footer class=""></footer> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
