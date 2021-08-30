
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Welcome,  {{ Auth::user()->name }} 
        </h2>
    </x-slot>
 <body class="antialiased" style="background-color: transparent;" style="margin-top:0px;">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-300 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" >
           

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
                                
                                  Temperature: {{  $weather->temperature }} &deg;C <br><br>
                                  Atmospheric Pressure: {{  $weather->pressure }} <br><br>
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

                    </div>
                    
                </div>

                <br>
                <!--Divider-->
			<hr class="border-b-2 border-green-700 my-8 mx-4">
                   <!--Today's Tip-->
                    <div class=" w-full lg:max-w-full lg:flex">
                        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/mountain.jpg')" title="Mountain">
                        </div>
                        <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal w-full"  style="width: 1500px; margin-right:10%;">
                            <div class="mb-8">
                            <p class="text-sm text-gray-600 flex items-center">
                                <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                </svg>
                              Did You Know?
                            </p>
                            <div class="text-green-700 font-bold text-xl mb-2">Today's Tip</div>
                            <p class="text-gray-700 text-base"> {{ $tip->description }}</p>
                            </div>
                            <div class="flex items-center">
                            
                            </div>
                        </div>
                    </div>

               
            </div>
        </div>

      
    </body>

    </x-app-layout>
