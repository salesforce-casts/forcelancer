<x-semi-app-layout>
    <x-slot name="script">
        <script src="https://unpkg.com/vue@next"></script>
        {{-- <script src="https://js.stripe.com/v3/"></script> --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </x-slot>

    <div class="cs-dahsboard-main ">
        <!-- start wrapper -->

        <div class="px-10 pt-5 hidden login-alert">
            <div class="flex p-4 mb-4 bg-red-100 border-t-4 justify-center border-red-500 dark:bg-red-200" role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="ml-3 text-sm font-medium text-red-700">
                You need to do login for "Avilable to hire" <a href="{{ route('login') }}" class="font-semibold underline hover:text-red-800">Login</a>. Give it a click if you want to do login.
                </div>
            </div>
        </div>

        <div
            class="flex flex-row flex-wrap items-center bg-white w-10/12 flex items-center justify-center m-auto md:mt-16 p-6">
            <div class="flex-none w-56 flex flex-row items-center">
                <img src="{{asset('img/user.svg')}}" class="w-10 flex-none">
                <strong class="ml-1 flex-1">
                    {{ $resource->name }}
                </strong>
            </div>

            <div id="navbar"
                class="animated md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
                <!-- left -->
                <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly">
                    <!--  <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-envelope-open-text"></i></a>        
                        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-comments-alt"></i></a>        
                        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-check-circle"></i></a>        
                        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-calendar-exclamation"></i></a>        
                    -->
                </div>
                <!-- end left -->

                <!-- right -->
                <div class="flex flex-row-reverse items-right">

                    <!-- user -->

                    <!-- notifcation -->
                    <div class="p-5 flex flex-row flex-wrap justify-between items-center">

                        <div class="flex flex-row justify-center items-center">
                            <div class="cs-hire-me">
                                <form @submit.prevent="checkAvailability">
                                    <button on class="btn mr-4 text-sm py-2 block">Available to Hire</button>
                                </form>
                            </div>
                            {{--  <a href="#" class="">Available to Hire </a>  --}}
                            <div class="cs-hire-me">
                                <button @click="show" class="ml-3 btn-indigo text-sm py-2 block">
                                    Hire
                                </button>
                            </div>
                            {{--  <a href="#" class="btn-indigo text-sm py-2 block">Hire </a>  --}}
                        </div>
                    </div>

                    <div class="flex items-center">

                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">
                            {{ $overAllRating->avg_rating ? $overAllRating->avg_rating : 0 }}
                        </p>
                    </div>

                    <!-- end right -->
                </div>
                <!-- end navbar content -->

            </div>
        </div>

        <div class="h-screen flex flex-row flex-wrap">

            <!-- start sidebar -->

            <!-- status -->
            <div class=" card shadow-2xl flex items-center justify-center m-auto w-10/12 md:block">
                <div class=" w-full card-body">
                    <h3>Freelancer Details :</h3>

                    <div class="flex px-2 py-1 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                        <div class="w-64 overflow-hidden rounded-full">
                            <h4 class="h6">Country</h4>
                        </div>

                        <div class="py-1">
                            {{ $resource->country }}
                        </div>
                    </div>

                    <div class="flex px-2 py-1 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                        <div class="w-64 overflow-hidden rounded-full">
                            <h4 class="h6">Total Hours Worked</h4>

                        </div>

                        <div class="py-1">
                            {{ $resource->total_hours_invoiced }}
                        </div>
                    </div>

                    <div class="flex px-2 py-1 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                        <div class="w-64 overflow-hidden rounded-full">
                            <h4 class="h6">Skills</h4>

                        </div>

                        <div class="py-1">
                            {{--  @foreach (explode(",", $resource->skills) as $skill) 
                                <div class="inline-flex items-center px-2.5 py-0.5 mr-1 mt-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border hover:border-blue-800 cs-pills cursor-pointer">
                                    {{ $skill }}
                                </div>
                            @endforeach  --}}
                            {{ $resource->skills }}
                        </div>
                    </div>

                </div>

                <div class=" w-full card-body">
                    <h3>Freelancer Details :</h3>

                    <div class="flex px-2 py-1 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                        <div class="w-64 overflow-hidden rounded-full">
                            <h4 class="h6">Hourly Rate</h4>

                        </div>

                        <div class="py-1">
                            ${{ $resource->hourly_rate }}
                        </div>
                    </div>

                    <div class="flex px-2 py-1 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                        <div class="w-64 overflow-hidden rounded-full">
                            <h4 class="h6">Weekly Rate</h4>

                        </div>

                        <div class="py-1">
                            ${{ $resource->weekly_rate }}
                        </div>
                    </div>

                    <div class="flex px-2 py-1 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                        <div class="w-64 overflow-hidden rounded-full">
                            <h4 class="h6">Monthly Rate</h4>

                        </div>

                        <div class="py-1">
                            ${{ $resource->monthly_rate }}
                        </div>
                    </div>






                </div>

            </div>

            <!-- status -->
            <div class="bg-white-100 pt-6 pb-6 w-10/12 flex m-auto">
                {{--  <h2 class="h5">5 recent projects</h2>  --}}
                <h2 class="h5">recent portfolio</h2>
            </div>
            <div
                class="grid grid-cols-3 gap-10 m-5 lg:grid-cols-1 relative border-gray-300 p-6x md:shadow-2xl animated faster w-10/12 m-auto">

                <!-- status -->
                @forelse ($portfolios as $portfolio)
                    <div class="card col-span-1 shadow-2xl">
                        <div class="card-body">

                            <div class="flex">

                                <h4 class="ml-4 w-full font-bold">{{ $portfolio->title }}</h4>

                                <div class="flex">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">5</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="p-4">
                                {{ $portfolio->description }}    
                            </p>
                        </div>
                        {{--  <a href="{{ $portfolio->video_url }}" target="_blank" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>  --}}
                    </div>
                @empty
                    <div class="card col-span-3 shadow-2xl">
                        <h4 class="ml-4 w-full font-bold text-center p-2">no portfolio</h4>
                    </div>
                @endforelse
            </div>


            <!-- status -->
            <div class="bg-white-100 pl-6 w-10/12 flex m-auto pt-12 pb-12">
                <h2 class="h5">Recent Reviews</h2>
            </div>

            <div
                class="grid grid-cols-3 gap-10 m-5 lg:grid-cols-1 relative bg-white  border-gray-300 p-6x md:shadow-2xl animated faster w-10/12 m-auto">

                <!-- status -->

                @forelse ($reviews as $review)
                    <div class="card col-span-1 shadow-2xl">
                        <div class="card-body">

                            <div class="flex px-2 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                                <div class="w-8 overflow-hidden rounded-full">
                                    <img src="{{asset('img/user.svg')}}" class="object-cover">
                                </div>
                                <figcaption class="font-medium">
                                    <p class="ml-1 name-1">
                                        {{ $review->user->name }} 
                                    </p>
                                    <div class="flex items-center">
                                        {{--  <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>  --}}
                                        <div class="flex items-center mb-1">
                                            @for ($i = 0; $i < 5 ; $i++)
                                                <svg class="w-5 h-5 {{ ($review->rating > $i)? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            @endfor
                                            
                                            {{--  <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">
                                                {{ $review->title }}
                                            </h3>  --}}
                                        </div>
                                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">
                                            {{ $review->rating }}
                                        </p>
                                    </div>
                                </figcaption>


                            </div>
                            <div class="card-body">
                                <p class="p-4">
                                    {{ $review->review }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card col-span-3 shadow-2xl">
                        <h4 class="ml-4 w-full font-bold text-center p-2">no review</h4>
                    </div>
                @endforelse

                <!-- status -->
            </div>
            <!-- status -->
        </div>
        <!-- end wrapper -->

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="fixed inset-0 overflow-hidden cs-hide invisible" aria-labelledby="slide-over-title"
                role="dialog" aria-modal="true">
            <div class="absolute inset-0 overflow-hidden">
                <!-- Background overlay, show/hide based on slide-over state. -->
                <div class="absolute inset-0" aria-hidden="true"></div>

                <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex cs-rollover">
                    <!--
                        Slide-over panel, show/hide based on slide-over state.

                        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                            From: "translate-x-full"
                            To: "translate-x-0"
                        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                            From: "translate-x-0"
                            To: "translate-x-full"
                    -->
                    <div class="w-screen max-w-md ">
                        <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                            <div class="py-6 px-4 bg-indigo-700 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg font-medium text-white" id="slide-over-title">
                                        Checkout
                                    </h2>
                                    <div class="ml-3 h-7 flex items-center">
                                        <button
                                            class="bg-indigo-700 rounded-md text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                                            @click="hide">
                                            <span class="sr-only">Close panel</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <p class="text-sm text-indigo-300">
                                        Hire
                                        {{--                                                {{ $resource->name }} --}}
                                        to pair program with you!
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex-1 py-6 px-4 sm:px-6">
                                <!-- Replace with your content -->
                                <div class="mt-4 py-6 px-4 sm:px-6">
                                    @php
                                        $hiring_mode = ['Hourly', 'Weekly', 'Monthly'];
                                    @endphp
                                    {{--                                            {{ $resource->name }}--}}
                                    <x-picklist id="hiring_mode" class="block mt-1 w-full" name="hiring_mode"
                                                :value="$hiring_mode" @change="handleChargesDisplay" required
                                                autofocus />


                                </div>
                                <div class="mt-2 px-4 sm:px-6 cs-no-of-hours">
                                    <x-label for="no_of_hours" :value="__('No of hours')" />
                                    <x-input id="no_of_hours" class="block mt-1 w-full" type="number"
                                                name="no_of_hours" v-model="noOfHours" @change="handleChangesCalc"
                                                required autofocus />
                                </div>
                                <div v-if="selectedHiringMode === 'Hourly'" class="mt-2 px-6 sm:px-6">
                                    ${{ $resource->hourly_rate }} / hour * @{{ noOfHours }} Hours →
                                    $@{{ finalCharges }}
                                </div>
                                <div v-else-if="selectedHiringMode === 'Weekly'" class="mt-2 px-6 sm:px-6">
                                    ${{ $resource->weekly_rate }} / week → $@{{ finalCharges }}
                                </div>
                                <div v-else-if="selectedHiringMode === 'Monthly'" class="mt-2 px-6 sm:px-6 ">
                                    ${{ $resource->monthly_rate }} / month → $@{{ finalCharges }}
                                </div>

                                <!-- /End replace -->
                            </div>
                            <div class="flex-shrink-0 px-4 py-4 flex justify-end">
                                <button type="button"
                                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        @click="hide">
                                    Cancel
                                </button>
                                <button
                                    class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    @click="handleHire">
                                    Save
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var app = Vue.createApp({
            data() {
                return {
                    noOfHours: 1,
                    charges: '{{ $resource->hourly_rate }}',
                    finalCharges: '{{ $resource->hourly_rate }}',
                    selectedHiringMode: 'Hourly',
                    options: {
                        'key': 'rzp_test_2EILRYIVI37u37', // Enter the Key ID generated from the Dashboard
                        'amount': '50000', // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        'currency': 'INR',
                        'name': "{{ env('APP_NAME') }}",
                        'description': 'Test Transaction',
                        'image': 'https://example.com/your_logo',
                        'order_id': '', //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        'callback_url': "{{ route('hire.success') }}",
                        'prefill': {
                            'name': "{{ $resource->name }}",
                            'email': "{{ $resource->email }}",
                            'contact': '7032650325'
                        },
                        'notes': {
                            'address': 'Razorpay Corporate Office'
                        },
                        'theme': {
                            'color': '#3399cc'
                        }
                    },
                    authCheck: '{{ Auth::check() }}'
                };
            },
            methods: {
                show(event) {
                    document.querySelector('.cs-hide').classList.remove('invisible');
                    document.querySelector('.cs-rollover').classList.add('transform', 'transition', 'ease-in',
                        'duration-500', 'sm:duration-700');
                },

                hide(event) {
                    document.querySelector('.cs-hide').classList.add('invisible');
                    document.querySelector('.cs-rollover').classList.remove('transform', 'transition',
                        'ease-in', 'duration-500', 'sm:duration-700');
                },
                checkAvailability(event) {
                    if (!this.authCheck) {
                        document.querySelector('.login-alert').classList.remove('hidden');
                        return;
                    }
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const resourceInfo = {
                        'resource_id': '{{$resource->id}}'
                    };
                    fetch("{{ route('check.availability') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-Token': token,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                resourceInfo
                            })
                        })
                        .then((result) => {
                            console.log(result);
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },
                handleChargesDisplay(event) {
                    let value = parseInt(event.target.value);
                    // let selectedCharges = '{{ $resource->hourly_rate }}';
                    let selectedCharges;
                    if (value === 0) {
                        selectedCharges = '{{ $resource->hourly_rate }}';
                        document.querySelector('.cs-no-of-hours').classList.toggle('invisible');
                        // this.selectedHiringMode = this.selectedHiringMode ? this.selectedHiringMode : 'Hourly';
                        this.selectedHiringMode = 'Hourly';

                    } else if (value === 1) {
                        selectedCharges = '{{ $resource->weekly_rate }}';
                        document.querySelector('.cs-no-of-hours').classList.add('invisible');
                        this.selectedHiringMode = 'Weekly';


                    } else if (value === 2) {
                        selectedCharges = '{{ $resource->monthly_rate }}';
                        document.querySelector('.cs-no-of-hours').classList.add('invisible');
                        this.selectedHiringMode = 'Monthly';

                    }
                    // else{
                    //     document.querySelector('.cs-no-of-hours').classList.add('invisible');
                    //     selectedCharges = '';
                    //     this.selectedHiringMode = null;
                    //
                    // }
                    this.finalCharges = selectedCharges;
                    console.log(this.selectedHiringMode);
                    console.log(selectedCharges);

                },
                handleChangesCalc() {
                    console.log(this.charges);
                    console.log(this.noOfHours);
                    this.finalCharges = this.charges * this.noOfHours;
                },
                handleHire(event) {
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const resourceDetails = {
                        'resource_id': '{{ $resource->id }}',
                        'selected_hiring_mode': this.selectedHiringMode,
                        'final_charges': this.finalCharges,
                        'no_of_hours': (this.selectedHiringMode === 'Hourly') ? this.noOfHours : null
                    };
                    console.log("{{ route('hire') }}");
                    fetch("{{ route('hire') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-Token': token
                            },
                            body: JSON.stringify({
                                resourceDetails
                            })
                        })
                        .then((result) => {
                            if (result.url === `${location.protocol}//${location.host}/login`) {
                                window.location.href = result.url;
                            }
                            return result.json();
                        })
                        .then((result) => {
                            console.log(result);
                            this.options.order_id = result.order_id;
                            var rzp1 = new Razorpay(this.options);
                            rzp1.open();
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }

            }

        });
        const vm = app.mount('.cs-dahsboard-main');
    </script>
</x-semi-app-layout>
