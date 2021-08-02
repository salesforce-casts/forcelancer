<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!


                    <form method="POST" action="{{ route('create_profile') }}">

                        <div class="mt-4">
                        <a href="{{ route('create_profile') }}" class="text-sm text-gray-700 underline">

                            {{ __('Register Your Profile') }}
                        </a>
                        </div>
                        <div class="mt-4">
                        <a href="{{ route('portfolio_list') }}" class="text-sm text-gray-700 underline">

                            {{ __('Prepare your portfolio') }}
                        </a>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
