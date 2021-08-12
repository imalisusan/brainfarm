<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

            <x-label for="crop name*" class="block uppercase text-xs font-bold mb-2" />
            <div class="relative">
                <select name="crop_id" placeholder="Select a crop type" class="form-select block
                appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8
                rounded">
                    <option>Select an option</option>
                    @foreach($crops as $crop)
                        <option value="{{ $crop->id }}"  @if ((isset($farmercrop) &&  $farmercrop->crop_id == ($crop->id ) || old('crop_id') == $crop->id )) 
                            selected @endif >{{ $crop->name  }}</option>
                    @endforeach
                </select>
            </div>

       

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        

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


        <div class="md:flex place-self-center">
        <button type="submit" class="px-5 bg-white py-2 border-blue-500 border text-blue-500 rounded transition
        duration-300 hover:bg-blue-700 hover:text-white focus:outline-none place-self-center">Save Crop</button>
    </div>
</div>