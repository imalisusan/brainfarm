<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-6">
       


    <div class="md:w-1/2 px-3">
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
        
    </div>


        <div class="md:flex place-self-center">
        <button type="submit" class="px-5 bg-white py-2 border-blue-500 border text-blue-500 rounded transition
        duration-300 hover:bg-blue-700 hover:text-white focus:outline-none place-self-center">Save Crop</button>
    </div>
</div>