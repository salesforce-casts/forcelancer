<div class="cs-search py-16 px lg:py-24">
    <div class="relative px-4 sm:px-6 lg:px-8">
        <div class="relative">
            <h2 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">find a
                friend to pair program </h2>
            <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-500">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in, accusamus quisquam.</p>
        </div>
        <div class="lg:grid-rows-10 lg:grid lg:grid-flow-col lg:gap-4">
            <div class="row-span-10 px-6 py-10">
                <form @submit.prevent="handleSearch">

                    <div>
                        <x-label for="Search" :value="__('Search')" />

                        <x-input id="search" class="block mt-1 w-48" type="text" name="search" v-model="search"
                                 autofocus />
                    </div>

                    <div>
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
                                    <input type="radio" name="privacy-setting" value="Hourly"
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
                                    <input type="radio" name="privacy-setting" value="Weekly"
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
                                    <input type="radio" name="privacy-setting" value="Monthly"
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
                        <x-input id="range"
                                 class="block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                 type="range" name="range" min="1" max="100" step="1" value="15" required autofocus
                                 @input="handleRange" />
                        <div class="cs-range"></div>
                    </div>

                    <div class="mt-4">
                        <x-label for="Country" :value="__('Location')" />
                        <select
                            class="block mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-48"
                            @change="handleSelectedCountry">
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
                    </div>

                </form>
            </div>

            <div class="col-span-2 row-span-10 py-10">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <div class="md:grid md:grid-cols-2 md:gap-4 lg:grid lg:grid-cols-3 lg:gap-4">
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

</div>

<script>
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
                this.search = '';
                this.handleInit();
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

            handleSelectedCountry() {
                this.selectedCountry = event.target.value;
                console.log(this.selectedCountry);
            },
            handleRange() {
                this.range = event.target.value;
                document.querySelector('.cs-range').innerHTML = this.range;
                console.log(this.range);
            },
            handleType() {
                this.type = event.target.value;
                console.log(this.type);
            }
        }
    });
    const vm = app.mount('.cs-search');

</script>
