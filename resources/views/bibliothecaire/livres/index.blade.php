<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight d-flex justify-content-between align-items-center">
            <h2>{{ __('Liste des Livres') }}</h2>
            <a href="{{route('bibliothecaire.livre.create')}}" class="btn btn-primary fw-bold">Ajouter un livre</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Auteur</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($livres as $livre)
                                <tr>
                                    <td class="align-middle">{{ $livre->titre }}</td>
                                    <td class="align-middle">{{ $livre->auteur }}</td>
                                    @if ($livre->status == 'disponible')
                                        <td class="align-middle text-success">{{ $livre->status }}</td>
                                    @else
                                        <td class="align-middle text-secondary">{{ $livre->status }}</td>
                                    @endif
                                    <td class="align-middle">
                                        <a href="{{ route('bibliothecaire.livre.edit', $livre->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                        <form action="{{ route('bibliothecaire.livre.destroy', $livre->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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
</x-app-layout>