<x-guest-layout  >

    <form  method="POST" action="{{ route('register2') }}">

        @csrf

        <!-- Téléphone -->
        <div class="mt-1">
            <x-input-label for="phone" :value="__('Téléphone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" required />
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
                {{ __('Déjà inscrit?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>

        </div>

    </form>
</x-guest-layout>

