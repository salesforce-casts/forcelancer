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

<form method="POST" action="{{ route('create_profile') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
    </div>
    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
    </div>
    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="describe" :value="__('Describe Yourself')" />

        <x-input id="describe" class="block mt-1 w-full" type="text"  name="describe" :value="old('describe')" required autofocus />
    </div>
    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="Location" :value="__('Location')" />

        <x-input id="location" class="block mt-1 w-full" type="text"  name="location" :value="old('location')" required autofocus />
    </div>

</form>
</div>
</div>
</div>
</div>
</x-app-layout>
