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
    <div class="bg-white">
        <div class="flex flex-row flex-wrap items-center bg-white w-10/12 flex  m-auto md:mt-16 pt-6 pb-6">
            <div class="flex flex-row flex-wrap justify-between items-center">
                <div class="flex flex-row justify-center items-center">
                    <a href="#" class="btn mr-4 text-sm py-2 block">You are logged in!! </a>
                </div>
            </div>
        </div>

        <div class="w-10/12 m-auto mb-6 pt-6 pb-6">
            <h2 class="h5">Timeline</h2>
        </div>

        <div class=" w-10/12 m-auto flex flex-row flex-wrap md:w-full md:block">
            <div class="flex card w-7/12 md:block md:w-full shadow-2xl mr-2">
                <div
                    class="w-full relative flex flex-col flex-wrap border-gray-300 flex-none ml-30 md:shadow-xl animated faster">
                    <div class="w-full  col-span-1 ">
                        <x-timeline :events="$events"></x-timeline>
                    </div>
                </div>
            </div>
            <div class="w-4/12 ml-6 md:w-full">
                <div
                    class=" btn card relative flex flex-col flex-wrap border-gray-300 flex-none md:shadow-xl animated faster">
                    <div class=" w-full p-4">
                        <p class="text-left" style="color:white;">Welcome Back,</p>
                        <h2 class="text-left" style="color:white;">
                            {{ auth()->user()->name }}
                        </h2>
                    </div>
                    @if(!$resourceRegistered)
                        <div class="card p-4 m-2">
                            <div class="flex justify-between mb-1">
                                <a href="{{ route('create_profile') }}" class="text-base font-medium text-blue-700 dark:text-white">
                                    {{ __('Register Your Profile') }}
                                </a>
                                <span class="text-sm font-medium text-blue-700 dark:text-white">45%</span>
                            </div>
                            <div class="w-full bg-gray-200 h-1 mb-6">
                                <div class="bg-blue-600 h-1" style="width: 50%"></div>
                            </div>
                        </div>
                    @endif
                    
                </div>
                <div class="card p-2 mt-2" style="border-radius:0px!important;">
                    <div class="card flex justify-between mb-1 bg-gray-100 p-2">
                        <a href="{{ route('portfolio_list') }}" class="text-base font-medium dark:text-white">
                            {{ __('Prepare your portfolio') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex w-10/12 m-auto md:w-full md:block">
            <div class="w-5/12 md:w-full md:block">
                <div class=" w-6/12 bg-white-100 pt-6 pb-6 md:w-full md:block">
                    <h2 class="h5">Ongoing Projects</h2>
                </div>
                <x-engagements :hirerResources="$hirerResources" :active="true"></x-engagements>
            </div>

            <div class="w-5/12 ml-auto md:w-full md:block">
                <div class=" w-6/12 bg-white-100 pt-6 pb-6 md:w-full md:block">
                    <h2 class="h5">Completed Projects</h2>
                </div>
                <x-engagements :hirerResources="$oldHirerResources" :active="false"></x-engagements>
            </div>
        </div>
    </div>

</x-app-layout>
