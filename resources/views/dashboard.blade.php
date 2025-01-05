<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container py-4">
                        <h1 class="mb-4 lead fw-bold">Bienvenue, {{ Auth::user()->name }}</h1>
                    
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h5>Réservations en cours</h5>
                                        <h3>{{ $reservationsEnCours }}</h3>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-4 mb-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5>Réservations rendues</h5>
                                        <h3>{{ $reservationsRendues }}</h3>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-4 mb-3">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5>Réservations en retard</h5>
                                        <h3>{{ $reservationsEnRetard }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="mt-4">
                            <h3 class="mb-3 lead fw-bold">Livres Disponibles</h3>
                            <ul class="list-group">
                                @foreach ($livresDisponibles as $livre)
                                    <li class="list-group-item">
                                        {{ $livre->titre }} par {{ $livre->auteur }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</x-app-layout>
