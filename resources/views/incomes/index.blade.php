<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Cash Flow') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
            <x-alert type="success" class="border border-t-0  rounded-b bg-green-500 bg-opacity-25 px-4 py-3 text-green-700" />
            @else
                <x-alert type="danger" class="border border-t-0  rounded-b bg-red-500 bg-opacity-25 px-4 py-3 text-red-700" />
            @endif
            
            <!-- component -->
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <div
                    class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
                    <div class="flex justify-between">
                        <a type="button" href="{{ route('incomes.create') }}" style="float:right;"
                            class="px-5 py-2 border-green-500 border text-white bg-green-700 rounded transition duration-300 hover:text-green-700 hover:bg-white focus:outline-none place-self-center">
                            Add Income</a>
                    </div>
                </div>
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                    <body>
                        @livewire('incomes-table-view')

                        <!--Divider-->
			            <hr class="border-b-2 border-gray-600 my-8 mx-4">
                        <a type="button" href="{{ route('expenditures.create') }}" style="float:right;"
                            class="px-5 py-2 border-green-500 border text-white bg-green-700 rounded transition duration-300 hover:text-green-700 hover:bg-white focus:outline-none place-self-center">
                            Add Expenditure</a> <br>
                        @livewire('expenditures-table-view')
                    </body>
                    <div class="my-4 work-sans">
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

