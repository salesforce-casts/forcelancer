@section('css')
    
@endsection

<x-semi-app-layout>
    <x-slot name="scripts">
        <script src="https://unpkg.com/vue@next"></script>
    </x-slot>

    <x-slot name="css">
        <style>
            .range-slider {
                    
                text-align: center;
                position: relative;
                .rangeValues {
                  display: block;
                }
            }
              
            .range-slider input[type=range] {
                -webkit-appearance: none;
                border: 1px solid white;
                    
                position: absolute;
                left: 0;
            }
            
            .range-slider input[type=range]::-webkit-slider-runnable-track {
                    
                height: 5px;
                background: #ddd;
                border: none;
                border-radius: 3px;
            }
            
            .range-slider input[type=range]::-webkit-slider-thumb {
                -webkit-appearance: none;
                border: none;
                height: 16px;
                width: 16px;
                border-radius: 50%;
                background: #21c1ff;
                margin-top: -4px;
                cursor: pointer;
                position: relative;
                z-index: 1;
            }
            
            .range-slider input[type=range]:focus {
                outline: none;
            }
            
            .range-slider input[type=range]:focus::-webkit-slider-runnable-track {
                background: #ccc;
            }
            
            .range-slider input[type=range]::-moz-range-track {
                    
                height: 5px;
                background: #ddd;
                border: none;
                border-radius: 3px;
            }
            
            .range-slider input[type=range]::-moz-range-thumb {
                border: none;
                height: 16px;
                width: 16px;
                border-radius: 50%;
                background: #21c1ff;
            
            }
            
            
            /*hide the outline behind the border*/
            
            .range-slider input[type=range]:-moz-focusring {
                outline: 1px solid white;
                outline-offset: -1px;
            }
            
            .range-slider input[type=range]::-ms-track {
                    
                height: 5px;
                /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
                background: transparent;
                /*leave room for the larger thumb to overflow with a transparent border */
                border-color: transparent;
                border-width: 6px 0;
                /*remove default tick marks*/
                color: transparent;
                z-index: -4;
            
            }
            
            .range-slider input[type=range]::-ms-fill-lower {
                background: #777;
                border-radius: 10px;
            }
            
            .range-slider input[type=range]::-ms-fill-upper {
                background: #ddd;
                border-radius: 10px;
            }
            
            .range-slider input[type=range]::-ms-thumb {
                border: none;
                height: 16px;
                width: 16px;
                border-radius: 50%;
                background: #21c1ff;
            }
            
            .range-slider input[type=range]:focus::-ms-fill-lower {
                background: #888;
            }
            
            .range-slider input[type=range]:focus::-ms-fill-upper {
                background: #ccc;
            }
              
        </style>
    </x-slot>
    
    <div class="relative flex items-top justify-center min-h-screen bg-white sm:items-center py-4 sm:pt-0">        
        <x-search></x-search>

    </div>
</x-semi-app-layout>
