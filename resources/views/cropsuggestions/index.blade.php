<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crop Suggestions') }} 
        </h2>
    </x-slot>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tailwind CSS -->
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>


  <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
    <!--Card 1-->
    @foreach ($cropsuggestions as $cropsuggestion)
      <div class="rounded overflow-hidden shadow-lg" style="height:85%;">
            <img class="w-full" src="{{ $cropsuggestion->crop->picture_path }}" alt="{{ $cropsuggestion->crop->name }}" style="height:20%; width: 45%; margin-left:10%;">
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2">Crop Name: {{ $cropsuggestion->crop->name }}</div>
              <div class="font-bold text-l mb-2">Conditions Required</div>
              <p class="text-gray-700 text-base">
                    Minimum Temperature: {{  $cropsuggestion->crop->lowest_temperature }} &deg;C <br>
                    Maximum Temperature: {{  $cropsuggestion->crop->highest_temperature }} &deg;C <br>
                    Minimum Atmospheric Pressure: {{  $cropsuggestion->crop->lowest_atmospheric_pressure }} <br>
                    Maximum Atmospheric Pressure: {{  $cropsuggestion->crop->highest_atmospheric_pressure }} <br>
                    Minimum Humidity: {{  $cropsuggestion->crop->lowest_humidity }} <br>
                    Maximum Humidity: {{  $cropsuggestion->crop->highest_humidity }}
              </p>
            </div>
            <div class="px-6 pt-4 pb-2">
              @if($cropsuggestion->crop->in_demand == 1)
              <span class="inline-block bg-gray-800 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">ondemand</span>
              @endif
              <span class="inline-block bg-green-700 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">Average market price: {{ $cropsuggestion->crop->average_market_price}}</span>

              <span class="inline-block bg-gray-800 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">Minimum Kgs: {{ $cropsuggestion->crop->amount_in_kg}}</span>
            </div>
          </div>
    @endforeach
   

</body>
</html>
</x-app-layout>