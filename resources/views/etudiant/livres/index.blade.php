<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Livres Disponible') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <h2 class="fw-bold lead">Reserver un livre</h2>
                   <table class="table table-hovered mt-4">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($livres as $livre)
                            <tr>
                                <td class="align-middle">{{ $livre->titre }}</td>
                                <td class="align-middle">{{ $livre->auteur }}</td>
                                <td class="align-middle text-success">{{ $livre->status }}</td>
                                <td class="align-middle">
                                    <form method="POST" action="{{ route('etudiant.reservations.store', $livre->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Réserver
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">Aucun livre n'est disponible pour le moment</td>
                            </tr>
                        @endforelse
                                
                    </tbody>
                   </table>
                   <div class="mt-6">
                    {{ $livres->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</x-app-layout>