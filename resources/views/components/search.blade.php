<div class="cs-search">
    <div>
        <form @submit.prevent="handleSearch">

            <div>
                <x-label for="Search" :value="__('Search')" />

                <x-input id="search" class="block mt-1 w-full" type="text" name="search" v-model="search" required
                    autofocus />
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
            <div class="mt-4" style="width: 50%">
                <x-label for="Type" :value="__('Type')" />

                <fieldset>
                    <legend class="sr-only">
                        Privacy setting
                    </legend>
                    <div class="rounded-md -space-y-px">
                        <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                        <label
                            class="rounded-tl-md rounded-tr-md relative  p-.5 flex cursor-pointer focus:outline-none">
                            <input type="radio" name="privacy-setting" value="Public access"
                                class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                aria-labelledby="privacy-setting-0-label"
                                aria-describedby="privacy-setting-0-description">
                            <div class="ml-3 flex flex-col">
                                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                <span id="privacy-setting-0-label" class="block text-sm font-medium">
                                    Hourly
                                </span>

                            </div>
                        </label>

                        <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                        <label class="relative  p-.5 flex cursor-pointer focus:outline-none">
                            <input type="radio" name="privacy-setting" value="Private to Project Members"
                                class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                aria-labelledby="privacy-setting-1-label"
                                aria-describedby="privacy-setting-1-description">
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
                            <input type="radio" name="privacy-setting" value="Private to you"
                                class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                aria-labelledby="privacy-setting-2-label"
                                aria-describedby="privacy-setting-2-description" checked>
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
                <x-input id="range" class="block mt-1" type="number" name="range" required autofocus />
            </div>
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
                    <a href="/profile/show/@{{ resource.id }}" class="cursor-pointer"> read more ...</a>
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
            this.search = '';
            this.handleInit();
        }
    }
});
const vm  = app.mount('.cs-search');

</script>
