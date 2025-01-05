<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la Réservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Informations sur la réservation</h3>
                    <p><strong>Étudiant : </strong> {{ $reservation->user->name }} ({{ $reservation->user->email }})</p>
                    <p><strong>Livre : </strong> {{ $reservation->livre->titre }} (Auteur : {{ $reservation->livre->auteur }})</p>
                    <p><strong>Date de réservation : </strong> {{ $reservation->date_reservation }}</p>
                    <p><strong>Date de retour : </strong> {{ $reservation->date_retour }}</p>
                    <p>
                        <strong>Statut : </strong>
                        @if ($reservation->status === 'en_cours')
                            <span class="text-blue-600">En cours</span>
                        @elseif ($reservation->status === 'rendu')
                            <span class="text-green-600">Rendu</span>
                        @elseif ($reservation->status === 'overdue')
                            <span class="text-red-600">En retard</span>
                        @endif
                    </p>
                    <div class="mt-6">
                        <form action="{{ route('bibliothecaire.reservations.updateStatus', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="status">Modifier le statut :</label>
                            <select name="status" id="status" class="form-select">
                                <option value="en_cours" {{ $reservation->status === 'en_cours' ? 'selected' : '' }}>En cours</option>
                                <option value="rendu" {{ $reservation->status === 'rendu' ? 'selected' : '' }}>Rendu</option>
                                <option value="overdue" {{ $reservation->status === 'overdue' ? 'selected' : '' }}>En retard</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
                        </form>
                    </div>
                    <a href="{{ route('bibliothecaire.reservations.index') }}" class="btn btn-secondary mt-6">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
