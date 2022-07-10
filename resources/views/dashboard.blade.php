<x-app-layout>
    <x-slot name="scripts">
        <script src="https://unpkg.com/vue@next"></script>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 cs-dahsboard-main">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!


                    <form method="POST" action="{{ route('create_profile') }}">
                        @if(!$resourceRegistered)
                            <div class="mt-4">
                                <a href="{{ route('create_profile') }}" class="text-sm text-gray-700 underline">

                                    {{ __('Register Your Profile') }}
                                </a>
                            </div>
                        @endif

                        @resource
                            <div class="mt-4">
                                <a href="{{ route('portfolio_list') }}" class="text-sm text-gray-700 underline">

                                    {{ __('Prepare your portfolio') }}
                                </a>
                            </div>
                        @endresource
                        <div class="mt-4">
                            {{--                            {{ isset($hirerResources) ? count($hirerResources) > 1 : '' }}--}}
                            {{--                            <x-timeline :hirerResources="$hirerResources"></x-timeline>--}}
                            <x-engagements :hirerResources="$hirerResources" :active="true"></x-engagements>
                            <x-engagements :hirerResources="$oldHirerResources" :active="false"></x-engagements>

                            <x-timeline :events="$events"></x-timeline>
                        </div>
                    </form>
                    {{--                    <div class="cs-hire-me">--}}
                    {{--                        <x-button @click="show">Hire</x-button>--}}
                    {{--                    </div>--}}
                    {{-- <button>Hey</button> --}}

                </div>

                <!-- This example requires Tailwind CSS v2.0+ -->
                {{--                <div class="fixed inset-0 overflow-hidden cs-hide invisible" aria-labelledby="slide-over-title"--}}
                {{--                    role="dialog" aria-modal="true">--}}
                {{--                    <div class="absolute inset-0 overflow-hidden">--}}
                {{--                        <!-- Background overlay, show/hide based on slide-over state. -->--}}
                {{--                        <div class="absolute inset-0" aria-hidden="true"></div>--}}

                {{--                        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">--}}
                {{--                            <!----}}
                {{--                                Slide-over panel, show/hide based on slide-over state.--}}

                {{--                                Entering: "transform transition ease-in-out duration-500 sm:duration-700"--}}
                {{--                                    From: "translate-x-full"--}}
                {{--                                    To: "translate-x-0"--}}
                {{--                                Leaving: "transform transition ease-in-out duration-500 sm:duration-700"--}}
                {{--                                    From: "translate-x-0"--}}
                {{--                                    To: "translate-x-full"--}}
                {{--                            -->--}}
                {{--                            <div class="w-screen max-w-md">--}}
                {{--                                <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">--}}
                {{--                                    <div class="py-6 px-4 bg-indigo-700 sm:px-6">--}}
                {{--                                        <div class="flex items-center justify-between">--}}
                {{--                                            <h2 class="text-lg font-medium text-white" id="slide-over-title">--}}
                {{--                                                Panel title--}}
                {{--                                            </h2>--}}
                {{--                                            <div class="ml-3 h-7 flex items-center">--}}
                {{--                                                <button--}}
                {{--                                                    class="bg-indigo-700 rounded-md text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"--}}
                {{--                                                    @click="hide">--}}
                {{--                                                    <span class="sr-only">Close panel</span>--}}
                {{--                                                    <!-- Heroicon name: outline/x -->--}}
                {{--                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"--}}
                {{--                                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">--}}
                {{--                                                        <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
                {{--                                                    </svg>--}}
                {{--                                                </button>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="mt-1">--}}
                {{--                                            <p class="text-sm text-indigo-300">--}}
                {{--                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit aliquam ad hic--}}
                {{--                                                recusandae soluta.--}}
                {{--                                            </p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="relative flex-1 py-6 px-4 sm:px-6">--}}
                {{--                                        <!-- Replace with your content -->--}}
                {{--                                        <div class="absolute inset-0 py-6 px-4 sm:px-6">--}}
                {{--                                            <div class="h-full border-2 border-dashed border-gray-200"--}}
                {{--                                                aria-hidden="true"></div>--}}
                {{--                                        </div>--}}
                {{--                                        <!-- /End replace -->--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

            </div>
        </div>
    </div>

    <script>
        // var app = Vue.createApp({
        //     methods: {
        //         show(event) {
        //             document.querySelector('.cs-hide').classList.remove('invisible');
        //         },
        //
        //         hide(event){
        //             document.querySelector('.cs-hide').classList.add('invisible');
        //         }
        //     }
        // });
        // const vm  = app.mount('.cs-dahsboard-main');
    </script>
</x-app-layout>
