<x-app-layout>
    <x-slot name="scripts">
        <script src="https://unpkg.com/vue@next"></script>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Start filling your portfolio') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="portfolios">
                        <form @submit.prevent="createPortfolio">
                            <div v-for="(input,k) in projects" :key="k">
                                <div class="mt-4">
                                    <x-label for="title" :value="__('Title')" />
                                    <x-input id="title" class="block mt-1 w-full" type="text" v-model="input.title" name="title" required autofocus />
                                </div>
                                <div class="mt-4">
                                    <x-label for="description" :value="__('What\'s some of the good work you have done')" />
                                    <x-text-area id="description" class="block mt-1 w-full" name="description" v-model="input.description" required autofocus />
                                </div>

                                <div class="mt-4">
                                    <x-label for="video_url" :value="__('Describe Yourself')" />
                                    <x-input id="video_url" class="block mt-1 w-full" type="text" v-model="input.video_url" for="video_url" required autofocus />
                                </div>

                                <span>
                                    <button @click="add(k)" v-show="k == projects.length-1">Add</button>
                                    <button @click="remove(k)" v-show="k || ( !k && projects.length > 1)">Remove</button>
                                </span>
                            </div>


                            <x-button class="ml-3">
                                Save
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>

        var app = Vue.createApp({
            data() {
                return {
                    projects: [
                        {
                            title : '',
                            description : '',
                            video_url : ''
                        }
                    ]
                }
            },
            methods: {
                add(index) {
                    this.projects.push({ title: '',
                            description : '',
                            video_url : '' });
                },
                remove(index) {
                    this.projects.splice(index, 1);
                },
                createPortfolio() {

                    axios
                    .post("{{ route('portfolio_store') }}", {
                        proj: this.projects
                    })
                    .then((result) => {
                        console.log(result);
                        // window.location.href = 'http://localhost:8000/dashboard';
                    })
                    .catch(er => {
                        console.log(er);
                    });

                }
            }
        });
        const vm  = app.mount('#portfolios');
    </script>
</x-app-layout>
