<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Réservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="font-bold text-2xl mb-4">Mes Réservations</h2>
                        <ul class="d-flex">
                            <li>En cours : {{ $enCours }}</li>
                            <li class="mx-3">Rendu : {{ $rendu }}</li>
                            <li>En retard : {{ $retard }}</li>
                        </ul>
                    </div>
                    <table class="table-auto w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-left">Titre du Livre</th>
                                <th class="border px-4 py-2 text-left">Auteur</th>
                                <th class="border px-4 py-2 text-left">Date de Réservation</th>
                                <th class="border px-4 py-2 text-left">Date de Retour</th>
                                <th class="border px-4 py-2 text-left">Status</th>
                                <th class="border px-4 py-2 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations as $reservation)
                                <tr>
                                    <td class="border px-4 py-2 align-middle">{{ $reservation->livre->titre }}</td>
                                    <td class="border px-4 py-2 align-middle">{{ $reservation->livre->auteur }}</td>
                                    <td class="border px-4 py-2 align-middle">{{ $reservation->date_reservation }}</td>
                                    <td class="border px-4 py-2 align-middle">{{ $reservation->date_retour }}</td>
                                    <td class="border px-4 py-2 align-middle">
                                        @if($reservation->status == 'en_cours')
                                            <span class="text-blue-600 font-medium">En cours</span>
                                        @elseif($reservation->status == 'rendu')
                                            <span class="text-green-600 font-medium">Rendu</span>
                                        @elseif($reservation->status == 'overdue')
                                            <span class="text-red-600 font-medium">En retard</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 align-middle">
                                        @if($reservation->status == 'en_cours')
                                            <form action="{{ route('etudiant.reservations.return', $reservation->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 fw-bold rounded">
                                                    Rendre
                                                </button>
                                            </form>
                                            <form action="{{ route('etudiant.reservations.destroy', $reservation->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 fw-bold rounded">
                                                    Annuler
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-500">Action non disponible</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-red-500 py-4">
                                        Vous n'avez aucune réservation pour le moment.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if($reservations->hasPages())
                        <div class="mt-6">
                            {{ $reservations->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</x-app-layout>
