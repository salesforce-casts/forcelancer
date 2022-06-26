<x-semi-app-layout>
    <x-slot name="script">
        <script src="https://unpkg.com/vue@next"></script>
        {{-- <script src="https://js.stripe.com/v3/"></script> --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  cs-dahsboard-main">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">

                {{--
                <x-button class="ml-3">
                    {{ __('Available?') }}
                </x-button>--}}



                <!-- Display a payment form -->
                {{--
                <form id="payment-form">
                    Hey
                    <div id="card-element">
                        <!--Stripe.js injects the Card Element-->
                    </div>

                    <button id="submit">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Pay now</span>
                    </button>
                    <p id="card-error" role="alert"></p>
                    <p class="result-message hidden">
                        Payment succeeded, see the result in your
                        <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
                    </p>
                </form>
                --}}

                <!-- Email Address -->
                    <div class="flex flex-nowrap">

                        {{--                        {{ $resource->name }}--}}

                        <div class="cs-hire-me">
                            <form @submit.prevent="checkAvailability">
                                <x-button on class="ml-3">Available?</x-button>
                            </form>
                        </div>
                        <div class="cs-hire-me">
                            <x-button @click="show" class="ml-3">Hire</x-button>
                        </div>
                    </div>
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        {{ $resource->email }}


                    </div>
                    <div>
                        <x-label for="country" :value="__('Country')" />

                        {{ $resource->country->name }}
                    </div>

                    <div>
                        <x-label for="timezone" :value="__('Timezone')" />

                        {{ $resource->timezone }}
                    </div>

                    <div>
                        <x-label for="total_hours_invoiced" :value="__('Total Hours Invoiced')" />

                        {{ $resource->total_hours_invoiced }}
                    </div>

                    <div>
                        <x-label for="total_earnings" :value="__('Total Earnings')" />

                        {{ $resource->total_earnings }}
                    </div>

                    <div>
                        <x-label for="skills" :value="__('Skills')" />

                        {{ $resource->skills }}
                    </div>

                    <div>
                        <x-label for="hourly_rate" :value="__('Hourly Rate')" />

                        {{ $resource->hourly_rate }}
                    </div>

                    <div>
                        <x-label for="weekly_rate" :value="__('Weekly Rate')" />

                        {{ $resource->weekly_rate }}
                    </div>

                    <div>
                        <x-label for="monthly_rate" :value="__('Monthly Rate')" />

                        {{ $resource->monthly_rate }}
                    </div>

                    <div>
                        <x-label for="describe" :value="__('Describe')" />
                        {{ $resource->describe }}
                    </div>

                </div>

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
        </div>
    </div>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  cs-dahsboard-main">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div>
                    <article class="md:gap-8 md:grid md:grid-cols-3">
                        <div>
                            <div class="flex items-center mb-6 space-x-4">
                                {{--  <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="">  --}}
                                <div class="m-1 mr-2 w-12 h-12 relative flex justify-center items-center rounded-full bg-red-500 text-xl text-white uppercase">
                                    {{$resource->user->name[0].$resource->user->name[strpos($resource->user->name, " ")+1]}}
                                </div>
                                <div class="space-y-1 font-medium dark:text-white">
                                    <div class="font-bold text-gray-900 text-xl dark:text-white">{{ $resource->user->name }}</div>
                                    <div class="flex items-center text-gray-500 dark:text-gray-400 mt-0">
                                        {{ $resource->user->email }}
                                    </div>
                                </div>
                            </div>
                            <ul class="space-y-3 text-sm text-gray-500 dark:text-gray-400">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                      {{ $resource->country->name }}
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <polyline points="12 7 12 12 15 15" /></svg>
                                    {{ $resource->timezone ? $resource->timezone : 'Flexible time zone' }}
                                </li>   
                            </ul>
                            <div class="mt-2">
                                <div class="flex items-center my-1 space-x-4">
                                    <div>
                                        Hourly Rate :- 
                                    </div>
                                    <div class="space-y-1 font-medium dark:text-white">
                                        {{ $resource->hourly_rate }}
                                    </div>
                                </div>
                                <div class="flex items-center my-1 space-x-4">
                                    <div>
                                        Weekly Rate :- 
                                    </div>
                                    <div class="space-y-1 font-medium dark:text-white">
                                        {{ $resource->weekly_rate }}
                                    </div>
                                </div>
                                <div class="flex items-center my-1 space-x-4">
                                    <div>
                                        Monthly Rate :- 
                                    </div>
                                    <div class="space-y-1 font-medium dark:text-white">
                                        {{ $resource->monthly_rate }}
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-span-2 mt-6 md:mt-0">
                            <div class="flex items-start mb-5">
                                <div class="pr-4">
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white">
                                        Skills :- {{ $resource->skills }}
                                    </h4>
                                </div>
                            </div>
                            <div class="flex items-start mb-5">
                                <div class="pr-4">
                                    <p class="font-light text-gray-500 dark:text-gray-400">
                                        {{ $resource->describe }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center mt-3 space-x-5">
                                <div class="pr-4">
                                    <h4 class="font-bold text-gray-900 dark:text-white">
                                        Total Hours Invoiced :- {{ $resource->total_hours_invoiced }}
                                    </h4>
                                </div>
                                <div class="pr-4">
                                    <h4 class="font-bold text-gray-900 dark:text-white">
                                        Total Earnings :- {{ $resource->total_earnings }}
                                    </h4>
                                </div>
                            </div>
                            <aside class="flex items-center mt-3 space-x-5 justify-end">
                                <div class="cs-hire-me inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-500">
                                    <form @submit.prevent="checkAvailability">
                                        <x-button on>Available ?</x-button>
                                    </form>
                                </div>
                                <div class="cs-hire-me inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-500 group">
                                    <x-button @click="show" class="ml-3">Hire</x-button>
                                </div>
                            </aside>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <div class="px-10 pb-10 ">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Portfolio </h2>

        <div class="grid grid-cols-3 gap-3">
            @forelse ($portfolios as $portfolio)
                <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $portfolio->title }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $portfolio->description }}
                        </p>
                        <a href="{{ $portfolio->video_url }}" target="_blank" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>
            @empty
                <h1>No Record</h1>
            @endforelse
        </div>
    </div>

    

    <div class="px-10 pb-10">
        <div class="mb-3">
            <div class="flex items-center">
                <h1 class="text-2xl mr-3">Reviews</h1>
                @for ($i = 0; $i < 5 ; $i++)
                    <svg class="w-5 h-5 {{ (floor($overAllRating->avg_rating) > $i)? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                @endfor
                <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">{{ $overAllRating->avg_rating ? $overAllRating->avg_rating : 0 }} out of 5</p>
            </div>
            @if($overAllRating->total_review)
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $overAllRating->total_review }} global ratings</p>
            @endif
        </div>
        <div class="max-w-7xl mx-auto cs-dahsboard-main">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @forelse ($reviews as $review)
                    <div class="my-4 border-b border-solid border-red-600">                   
                        <article>
                            <div class="flex items-center mb-4 space-x-4">
                                {{--  <img class="w-10 h-10 rounded-full" src="https://gravatar.com/avatar/338a1860eccd05d636fe661da207805f?s=400&d=robohash&r=x" alt="">  --}}
                                <div class="m-1 mr-2 w-12 h-12 relative flex justify-center items-center rounded-full bg-red-500 text-xl text-white uppercase">
                                    {{$review->user->name[0].$review->user->name[strpos($review->user->name, " ")+1]}}
                                </div>

                                <div class="space-y-1 font-medium dark:text-white">
                                    <p>{{ $review->user->name }} 
                                        <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 dark:text-gray-400">.Joined on {{ $review->user->created_at->format('F Y') }}</time>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-center mb-1">
                                @for ($i = 0; $i < 5 ; $i++)
                                    <svg class="w-5 h-5 {{ ($review->rating > $i)? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @endfor
                                
                                <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $review->title }}
                                </h3>
                            </div>
                            <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400">
                                <p>Reviewed on <time datetime="2017-03-03 19:00">{{ $review->user->created_at->format('d F Y') }}</time></p>
                            </footer>
                            <p class="mb-2 font-light text-gray-500 dark:text-gray-400">
                                {{ $review->review }}
                            </p>
                        </article>
                    </div>
                @empty
                    <h1>No review yet !</h1>
                @endforelse
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
                    }
                };
            },
            methods: {
                show(event) {
                    document.querySelector('.cs-hide').classList.remove('invisible');
                    document.querySelector('.cs-rollover').classList.add('transform', 'transition', 'ease-in', 'duration-500', 'sm:duration-700');
                },

                hide(event) {
                    document.querySelector('.cs-hide').classList.add('invisible');
                    document.querySelector('.cs-rollover').classList.remove('transform', 'transition', 'ease-in', 'duration-500', 'sm:duration-700');
                },
                checkAvailability(event) {
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
                        body: JSON.stringify({ resourceInfo })
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
                        body: JSON.stringify({ resourceDetails })
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
    <style>
        /* button {
            background: #5469d4;
            color: #ffffff;
            font-family: Arial, sans-serif;
            border-radius: 0 0 4px 4px;
            border: 0;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: block;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
            width: 100%;
        } */

        button:hover {
            /* filter: contrast(115%); */
        }

        button:disabled {
            opacity: 0.5;
            cursor: default;
        }

        .cs-sidebar-slide {
            -webkit-animation: slide 0.5s forwards;
            -webkit-animation-delay: 2s;
            animation: slide 0.5s forwards;
            animation-delay: 2s;
        }
    </style>
</x-semi-app-layout>
