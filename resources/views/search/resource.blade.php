@section('css')

@endsection

<x-semi-app-layout>
    <x-slot name="scripts">
        <script src="https://unpkg.com/vue@next"></script>
    </x-slot>

    <div class="bg-white-100 p-6 md:mt-16">

        <h1 class="h5" style="text-align: center;">Find a Friend to Pair a Program</h1>
        <h3 class="mt-3" style="text-align: center;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            <br>
            incididunt ut labore et dolore magna aliqua.
        </h3>
    </div>
    

    <div class="flex flex-row flex-wrap w-11/12 m-auto cs-search">
        
        <!-- start sidebar -->
        <div id="sideBar"
            class="relative flex flex-col flex-wrap bg-white border-gray-300 p-6 flex-none mr-12 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
            <form @submit.prevent="handleSearch">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">
                    Search
                </label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block p-1 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Here" v-model="search" required style="background:#f7f7fc;">
                </div>
            
                <div class=" lg:w-full lg:mb-5">
                    <!-- top -->
                    <div class="pt-5 pb-5 flex flex-row flex-wrap justify-between items-center">
                        <div class="flex flex-row justify-center items-center tag-btn">
                            <template v-for="(tag,index) in tags" :key="tag.id">
                                <button type="button" class="btn-gray mr-4 text-sm py-2 block"  @click="handleSelectedTag($event, tag.id)">
                                    @{{ tag.name }}
                                </button>
                            </template>
                            {{--  <button class="btn-indigo mr-4 text-sm py-2 block">Service Cloud</button>  --}}
                        </div>
                    </div>
                    <fieldset>
                        <div class="relative pt-1">
                            <label for="customRange1" class="form-label">Type</label>
                            <div class="flex items-center mb-4 mt-3 pt-2 pb-1 pl-1 pr-1 border-t">
                                <input id="country-option-1" type="radio" v-model="type" value="Hourly"
                                    class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                                    aria-labelledby="country-option-1" aria-describedby="country-option-1">
                                <label for="country-option-1" class="text-sm font-medium text-gray-900 ml-2 block">
                                    Hourly
                                </label>
                            </div>
                            <div class="flex items-center mb-4 p-1">
                                <input id="country-option-2" type="radio" v-model="type" value="Weekly"
                                    class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                                    aria-labelledby="country-option-2" aria-describedby="country-option-2">
                                <label for="country-option-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                    Weekly
                                </label>
                            </div>
                            <div class="flex items-center mb-4 p-1">
                                <input id="country-option-3" type="radio" v-model="type" value="Monthly"
                                    class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                                    aria-labelledby="country-option-3" aria-describedby="country-option-3">
                                <label for="country-option-3" class="text-sm font-medium text-gray-900 ml-2 block">
                                    Monthly
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="relative pt-1">
                        <label for="customRange1" class="form-label mb-2">Price Range</label>
                        <div>
                            <input type="range" min="0" max="100000" class="range w-full" v-model="range" />
                            <div class="w-full flex justify-between text-xs px-2">
                                <span>0</span>
                                <span>@{{ range }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="max-w-lg py-2 pt-3 ">
                        <button
                            class="btn-indigo focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center w-64"
                            type="button" data-dropdown-toggle="dropdown" @click="countryDropDown = !countryDropDown">
                            
                            @{{ selectedCountryName ?? 'Select Country' }}

                            <svg class="w-4 h-4 ml-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div v-show="countryDropDown" class="bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4"
                            id="dropdown">
                            <ul class="py-1" aria-labelledby="dropdown">
                                <template v-for="(country, index) in countries" >

                                    <li @click="handleSelectedCountry(index, country)" class="text-sm  hover:bg-gray-100 text-gray-700 block px-4 py-3">
                                        @{{ country }}
                                        {{--  <button class="" >
                                        </button>  --}}
                                    </li>
                                </template>
                            </ul>
                        </div>
                        <div class="flex-none w-56 flex flex-row items-center py-4">
                            <button @click="" class="btn-shadow w-64">
                                Search
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-row flex-wrap justify-between items-center m-auto w-6/12">
                        <label style="color:#F04461;" @click="handleClear">Clear All</label>
                        <img src="img/Button-img.png" class="object-cover" @click="handleClear">
                    </div>

                    {{--  <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>  --}}

                    <!-- sidebar content -->
                    <div class="flex flex-col">

                        <!-- sidebar toggle -->
                        <div class="text-right hidden md:block mb-4">
                            <button id="sideBarHideBtn">
                                <i class="fad fa-times-circle"></i>
                            </button>
                        </div>
                        <!-- end sidebar toggle -->




                        <!-- end link -->



                    </div>
                    <!-- end sidebar content -->

                </div>
            </form>
            <!-- end sidbar -->

            <!-- strat content -->

            <!-- end content -->

        </div>

        <div class="flex-1">
            <div>
                <h2 class="h6 ml-5">Freelancers</h2>
            </div>
            
            <div
                class="grid grid-cols-3 gap-10 m-5 lg:grid-cols-1 relative flex-1 border-gray-300 p-6x h-full md:shadow-xl animated faster">

                <div class="card col-span-1 shadow-2xl" v-for="(resource,index) in resources" :key="resource.id">

                    <div class="card-body">
                        <div
                            class="card flex px-2 bg-gray-100 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                            <div class="w-16 overflow-hidden rounded-full">
                                <img src="{{asset('img/user.svg')}}" class="object-cover">
                            </div>

                            <figcaption class="font-medium  justify-between items-center">
                                <p class="ml-1 ">
                                    @{{  resource.name ??  'NA' }}
                                </p>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">5</p>
                                </div>
                            </figcaption>

                            <div class="w-full flex justify-end">
                                <div class="m-2 p-2 btn-indigo">
                                    {{--  $22/hour  --}}
                                    $@{{ resource.hourly_rate }}/hour
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="text-center pb-2">
                        <p class="pl-4 pr-4">
                            @{{ resource.describe }}
                        </p>
                    </div>

                    <div class="items-center m-auto">
                        <div class="text-center flex flex-row justify-center items-center m-auto w-11/12">
                            <a href="#" class="btn-indigo mr-4 text-sm py-2 block">Sales Force</a>
                            <a href="#" class="btn-indigo text-sm py-2 block">Service Cloud</a>
                        </div>
                    </div>

                </div>

                <div class="col-span-3">
                    <div class="btn w-4/12 m-auto">Show More</div>
                </div>
            </div>
            {{--  <div class="btn w-4/12 m-auto card col-span-2 ">Show More</div>  --}}
        </div>
        <!-- end wrapper -->

        <!-- script -->
        {{--  <script src="js/scripts.js"></script>  --}}

        <!-- end script -->
    </div>

    <script>
        function getVals(){
            // Get slider values
            let parent = this.parentNode;
            let slides = parent.getElementsByTagName("input");
            let slide1 = parseFloat( slides[0].value );
            let slide2 = parseFloat( slides[1].value );
            // Neither slider will clip the other, so make sure we determine which is larger
            if( slide1 > slide2 ){ let tmp = slide2; slide2 = slide1; slide1 = tmp; }
            
            let displayElement = parent.getElementsByClassName("rangeValues")[0];
            displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
        }
          
        window.onload = function(){
            // Initialize Sliders
            let sliderSections = document.getElementsByClassName("range-slider");
            for( let x = 0; x < sliderSections.length; x++ ){
                let sliders = sliderSections[x].getElementsByTagName("input");
                for( let y = 0; y < sliders.length; y++ ){
                    if( sliders[y].type ==="range" ){
                        sliders[y].oninput = getVals;
                        // Manually trigger event first time to display values
                        sliders[y].oninput();
                    }
                }
            }
        }
        var app = Vue.createApp({
            data() {
                return {
                    search: '',
                    resources: [],
                    tags: [],
                    selectedTags: [],
                    countries: [],
                    selectedCountry: null,
                    range: 50000,
                    type: 'Monthly',
                    countryDropDown: false,
                    selectedCountryName: null,    
                };
            },
            created() {
                this.handleInit();
            },
            mounted() {
                {{--  document.querySelector('.cs-range').innerHTML = document.querySelector('#range').value;  --}}
            },
            methods: {
                handleInit() {
                    Promise.all([
                        fetch(" {{ route('search') }} "),
                        fetch(" {{ route('tags') }} "),
                        fetch(" {{ route('countries') }} ")
                    ])
                        .then((res) => {
                            return Promise.all(res.map(function(response) {
                                return response.json();
                            }));
                        })
                        .then((res) => {
                            this.resources = res[0];
                            this.tags = res[1];
                            this.countries = res[2];
                            console.log(res);
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },
                handleSearch() {
    
                    fetch("{{ route('search') }}?" + new URLSearchParams({
                        search: this.search,
                        country: this.selectedCountry,
                        tags: this.selectedTags,
                        type: this.type,
                        range: this.range
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
                handleClear() {
                    this.handleInit();
                    this.search = '';
                    this.selectedCountry = this.selectedCountryName =null;
                    this.range = 50000;
                    this.type = 'Monthly';
                    this.selectedTags = [];
                    document.querySelectorAll('.tag-btn .btn-indigo').forEach(el => {
                        el.classList.remove('btn-indigo');
                        el.classList.add('btn-gray');
                    });

                    
                    {{--  document.getElementsByClassName('tag-btn').classList.add('btn-gray');  --}}

                    {{--  let hoveredTags = document.querySelectorAll('.cs-pills.border-blue-800');  --}}
                    {{--  for (let item of hoveredTags) {
                        item.classList.toggle('border-blue-800');
                    }  --}}
                    {{--  document.querySelector('#Monthly').checked = true;  --}}
                    {{--  document.querySelector('.cs-range-slider').value = 15;  --}}
                    {{--  document.querySelector('.cs-range').innerHTML = 15;  --}}
                    {{--  document.querySelector('select').selectedIndex = 0;  --}}
                },
                handleTagsCollection(event) {
                    event.target.classList.toggle('border-blue-800');
                    let clickedOn = event.target.innerHTML;
                    let index = this.selectedTags.indexOf(clickedOn);
    
                    if (index === -1) {
                        this.selectedTags.push(clickedOn);
                    } else {
                        this.selectedTags.splice(index, 1);
                    }
                },

                handleSelectedTag(event, id) {
                    let index = this.selectedTags.indexOf(id);
                    if (index === -1) {
                        event.target.classList.remove('btn-gray');
                        event.target.classList.add('btn-indigo');
                        this.selectedTags.push(id);
                    } else {
                        event.target.classList.remove('btn-indigo');
                        event.target.classList.add('btn-gray');
                        this.selectedTags.splice(index, 1);
                    }
                },
    
                handleSelectedCountry(id, name) {
                    console.log(id, name);
                    {{--  this.selectedCountry = event.target.value;  --}}
                    this.selectedCountry = id;
                    this.selectedCountryName = name;
                    this.countryDropDown = false;
                },
                handleRange(event) {
                    this.range = event.target.value;
                    document.querySelector('.cs-range').innerHTML = this.range;
                    console.log(this.range);
                },
                handleType(event) {
                    this.type = event.target.value;
                    console.log(this.type);
                },
            }
        });
        const vm = app.mount('.cs-search');
    
    </script>
</x-semi-app-layout>
