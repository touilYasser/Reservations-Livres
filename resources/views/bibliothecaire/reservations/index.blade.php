<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Réservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-hover mt-4">
                        <thead>
                            <tr>
                                <th>Étudiant</th>
                                <th>Titre du Livre</th>
                                <th>Date de Réservation</th>
                                <th>Date de Retour</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td class="align-middle">{{ $reservation->user->name }}</td>
                                    <td class="align-middle">{{ $reservation->livre->titre }}</td>
                                    <td class="align-middle">{{ $reservation->date_reservation }}</td>
                                    <td class="align-middle">{{ $reservation->date_retour }}</td>
                                    <td class="align-middle">
                                        <form action="{{ route('bibliothecaire.reservations.updateStatus', $reservation->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select" onchange="this.form.submit()">
                                                <option value="en_cours" {{ $reservation->status === 'en_cours' ? 'selected' : '' }}>En cours</option>
                                                <option value="rendu" {{ $reservation->status === 'rendu' ? 'selected' : '' }}>Rendu</option>
                                                <option value="overdue" {{ $reservation->status === 'overdue' ? 'selected' : '' }}>En retard</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('bibliothecaire.reservations.show', $reservation->id) }}" class="btn btn-primary btn-sm fw-bold">Voir détails</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{ $reservations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
