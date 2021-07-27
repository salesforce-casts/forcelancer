<x-guest-layout>
    <x-slot name="script">
        <script src="https://js.stripe.com/v3/"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

{{--
                    <x-button class="ml-3">
                        {{ __('Available?') }}
                    </x-button>

                    <x-button class="ml-3">
                        {{ __('Hire') }}
                    </x-button> --}}

        <!-- Display a payment form -->
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

        <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Email')" />

            {{ $resource->email }}
        </div>

        <div>
            <x-label for="email" :value="__('Email')" />

            {{ $resource->country }}
        </div>

            <div>
                <x-label for="email" :value="__('Email')" />

            {{ $resource->timezone }}
        </div>

            <div>
                <x-label for="email" :value="__('Email')" />

            {{ $resource->total_hours_invoiced }}
        </div>

            <div>
                <x-label for="email" :value="__('Email')" />

            {{ $resource->total_earnings }}
        </div>

            <div>
                <x-label for="email" :value="__('Email')" />

            {{ $resource->skills }}
        </div>

            <div>
                <x-label for="email" :value="__('Email')" />

            {{ $resource->hourly_rate }}
        </div>

            <div>
                <x-label for="email" :value="__('Email')" />

            {{ $resource->weekly_rate }}
        </div>

            <div>
                <x-label for="email" :value="__('Email')" />

            {{ $resource->monthly_rate }}
        </div>

            <div>
                <x-label for="email" :value="__('Email')" />
            {{ $resource->describe }}
        </div>

        </div>

    </div>
    </div>
    </div>
    </div>
    <script>
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
    </script>
    <style>
        button {
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
        }
        button:hover {
        filter: contrast(115%);
        }
        button:disabled {
        opacity: 0.5;
        cursor: default;
        }
    </style>
</x-app-layout>
