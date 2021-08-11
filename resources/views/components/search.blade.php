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
