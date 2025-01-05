<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliothèque en ligne</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100">
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Bibliothèque en ligne</h1>
            <nav>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-white px-4 py-2 bg-blue-700 rounded hover:bg-blue-800">Tableau de bord</a>
                @else
                    <a href="{{ route('login') }}" class="text-white px-4 py-2 bg-blue-700 rounded hover:bg-blue-800 fw-bold">Connexion</a>
                    <a href="{{ route('register') }}" class="ml-2 text-white px-4 py-2 bg-green-600 rounded hover:bg-green-700 fw-bold">Inscription</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-10">
        <h2 class="text-center text-3xl font-bold mb-4">Bienvenue sur notre plateforme de réservation de livres</h2>
        <p class="text-center text-gray-700 mb-6">Découvrez notre collection et réservez vos livres préférés en ligne.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-5">
            <div class="bg-white p-4 shadow-md rounded">
                <h3 class="text-lg font-semibold mb-2">Accès pour les étudiants</h3>
                <p class="text-gray-600 mb-4">Explorez nos collections, réservez des livres et suivez vos emprunts en cours.</p>
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se connecter</a>
            </div>
            <div class="bg-white p-4 shadow-md rounded">
                <h3 class="text-lg font-semibold mb-2">Accès pour les bibliothécaires</h3>
                <p class="text-gray-600 mb-4">Gérez la bibliothèque, les réservations et vérifiez les retours en attente.</p>
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se connecter</a>
            </div>
            <div class="bg-white p-4 shadow-md rounded">
                <h3 class="text-lg font-semibold mb-2">Pas encore inscrit ?</h3>
                <p class="text-gray-600 mb-4">Rejoignez-nous et commencez à réserver vos livres préférés dès aujourd'hui.</p>
                <a href="{{ route('register') }}" class="text-green-600 hover:underline">S'inscrire</a>
            </div>
        </div>
    </main>

    @include('components.footer')
</body>
</html>
