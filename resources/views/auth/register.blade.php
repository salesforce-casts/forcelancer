<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <div>
                    <label class="text-base font-medium text-gray-900">Select the user type</label>
                    <p class="text-sm leading-5 text-gray-500">Forcelancer or Hirer? </p>
                    <fieldset class="mt-4">
                        <legend class="sr-only">User Type</legend>
                        <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                            <div class="flex items-center">
                                <x-input id="resource"
                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" type="radio"
                                    name="user_type" value="resource" autofocus checked/>
                                <label for="resource" class="ml-3 block text-sm font-medium text-gray-700"> Forcelancer
                                </label>
                            </div>

                            <div class="flex items-center">
                                <x-input id="hirer" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                    type="radio" name="user_type" value="hirer" autofocus />
                                <label for="hirer" class="ml-3 block text-sm font-medium text-gray-700"> Hirer
                                </label>
                            </div>
                    </fieldset>
                </div>


            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
