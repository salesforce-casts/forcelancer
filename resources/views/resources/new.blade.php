<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Register Your Profile') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

@if ($errors->any())

                <div class="font-medium text-red-600">
                    {{ __('Whoops! Something went wrong.') }}
                </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                @endif
<form method="POST" action="{{ route('store_profile') }}">
    @csrf
    <!-- Email Address -->
    <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user['usr'] ?? old('name')" required autofocus />
    </div>
    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user['email'] ?? old('email')" required autofocus />
    </div>
    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="describe" :value="__('Describe Yourself')" />

        <x-text-area id="describe" class="block mt-1 w-full" type="text"  name="describe" :value="old('describe')" required autofocus />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="Country" :value="__('Location')" />

        <x-picklist id="country" class="block mt-1 w-full" name="country" :value="$countries ?? old('country')" required autofocus />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="Hourly Rate" :value="__('Hourly Rate')" />

        <x-input id="hourly_rate" class="block mt-1 w-full" type="number" name="hourly_rate" :value="0 ?? old('hourly_rate')"  autofocus />
    </div>
    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="Weekly Rate" :value="__('Weekly Rate')" />

        <x-input id="weekly_rate" class="block mt-1 w-full" type="number" name="weekly_rate" :value="0 ?? old('weekly_rate')"  autofocus />
    </div>
    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="Monthly Rate" :value="__('Monthly Rate')" />

        <x-input id="monthly_rate" class="block mt-1 w-full" type="number" name="monthly_rate" :value="0 ?? old('monthly_rate')"  autofocus />
    </div>

    <x-button class="mt-4">
        Create
    </x-button>

</form>
</div>
</div>
</div>
</div>
</x-app-layout>
