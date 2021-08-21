<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post a Review') }}
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
                    <form method="POST" action="{{ route('store_review') }}">
                        @csrf
                        <!-- Email Address -->
                        <div>
                            <x-label for="title" :value="__('Title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                                required autofocus />
                        </div>
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="review" :value="__('Review')" />

                            <x-text-area id="review" class="block mt-1 w-full" type="text" name="review"
                                :value="old('review')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <div class="flex" v-for="i in rating" id="cs-rating">

                                1
                                <img src="https://via.placeholder.com/150" />
                                {{-- <button type="button" v-for="i in 5" :class="{ 'mr-1': i < 5 }">
                                    <svg class="block h-8 w-8" :class="[ rating >= i ? 'text-blue': 'text-grey']"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                </button> --}}
                            </div>
                            {{-- <div class="flex justify-center items-center">
                                <div class="flex items-center mt-2 mb-4">
                                    <svg class="mx-1 w-4 h-4 fill-current text-yellow-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    <svg class="mx-1 w-4 h-4 fill-current text-yellow-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    <svg class="mx-1 w-4 h-4 fill-current text-yellow-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    <svg class="mx-1 w-4 h-4 fill-current text-yellow-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    <svg class="mx-1 w-4 h-4 fill-current text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                </div>
                            </div> --}}
                        </div>

                        <x-button class="mt-4">
                            Create
                        </x-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var app = Vue.createApp({
            data() {
                return {
                    rating: 3,
                }
            },
            methods: {

            }
        });
        const vm  = app.mount('#cs-rating');
    </script>
</x-app-layout>
