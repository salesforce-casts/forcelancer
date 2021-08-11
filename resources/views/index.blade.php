<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>


    <script src="https://unpkg.com/vue@next"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->

</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif
        <div class="cs-search">
            <div>
                <form @submit.prevent="handleSearch">
                    <x-input id="search" class="block mt-1 w-full" type="text" name="search" v-model="search" required
                        autofocus />
                    <x-button class="mt-4">
                        {{ __('Search') }}
                    </x-button>
                    <a class="ml-3" @click="handleClear">clear</a>


                </form>
            </div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" grid grid-cols-3 gap-4">
                        <div class="p-4 border border-red-300" v-for="(resource,index) in resources" :key="resource.id">
                            @{{ resource.name }}
                            @{{ resource.describe }}

                            {{-- https://laracasts.com/discuss/channels/vue/add-route-parameter-with-vuejs --}}
                            <a href="/profile/show/@{{ resource.id }}"> read more ...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var app = Vue.createApp({
            data(){
                return {
                    search : '',
                    resources : [],
                }
            },
            created(){
                    this.handleInit();
            },
            methods: {
                handleInit(){
                    fetch(" {{ route('search') }} ")
                    .then((res) => {
                        return res.json();
                    })
                    .then((res) => {
                        this.resources = res;
                        console.log(res);
                    })
                    .catch( (error) => {
                        console.log(error);
                    })
                },
                handleSearch() {

                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch("{{ route('search') }}?" + new URLSearchParams({
                        query: this.search
                    }))
                    .then((res) => {
                        return res.json();
                    })
                    .then((res) => {
                        this.resources = res;
                        console.log(res);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
                },
                handleClear(){
                    // this.resources = '';
                    this.handleInit();
                }
            }
        });
        const vm  = app.mount('.cs-search');

    </script>
</body>

</html>
