<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="name*" class="block uppercase text-xs font-bold mb-2" />
            <input type="text" name="name" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($crop) ? $crop->name : old('name') }}">
            <x-error field="name" class="text-red-600" />
        </div>
        
        <div class="md:w-1/2 px-3">
            <x-label for="description*" class="block uppercase text-xs font-bold mb-2" />
                <textarea type="text" name="description" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
                rounded py-3 px-4 mb-3"
                value="{{ isset($crop) ? $crop->description :old('description') }}" style="border:1px solid rgb(104, 104, 104);">
                    {{ isset($crop) ? $crop->description :old('description')  }}
                </textarea>
                <x-error field="description" class="text-red-600" />
        </div>
    </div>

    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="lowest temperature*" class="block uppercase text-xs font-bold mb-2" />
            <input type="number" name="lowest_temperature" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($crop) ? $crop->lowest_temperature : old('lowest_temperature') }}">
            <x-error field="lowest_temperature" class="text-red-600" />
        </div>
        
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="highest temperature*" class="block uppercase text-xs font-bold mb-2" />
            <input type="number" name="highest_temperature" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($crop) ? $crop->highest_temperature : old('highest_temperature') }}">
            <x-error field="highest_temperature" class="text-red-600" />
        </div>
        
    </div>

    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="lowest humidity*" class="block uppercase text-xs font-bold mb-2" />
            <input type="number" name="lowest_humidity" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($crop) ? $crop->lowest_humidity : old('lowest_humidity') }}">
            <x-error field="lowest_humidity" class="text-red-600" />
        </div>
        
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="highest humidity*" class="block uppercase text-xs font-bold mb-2" />
            <input type="number" name="highest_humidity" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($crop) ? $crop->highest_humidity : old('highest_humidity') }}">
            <x-error field="highest_humidity" class="text-red-600" />
        </div>
        
    </div>

    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="lowest atmospheric pressure*" class="block uppercase text-xs font-bold mb-2" />
            <input type="number" name="lowest_atmospheric_pressure" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($crop) ? $crop->lowest_atmospheric_pressure : old('lowest_atmospheric_pressure') }}">
            <x-error field="lowest_atmospheric_pressure" class="text-red-600" />
        </div>
        
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="highest atmospheric pressure*" class="block uppercase text-xs font-bold mb-2" />
            <input type="number" name="highest_atmospheric_pressure" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($crop) ? $crop->highest_atmospheric_pressure : old('highest_atmospheric_pressure') }}">
            <x-error field="highest_atmospheric_pressure" class="text-red-600" />
        </div>
        
    </div>


        <div class="md:flex place-self-center">
        <button type="submit" class="px-5 bg-white py-2 border-blue-500 border text-blue-500 rounded transition
        duration-300 hover:bg-blue-700 hover:text-white focus:outline-none place-self-center">Save Crop</button>
    </div>
</div>