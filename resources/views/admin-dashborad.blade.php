
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} 
        </h2>
    </x-slot>
 <body class="antialiased" style="background-color: transparent;" style="margin-top:0px;">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" >
           

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
              
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <img src="{{ asset('assets\images\weather.svg') }}" class="block h-9 w-auto" />
                               
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="" class="underline text-gray-900 dark:text-white">How's the weather like today?</a></div>
                            </div>
                            
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <div>
                                    <div style="float:left;">
                                        <img src="{{$url}}" class="block h-9 w-auto" />
                                    </div> 
                                    <div style="float:left;">
                                        {{  $weather->condition }} -
                                        {{  $weather->condition_desc }}
                                    </div>
                                </div>
                              <br> <br>
                                
                                  Temperature: {{  $weather->temperature }} &deg;F <br>
                                  Atmospheric Pressure: {{  $weather->pressure }} <br>
                                  Humidity: {{  $weather->humidity }}
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="" class="underline text-gray-900 dark:text-white">Latest Stats</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                 Latest Income: 
                                  @if($latest_income) 
                                  {{$latest_income->amount}} 
                                  @endif
                                  <br><br> 

                                  Latest Expenditure: 
                                  @if($latest_expenditure) 
                                  {{$latest_expenditure->amount}} 
                                  @endif

                                  <br><br>
                                  @if($profit)
                                    Profit: {{$profit}} <br> <br>
                                    Profit Margin: {{$margin}} %<br>
                                  @else
                                    Loss: {{$loss}} <br> <br>
                                    Loss Margin: {{$margin}} %<br>
                                  @endif
                                  
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="" class="underline text-gray-900 dark:text-white">Latest Income</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                @if($latest_income) 
                                    Transaction ID:  {{$latest_income->id}} <br><br> 
                                    Date: {{$latest_income->date}} <br><br>
                                    Amount: {{$latest_income->amount}} <br><br>
                                    Description: {{$latest_income->description}} <br>
                                  @endif
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="" class="underline text-gray-900 dark:text-white">Today's Tip</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                             {{ $tip->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </body>

    </x-app-layout>
