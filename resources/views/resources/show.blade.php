<x-guest-layout>
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
                            <div id="card-element"><!--Stripe.js injects the Card Element--></div>

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

                        {{ $resource->name }}

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

                        {{ $resource->country }}
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
                                                Hire {{ $resource->name }} to pair program with you!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="relative flex-1 py-6 px-4 sm:px-6">
                                        <!-- Replace with your content -->
                                        <div class="mt-4 py-6 px-4 sm:px-6">
                                            @php
                                            $hiring_mode = ['Hourly', 'Weekly', 'Monthly'];
                                            @endphp
                                            {{ $resource->name }}
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
                                        <button type="submit"
                                            class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
    </div>
    </div>
    {{-- <script>
        // const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // var stripe = Stripe('pk_test_ltxNNQm0B3dyUKRkJovSpK3u');
        var purchase = {
            items: [{
                id: "xl-tshirt"
            }]
        };
        // Disable the button until we have Stripe set up on the page
        document.querySelector("button").disabled = true;

        let stripe = Stripe('pk_test_1MBub2bbCHaLGAeZ2n73dwyx')

        fetch("/profile", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "X-CSRF-Token": token
                },
                body: JSON.stringify(purchase)
            })
            .then(function(result) {
                return result.json();
            })
            .then(function(data) {
                // console.log(JSON.parse(data));
                var elements = stripe.elements();
                var style = {
                    base: {
                        color: "#32325d",
                        fontFamily: 'Arial, sans-serif',
                        fontSmoothing: "antialiased",
                        fontSize: "16px",
                        "::placeholder": {
                            color: "#32325d"
                        }
                    },
                    invalid: {
                        fontFamily: 'Arial, sans-serif',
                        color: "#fa755a",
                        iconColor: "#fa755a"
                    }
                };
                var card = elements.create("card", {
                    style: style
                });
                // Stripe injects an iframe into the DOM
                card.mount("#card-element");
                card.on("change", function(event) {
                    // Disable the Pay button if there are no card details in the Element
                    document.querySelector("button").disabled = event.empty;
                    document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
                });
                var form = document.getElementById("payment-form");
                form.addEventListener("submit", function(event) {
                    console.log('Trying to make the payment------');
                    event.preventDefault();

                    // Complete payment when the submit button is clicked
                    payWithCard(stripe, card, data.clientSecret);
                    console.log('Trying to make the payment------');

                });
            })
            .catch((error) => {
                console.log(error);
            });
        // Calls stripe.confirmCardPayment
        // If the card requires authentication Stripe shows a pop-up modal to
        // prompt the user to enter authentication details without leaving your page.
        var payWithCard = function(stripe, card, clientSecret) {
            loading(true);
            console.log(clientSecret);
            stripe
                .confirmCardPayment(clientSecret, {
                    payment_method: {
                        card : card
                    }
                })
                .then(function(result) {
                    if (result.error) {
                        // Show error to your customer
                        showError(result.error.message);
                    } else {
                        // The payment succeeded!
                        orderComplete(result.paymentIntent.id);
                    }
                });
        };

        var orderComplete = function(paymentIntentId) {
            loading(false);
            document
                .querySelector(".result-message a")
                .setAttribute(
                    "href",
                    "https://dashboard.stripe.com/test/payments/" + paymentIntentId
                );
            document.querySelector(".result-message").classList.remove("hidden");
            document.querySelector("button").disabled = true;
        };
        // Show the customer the error from Stripe if their card fails to charge
        var showError = function(errorMsgText) {
            loading(false);
            var errorMsg = document.querySelector("#card-error");
            errorMsg.textContent = errorMsgText;
            setTimeout(function() {
                errorMsg.textContent = "";
            }, 4000);
        };
        // Show a spinner on payment submission
        var loading = function(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("button").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
            } else {
                document.querySelector("button").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        };
    </script> --}}

    <script>
        var app = Vue.createApp({
            data(){
                return {
                    noOfHours : 1,
                    charges : '{{ $resource->hourly_rate }}',
                    finalCharges : '{{ $resource->hourly_rate }}',
                    selectedHiringMode : 'Hourly'
                }
            },
            methods: {
                show(event) {
                    document.querySelector('.cs-hide').classList.remove('invisible');
                    document.querySelector('.cs-rollover').classList.add('transform', 'transition', 'ease-in', 'duration-500', 'sm:duration-700');
                },

                hide(event){
                    document.querySelector('.cs-hide').classList.add('invisible');
                    document.querySelector('.cs-rollover').classList.remove('transform', 'transition', 'ease-in', 'duration-500', 'sm:duration-700');
                },
                checkAvailability(event){
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch("{{ route('check.availability') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                            "X-CSRF-Token": token
                        },
                        body: JSON.stringify('{{$resource->id}}')
                    })
                    .then(function(result) {
                        console.log(result);
                    })
                    .catch( (error) => {
                        console.log(error);
                    })
                },
                handleChargesDisplay(event){
                    let value = parseInt(event.target.value);
                    // let selectedCharges = '{{ $resource->hourly_rate }}';
                    let selectedCharges;
                    if(value === 0){
                        selectedCharges = '{{ $resource->hourly_rate }}';
                        document.querySelector('.cs-no-of-hours').classList.toggle('invisible');
                        this.selectedHiringMode = this.selectedHiringMode ? this.selectedHiringMode : 'Hourly';

                    }else if(value === 1){
                        selectedCharges = '{{ $resource->weekly_rate }}';
                        document.querySelector('.cs-no-of-hours').classList.add('invisible');
                        this.selectedHiringMode = 'Weekly';


                    }else if(value === 2){
                        selectedCharges = '{{ $resource->monthly_rate }}';
                        document.querySelector('.cs-no-of-hours').classList.add('invisible');
                        this.selectedHiringMode = 'Monthly';

                    }else{
                        document.querySelector('.cs-no-of-hours').classList.add('invisible');
                        selectedCharges = '';
                        this.selectedHiringMode = null;

                    }
                    this.finalCharges = selectedCharges;
                    console.log(this.selectedHiringMode);
                    console.log(selectedCharges);

                },
                handleChangesCalc(){
                    console.log(this.charges);
                    console.log(this.noOfHours);
                    this.finalCharges = this.charges * this.noOfHours;
                }
            }
        });
        const vm  = app.mount('.cs-dahsboard-main');
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
    </x-app-layout>
