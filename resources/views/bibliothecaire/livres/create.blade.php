<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un nouveau livre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('bibliothecaire.livre.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="form-group my-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" name="titre" class="form-control">
                        </div>

                        <div class="form-group my-3">
                            <label for="auteur" class="form-label">Auteur</label>
                            <input type="text" name="auteur" class="form-control">
                        </div>
                        <input type="submit" value="Ajouter" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>