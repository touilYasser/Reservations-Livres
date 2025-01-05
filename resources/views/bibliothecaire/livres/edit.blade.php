<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un livre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('bibliothecaire.livre.update',$livre->id) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group my-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" name="titre" class="form-control" value="{{$livre->titre}}">
                        </div>

                        <div class="form-group my-3">
                            <label for="auteur" class="form-label">Auteur</label>
                            <input type="text" name="auteur" class="form-control" value="{{$livre->auteur}}">
                        </div>
                        <input type="submit" value="Modifier" class="btn btn-warning fw-bold">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</x-app-layout>