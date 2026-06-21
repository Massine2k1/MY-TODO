<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My-TODO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('post.index') }}">MY-TODO</a>
            <div class="collapse navbar-collapse d-flex align-items-center" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('post.index') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.create') }}">Nouvelle tache</a>
                    </li>
                </ul>

                @auth
                <div class="text-white px-2">Connecté en tant que <a href="{{ route('auth.profile') }}">{{ Auth::user()->name }}</a></div>
                <form action="{{ route('auth.logout') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Se déconnecter</button>
                </form>
                @endauth

                @guest                
                <div>
                    <a class="btn btn-outline-success" href="{{ route('auth.login') }}">Se connecter</a>
                </div>
                @endguest
            </div>
        </div>
    </nav>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>