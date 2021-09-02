<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-6">
       

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="date*" class="block uppercase text-xs font-bold mb-2" />
            <input type="date" name="date" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($income) ? $income->date : old('date') }}">
            <x-error field="date" class="text-red-600" />
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="amount*" class="block uppercase text-xs font-bold mb-2" />
            <input type="number" name="amount" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($income) ? $income->amount : old('amount') }}">
            <x-error field="amount" class="text-red-600" />
        </div>
    </div>

    <div class="-mx-3 md:flex mb-6">
        
        <div class="md:w-1/2 px-3">
            <x-label for="description*" class="block uppercase text-xs font-bold mb-2" />
                <textarea type="text" name="description" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
                rounded py-3 px-4 mb-3"
                value="{{ isset($income) ? $income->description :old('description') }}" style="border:1px solid rgb(104, 104, 104);">
                    {{ isset($income) ? $income->description :old('description')  }}
                </textarea>
                <x-error field="description" class="text-red-600" />
        </div>

        
    </div>


        <div class="md:flex place-self-center">
        <button type="submit" class="px-5 bg-green-700 py-2 border-green-700 border text-white rounded transition
        duration-300 hover:bg-white hover:text-green-700 focus:outline-none place-self-center">Save Income</button>
    </div>
</div>