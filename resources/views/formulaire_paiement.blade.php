<x-guest-layout  >

    <form  method="POST" action="{{ route('register') }}">

        @csrf


        <!-- Prénom -->
        <div>
            <x-input-label for="fname" :value="__('Prénom')" />
            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required  />
            <x-input-error :messages="$errors->get('fname')" class="mt-1" />
        </div>

        <!-- Nom -->
        <div class="mt-1">
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email -->
        <div class="mt-1">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Mot de passe -->
        <div class="mt-1">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirmation mot de passe -->
        <div class="mt-1">
            <x-input-label for="password_confirmation" :value="__('Confirmer mot de passe')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required  />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Téléphone -->
        <div class="mt-1">
            <x-input-label for="phone" :value="__('Téléphone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"  />
            <x-input-error :messages="$errors->get('phone')" class="mt-1" />
        </div>

        <!-- Ville -->
        <div class="mt-1">
            <x-input-label for="city" :value="__('Ville')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" required />
            <x-input-error :messages="$errors->get('city')" class="mt-1" />
        </div>

        <!-- Adresse -->
        <div class="mt-1">
            <x-input-label for="add" :value="__('Adresse')" />
            <x-text-input id="add" class="block mt-1 w-full" type="text" name="add" required />
            <x-input-error :messages="$errors->get('add')" class="mt-1" />
        </div>
        <!-- Complément adresse -->
        <div class="mt-1">
            <x-input-label for="add2" :value="__('Complément adresse')" />
            <x-text-input id="add2" class="block mt-1 w-full" type="text" name="add2" />
            <x-input-error :messages="$errors->get('add2')" class="mt-1" />
        </div>

        <!-- Code Postal-->
        <div class="mt-1">
            <x-input-label for="postcode" :value="__('Code Postal')" />
            <x-text-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" />
            <x-input-error :messages="$errors->get('postcode')" class="mt-1" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déja un compte ?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>

        </div>


    </form>
</x-guest-layout>
