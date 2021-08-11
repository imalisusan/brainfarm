<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wait a Minute') }}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
            @foreach ($errors as $error)
                <p>{{ $error }}</p>
            @endforeach
            @endif

            <x-alert type="danger" class="bg-red-700 text-red-100 p-4" />
            <div>
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                        <div class="-mx-3 md:flex mb-6">
                            <div class="">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 text-blue-500" for="grid-first-name" style="color:#86DD00;">
                                    Your account is still on hold
                                </label><hr><br>
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 text-blue-500" for="grid-first-name" style="font-size:12px;">
                                Our administrator has to approve your account first before you can continue. <br> You are viewing his because 
                                your account approval is either pending or has been suspended. <br><br>
                                Please be patient with us as we work to resolve this,
                                </label>

                    </div>
            </div>
        </div>

    </div>
</x-app-layout>