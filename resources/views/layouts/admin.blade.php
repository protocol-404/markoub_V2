<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('users.index') }}">Gestion Utilisateurs</a>
        <a href="{{ route('logout') }}">Déconnexion</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
