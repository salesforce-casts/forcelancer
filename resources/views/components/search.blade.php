<div class="cs-search py-16 px lg:py-24">
    <div class="relative px-4 md:px-16 lg:px-32">
        <div class="relative">
            <h2 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">find a
                friend to pair program </h2>
            <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in, accusamus quisquam.</p>
        </div>
        <div class="grid grid-cols-4 gap-3">
            <div class="col-span-4 md:col-span-1 px-6 py-10">
                <form @submit.prevent="handleSearch">

                    <div>
                        <x-label for="Search" :value="__('Search')" />

                        <x-input id="search" class="block mt-1 mb-2 w-full" type="text" name="search" v-model="search"
                                 autofocus />
                    </div>

                    <div>
                        <x-label for="Tags" :value="__('Tags')" />
                        <div
                            class="inline-flex items-center px-2.5 py-0.5 mr-1 mt-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border hover:border-blue-800 cs-pills"
                            v-for="(tag,index) in tags" :key="tag.id" @click="handleTagsCollection">
                            @{{ tag.name }}
                        </div>
                    </div>
                    <!--
                    This example requires Tailwind CSS v2.0+

                    This example requires some changes to your config:

                    ```
                    // tailwind.config.js
                    module.exports = {
                        // ...
                        plugins: [
                        // ...
                        require('@tailwindcss/forms'),
                        ],
                    }
                    ```
                    -->
                    <div class="mt-4">
                        <x-label for="Type" :value="__('Type')" />

                        <fieldset>
                            <legend class="sr-only">
                                Privacy setting
                            </legend>
                            <div class="rounded-md -space-y-px">
                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                <label
                                    class="rounded-tl-md rounded-tr-md relative  p-.5 flex cursor-pointer focus:outline-none">
                                    <input type="radio" name="privacy-setting" value="Hourly" id="Hourly"
                                           class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                           aria-labelledby="privacy-setting-0-label"
                                           aria-describedby="privacy-setting-0-description" @click="handleType">
                                    <div class="ml-3 flex flex-col">
                                        <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                        <span id="privacy-setting-0-label" class="block text-sm font-medium">
                                    Hourly
                                </span>

                                    </div>
                                </label>

                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                <label class="relative  p-.5 flex cursor-pointer focus:outline-none">
                                    <input type="radio" name="privacy-setting" value="Weekly" id="Weekly"
                                           class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                           aria-labelledby="privacy-setting-1-label"
                                           aria-describedby="privacy-setting-1-description" @click="handleType">
                                    <div class="ml-3 flex flex-col">
                                        <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                        <span id="privacy-setting-1-label" class="block text-sm font-medium">
                                    Weekly
                                </span>

                                    </div>
                                </label>

                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                <label
                                    class="rounded-bl-md rounded-br-md relative  p-.5 flex cursor-pointer focus:outline-none">
                                    <input type="radio" name="privacy-setting" value="Monthly" id="Monthly"
                                           class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                           aria-labelledby="privacy-setting-2-label"
                                           aria-describedby="privacy-setting-2-description" checked @click="handleType">
                                    <div class="ml-3 flex flex-col">
                                        <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                        <span id="privacy-setting-2-label" class="block text-sm font-medium">
                                    Monthly
                                </span>

                                    </div>
                                </label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="mt-4">
                        <x-label for="range" :value="__('Price Range')" />

                        {{--  <x-input id="range"
                                 class="block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 cs-range-slider"
                                 type="range" name="range" min="1" max="100" step="1" value="15" required autofocus
                                 @input="handleRange" />
                        <div class="cs-range"></div>  --}}
                        <div class="range-slider ">
                            <div>
                                <span class="rangeValues"></span>
                            </div>
                            <input class="w-full" name="min_price" value="1000" min="1000" max="50000" step="500" type="range" >
                            <input class="w-full" name="max_price" value="50000" min="1000" max="50000" step="500" type="range">
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-label for="Country" :value="__('Location')" />
                        <select
                            class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                            @change="handleSelectedCountry">
                            <option value="">Select Country</option>
                            <option v-for="(country, index) in countries" :value=index>
                                @{{country}}
                            </option>
                        </select>
                    </div>
                    <div class="mt-2">

                        <x-button>
                            {{ __('Search') }}
                        </x-button>
                    </div>


                    <div class="mt-4">

                        <a @click="handleClear">clear</a>
                        {{--                        <a href="{{ route('search-resource') }}">clear</a>--}}
                    </div>

                </form>
            </div>

            <div class="py-10 col-span-4  md:col-span-3">
                <div class="grid grid-cols-1 gap-3 md:grid-cols-3 lg:grid-cols-4 sm:w-full">
                    <div class="p-4 rounded-md shadow-lg" v-for="(resource,index) in resources" :key="resource.id">
                        @{{ resource.name }}
                        @{{ resource.describe }}
                        <a :href="resource.url"> read more ...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                selectedCountry: 1,
                range: 0,
                type: 'Monthly'

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

                this.selectedTags = [];
                let hoveredTags = document.querySelectorAll('.cs-pills.border-blue-800');
                for (let item of hoveredTags) {
                    item.classList.toggle('border-blue-800');
                }
                document.querySelector('#Monthly').checked = true;
                document.querySelector('.cs-range-slider').value = 15;
                document.querySelector('.cs-range').innerHTML = 15;
                document.querySelector('select').selectedIndex = 0;
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

            handleSelectedCountry(event) {
                this.selectedCountry = event.target.value;
                console.log(this.selectedCountry);
            },
            handleRange(event) {
                this.range = event.target.value;
                document.querySelector('.cs-range').innerHTML = this.range;
                console.log(this.range);
            },
            handleType(event) {
                this.type = event.target.value;
                console.log(this.type);
            }
        }
    });
    const vm = app.mount('.cs-search');

</script>
