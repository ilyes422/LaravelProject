@extends('admin.layout')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur !</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="mt-1">
                <x-input-label for="name" :value="__('Nom')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <div class="mt-1">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                <x-input-error :messages="$errors->get('description')" class="mt-1" />
            </div>

            <div class="mt-1">
                <x-input-label for="image" :value="__('Image')" />
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required />
                <x-input-error :messages="$errors->get('image')" class="mt-1" />
            </div>

            <div class="mt-1">
                <x-input-label for="price" :value="__('Prix')" />
                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                <x-input-error :messages="$errors->get('price')" class="mt-1" />
            </div>

            <div class="mt-1">
                <x-input-label for="categorie_id" :value="__('Categorie')" />
                <x-text-input id="categorie_id" class="block mt-1 w-full" type="number" name="categorie_id" :value="old('categorie_id')" required />
                <x-input-error :messages="$errors->get('categorie_id')" class="mt-1" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('products.index') }}">
                    {{ __('Revenir à l\'accueil') }}
                </a>
                <x-primary-button class="ml-4">
                    {{ __('Envoyer') }}
                </x-primary-button>

            </div>

        </div>

    </form>
@endsection
