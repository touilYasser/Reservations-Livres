<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bibliothecaire Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container py-4">
                        <h1 class="mb-4 fw-bold lead">Tableau de bord du bibliothécaire</h1>
                    
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                        <h5>Total de Livres</h5>
                                        <h3>{{ $totalLivres }}</h3>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-3 mb-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h5>Livres Disponibles</h5>
                                        <h3>{{ $livresDisponibles }}</h3>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-3 mb-3">
                                <div class="card bg-warning text-dark">
                                    <div class="card-body">
                                        <h5>Livres Réservés</h5>
                                        <h3>{{ $livresReserves }}</h3>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-3 mb-3">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5>Réservations en retard</h5>
                                        <h3>{{ $reservationsEnRetard }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</x-app-layout>
