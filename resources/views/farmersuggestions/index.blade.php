<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crop Recommendations') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
            <x-alert type="success" class="border border-t-0  rounded-b bg-green-500 bg-opacity-25 px-4 py-3 text-green-700" />
            @else
                <x-alert type="danger" class="border border-t-0  rounded-b bg-red-500 bg-opacity-25 px-4 py-3 text-red-700" />
            @endif
            
        </div>
    </div>

</x-app-layout>
