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

    <!-- Styles -->
    <style>
        input[type=range]::-webkit-slider-thumb {
            pointer-events: all;
            width: 24px;
            height: 24px;
            -webkit-appearance: none;
          
        /* @apply w-6 h-6 appearance-none pointer-events-auto; */
        }
    </style>
</head>

<body class="antialiased">
    <div class="relative pt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <nav class="relative flex items-center justify-between sm:h-10 md:justify-center" aria-label="Global">
                <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="#">
                            <span class="sr-only">Workflow</span>
                            <img class="h-8 w-auto sm:h-10"
                                 src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                        </a>
                        <div class="-mr-2 flex items-center md:hidden">
                            <button type="button"
                                    class="bg-gray-50 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                    aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <!-- Heroicon name: outline/menu -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex md:space-x-10">
                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Product</a>

                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Features</a>

                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Marketplace</a>

                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Company</a>
                    <a href="{{ route('search_resource') }}" class="font-medium text-gray-500 hover:text-gray-900">Search resource</a>
                </div>
                <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
          <span class="inline-flex rounded-md shadow">
            <a href="#"
               class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50"> Log in </a>
          </span>
                </div>
            </nav>
        </div>

        <div>
            <form method="" class="bg-smoke-dark p-6 md:p-10 rounded w-full shadow-lg" method="{{ route('search_resource') }}">
                @csrf
                <div class="flex">
                    
                    <div class="flex-1">
                        <div class="w-full pr-3 mb-3">
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <input type="search" name="keyword" id="" value="{{ request()->keyword }}" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title, skills, name, description..." >
                                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                            </div>
                            {{--  <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-password">Keywords</label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-password" type="search" placeholder="Sea view, infinity pool, spa bath">  --}}
                        </div>
                    </div>
                    <div class="flex-none my-2">
                        <a href="{{ route('search_resource') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            {{--  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>  --}}
                            <svg class="svg-icon fill-current w-4 h-4 mr-2" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M739.331866 397.979013a56.854145 56.854145 0 1 1 0-113.70829h95.571818C748.201113 168.686247 644.328591 113.708289 511.687871 113.708289a397.979013 397.979013 0 1 0 394.908889 447.783244 56.854145 56.854145 0 1 1 112.855477 14.042974A511.744156 511.744156 0 0 1 0.000569 511.687302a511.687302 511.687302 0 0 1 511.687302-511.687302c162.659708 0 293.13997 66.007662 397.979013 195.407695V113.935706a56.854145 56.854145 0 1 1 113.708289 0V341.124868a56.115041 56.115041 0 0 1-16.715118 40.19588 56.683582 56.683582 0 0 1-40.366443 16.658265h-226.961746z" fill="#191D3A" /></svg>
                            <span>Reset</span>
                        </a>
                    </div>
                </div>
                <div class="flex flex-wrap items-end -mx-3">
                    
                    
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                            Country
                        </label>
                        <div class="relative">
                            <select name="country" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-state">
                                <option value="null" >Select Country</option>
                                @foreach ($countries as $key => $country )
                                    <option value="{{ $key }}" {{$key == request()->country  ? 'selected' : ''}}>
                                        {{$country}}
                                    </option>
                                @endforeach
                            </select>
                            {{--  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>  --}}
                        </div>
                    </div>
                    
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                            Type
                        </label>
                        <div class="relative">
                            <select name="resourceRateType" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-state">
                                <option value="hourly" {{request()->resourceRateType == 'hourly'  ? 'selected' : ''}}>Hourly</option>
                                <option value="weekly" {{request()->resourceRateType == 'weekly'  ? 'selected' : ''}}>Weekly</option>
                                <option value="monthly" {{request()->resourceRateType == 'monthly'  ? 'selected' : ''}}>Monthly</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-state">
                            Price Range
                        </label>
                        <div class="">
                            <div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative max-w-xl w-full">
                                <div>
                                    <input name="minPrice" type="range" step="100" x-bind:min="min" x-bind:max="max" x-on:input="mintrigger" x-model="minprice" class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">
                            
                                    <input name="maxPrice" type="range" step="100" x-bind:min="min" x-bind:max="max" x-on:input="maxtrigger" x-model="maxprice" class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">
                            
                                    <div class="relative z-10 h-2">
                            
                                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                                
                                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-indigo-600 " x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
                                
                                        <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-indigo-600  rounded-full -mt-2" x-bind:style="'left: '+minthumb+'%'"></div>
                                
                                        <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-indigo-600  rounded-full -mt-2" x-bind:style="'right: '+maxthumb+'%'"></div>

                                    </div>
                            
                                </div>
                          
                                <div class="flex items-center justify-between pt-5 space-x-4 text-sm text-gray-700">
                                    <div>
                                        <input type="text" name="minPrice" maxlength="5" x-on:input.debounce="mintrigger" x-model="minprice"
                                        wire:model.debounce.300="minPrice"
                                        class="w-24 px-3 py-2 text-center border border-gray-200 rounded-lg bg-gray-50 focus:border-yellow-400 focus:outline-none">
                                    </div>
                                    <div>
                                        <input type="text" name="maxPrice" maxlength="5" x-on:input.debounce.300="maxtrigger" x-model="maxprice"
                                        wire:model.debounce="maxPrice"
                                        class="w-24 px-3 py-2 text-center border border-gray-200 rounded-lg bg-gray-50 focus:border-yellow-400 focus:outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

       
        <div class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
            <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="px-5 pt-4 flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                             alt="">
                    </div>
                    <div class="-mr-2">
                        <button type="button"
                                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="px-2 pt-2 pb-3">
                    <a href="#"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Product</a>

                    <a href="#"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Features</a>

                    <a href="#"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Marketplace</a>

                    <a href="#"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Company</a>
                </div>
                <a href="#"
                   class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                    Log in </a>
            </div>
        </div>
    </div>
    <div class="px-10 pb-10">
        <div class="grid grid-cols-4 gap-2 pt-11 ">
            @foreach ($resourceDetails as $resourceDetail)
                <div class="">
                    <div class="">
    
                        <div class="">
                            <div class="p-4 rounded-md shadow-lg">
                                Name :- <b>{{ $resourceDetail->user->name }}</b>
                                </br></br>
                                
                                Country :- {{ $resourceDetail->country->name }} 
                                </br></br>
                                Hourly :- {{ $resourceDetail->hourly_rate }} 
                                </br></br>
                                Weekly  :- <b>{{ $resourceDetail->weekly_rate }} </b>
                                </br></br>
                                Monthly :- <b> {{ $resourceDetail->monthly_rate }} </b>
                                </br></br>
                                Skills :- <b> {{ $resourceDetail->skills }} </b>
                                </br></br>
                                Describe :- 
                                <b> 
                                    {{ substr($resourceDetail->describe, 0, 80) }} 
                                    <a class="text-blue-600" href={{ route('show_profile', $resourceDetail->id) }}> read more ...</a>
                                </b>                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $resourceDetails->links() }}
    </div>


    <script>
        
        function range() {
            let min_rice = '{{ request()->minPrice }}';
            let max_price = '{{ request()->maxPrice }}';
            
            return {
                minprice: min_rice ? min_rice : 500,
                maxprice: max_price ? max_price : 100000,
                min: 500,
                max: 100000,
                minthumb: 0,
                maxthumb: 0,
                mintrigger() {
                    this.validation();
                    this.minprice = Math.min(this.minprice, this.maxprice - 500);
                    this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                },
                maxtrigger() {
                    this.validation();
                    this.maxprice = Math.max(this.maxprice, this.minprice + 200);
                    this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                },
                validation() {
                    if (/^\d*$/.test(this.minprice)) {
                        if (this.minprice > this.max) {
                            this.minprice = 9500;
                        }
                        if (this.minprice < this.min) {
                            this.minprice = this.min;
                        }
                    } else {
                        this.minprice = 0;
                    }
                        
                    if (/^\d*$/.test(this.maxprice)) {
                        if (this.maxprice > this.max) {
                            this.maxprice = this.max;
                        }
                        if (this.maxprice < this.min) {
                            this.maxprice = 200;
                        }
                    } else {
                        this.maxprice = 10000;
                    }
                }
            }
        }
        </script>
</body>


</html>
