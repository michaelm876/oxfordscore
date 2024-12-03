<x-app-layout>

    <h2 class="font-semibold text-2xl text-gray-800">New Shoulder Submission</h2>
    <hr class="my-4"/>     
    <p class="my-8">Please fill out the questions below and press submit when complete.</p>

    <form method="POST" action="{{ route('shoulders.index') }}" autocomplete="off">
        @csrf
        <fieldset class="p-4 bg-slate-50 mb-8">
            <legend class="form-margin font-semibold text-xl text-gray-800">Your Details</legend>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="name" class="basis-1/3 shrink-0">Your Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                @error('name')
                <p class="text-red-700 font-semibold">Please enter your Full Name.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="dob" class="basis-1/3 shrink-0">Date of Birth</label>
                <input type="date" name="dob" id="dob" value="{{ old('dob') }}" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                @error('dob')
                <p class="text-red-700 font-semibold">Please enter your Date of Birth.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="joint" class="basis-1/3 shrink-0">Which joint are you completing for?</label>
                <select name="joint" id="joint" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option {{ (old('joint') == 'Left') ? 'selected' : null }}>Left</option>
                    <option {{ (old('joint') == 'Right') ? 'selected' : null }}>Right</option>
                    <option {{ (old('joint') == 'Bilateral') ? 'selected' : null }}>Bilateral</option>
                </select>
                @error('joint')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>
        </fieldset>

        <fieldset class="p-4 bg-slate-50 mb-8">
            <legend class="form-margin font-semibold text-xl text-gray-800">During The Last 4 Weeks</legend>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="type" class="basis-1/3 shrink-0">Select Your Current Situation</label>
                <select name="type" id="type" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option {{ (old('type') == 'Pre Operation') ? 'selected' : null }}>Pre Operation</option>
                    <option {{ (old('type') == 'Year 1 Post Operation') ? 'selected' : null }}>Year 1 Post Operation</option>
                    <option {{ (old('type') == 'Year 5 Post Operation') ? 'selected' : null }}>Year 5 Post Operation</option>
                    <option {{ (old('type') == 'Year 10 Post Operation') ? 'selected' : null }}>Year 10 Post Operation</option>
                    <option {{ (old('type') == 'Subsequent Years') ? 'selected' : null }}>Subsequent Years</option>
                </select>
                @error('type')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="pain" class="basis-1/3 shrink-0">How would you describe the worst pain you had from your shoulder?</label>
                <select name="pain" id="pain" class="grow max-w-xs cursor-pointergrow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('pain') == '4') ? 'selected' : null }}>None</option>
                    <option value="3" {{ (old('pain') == '3') ? 'selected' : null }}>Very Mild</option>
                    <option value="2" {{ (old('pain') == '2') ? 'selected' : null }}>Mild</option>
                    <option value="1" {{ (old('pain') == '1') ? 'selected' : null }}>Moderate</option>
                    <option value="0" {{ (old('pain') == '0') ? 'selected' : null }}>Severe</option>
                </select>
                @error('pain')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="dressing" class="basis-1/3 shrink-0">Have you had any trouble dressing yourself because of your shoulder?</label>
                <select name="dressing" id="dressing" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('dressing') == '4') ? 'selected' : null }}>No Trouble</option>
                    <option value="3" {{ (old('dressing') == '3') ? 'selected' : null }}>Very Little Trouble</option>
                    <option value="2" {{ (old('dressing') == '2') ? 'selected' : null }}>Moderate Trouble</option>
                    <option value="1" {{ (old('dressing') == '1') ? 'selected' : null }}>Extremely Difficult</option>
                    <option value="0" {{ (old('dressing') == '0') ? 'selected' : null }}>Impossible to do</option>
                </select>
                @error('dressing')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="car" class="basis-1/3 shrink-0">Have you had trouble getting in and out of a car or using public transport because of your shoulder?</label>
                <select name="car" id="car" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('car') == '4') ? 'selected' : null }}>No Trouble</option>
                    <option value="3" {{ (old('car') == '3') ? 'selected' : null }}>Very Little Trouble</option>
                    <option value="2" {{ (old('car') == '2') ? 'selected' : null }}>Moderate Trouble</option>
                    <option value="1" {{ (old('car') == '1') ? 'selected' : null }}>Extremely Difficult</option>
                    <option value="0" {{ (old('car') == '0') ? 'selected' : null }}>Impossible to do</option>
                </select>
                @error('car')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="cutlery" class="basis-1/3 shrink-0">Have you been able to use a knife and fork - at the same time?</label>
                <select name="cutlery" id="cutlery" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('cutlery') == '4') ? 'selected' : null }}>Yes Easily</option>
                    <option value="3" {{ (old('cutlery') == '3') ? 'selected' : null }}>With Little Difficulty</option>
                    <option value="2" {{ (old('cutlery') == '2') ? 'selected' : null }}>With Moderate Difficulty</option>
                    <option value="1" {{ (old('cutlery') == '1') ? 'selected' : null }}>With Extreme Difficulty</option>
                    <option value="0" {{ (old('cutlery') == '0') ? 'selected' : null }}>Not Possible</option>
                </select>
                @error('cutlery')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="shopping" class="basis-1/3 shrink-0">Could you do the household shopping on your own?</label>
                <select name="shopping" id="shopping" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('shopping') == '4') ? 'selected' : null }}>Yes Easily</option>
                    <option value="3" {{ (old('shopping') == '3') ? 'selected' : null }}>With Little Difficulty</option>
                    <option value="2" {{ (old('shopping') == '2') ? 'selected' : null }}>With Moderate Difficulty</option>
                    <option value="1" {{ (old('shopping') == '1') ? 'selected' : null }}>With Extreme Difficulty</option>
                    <option value="0" {{ (old('shopping') == '0') ? 'selected' : null }}>Not Possible</option>
                </select>
                @error('shopping')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="tray" class="basis-1/3 shrink-0">Can you carry a tray containing food across a room?</label>
                <select name="tray" id="tray" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('tray') == '4') ? 'selected' : null }}>Yes Easily</option>
                    <option value="3" {{ (old('tray') == '3') ? 'selected' : null }}>With Little Difficulty</option>
                    <option value="2" {{ (old('tray') == '2') ? 'selected' : null }}>With Moderate Difficulty</option>
                    <option value="1" {{ (old('tray') == '1') ? 'selected' : null }}>With Extreme Difficulty</option>
                    <option value="0" {{ (old('tray') == '0') ? 'selected' : null }}>Not Possible</option>
                </select>
                @error('tray')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="hair" class="basis-1/3 shrink-0">Could you brush/comb your hair with the affected arm?</label>
                <select name="hair" id="hair" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('hair') == '4') ? 'selected' : null }}>Yes Easily</option>
                    <option value="3" {{ (old('hair') == '3') ? 'selected' : null }}>With Little Difficulty</option>
                    <option value="2" {{ (old('hair') == '2') ? 'selected' : null }}>With Moderate Difficulty</option>
                    <option value="1" {{ (old('hair') == '1') ? 'selected' : null }}>With Extreme Difficulty</option>
                    <option value="0" {{ (old('hair') == '0') ? 'selected' : null }}>Not Possible</option>
                </select>
                @error('hair')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="usualpain" class="basis-1/3 shrink-0">How would you describe the pain you usually have from your shoulder?</label>
                <select name="usualpain" id="usualpain" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('usualpain') == '4') ? 'selected' : null }}>None</option>
                    <option value="3" {{ (old('usualpain') == '3') ? 'selected' : null }}>Very Mild</option>
                    <option value="2" {{ (old('usualpain') == '2') ? 'selected' : null }}>Mild</option>
                    <option value="1" {{ (old('usualpain') == '1') ? 'selected' : null }}>Moderate</option>
                    <option value="0" {{ (old('usualpain') == '0') ? 'selected' : null }}>Severe</option>
                </select>
                @error('usualpain')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="wardrobe" class="basis-1/3 shrink-0">Could you hang your clothes up in a wardrobe, using the affected arm?</label>
                <select name="wardrobe" id="wardrobe" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('wardrobe') == '4') ? 'selected' : null }}>Yes Easily</option>
                    <option value="3" {{ (old('wardrobe') == '3') ? 'selected' : null }}>With Little Difficulty</option>
                    <option value="2" {{ (old('wardrobe') == '2') ? 'selected' : null }}>With Moderate Difficulty</option>
                    <option value="1" {{ (old('wardrobe') == '1') ? 'selected' : null }}>With Extreme Difficulty</option>
                    <option value="0" {{ (old('wardrobe') == '0') ? 'selected' : null }}>Not Possible</option>
                </select>
                @error('wardrobe')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>


            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="wash" class="basis-1/3 shrink-0">Have you been able to wash and dry yourself under both arms?</label>
                <select name="wash" id="wash" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('wash') == '4') ? 'selected' : null }}>Yes Easily</option>
                    <option value="3" {{ (old('wash') == '3') ? 'selected' : null }}>With Little Difficulty</option>
                    <option value="2" {{ (old('wash') == '2') ? 'selected' : null }}>With Moderate Difficulty</option>
                    <option value="1" {{ (old('wash') == '1') ? 'selected' : null }}>With Extreme Difficulty</option>
                    <option value="0" {{ (old('wash') == '0') ? 'selected' : null }}>Not Possible</option>
                </select>
                @error('wash')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="work" class="basis-1/3 shrink-0">How much has pain from your shoulder interfered with your usual work? (including housework)</label>
                <select name="work" id="work" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('work') == '4') ? 'selected' : null }}>Not At All</option>
                    <option value="3" {{ (old('work') == '3') ? 'selected' : null }}>A Little Bit</option>
                    <option value="2" {{ (old('work') == '2') ? 'selected' : null }}>Moderately</option>
                    <option value="1" {{ (old('work') == '1') ? 'selected' : null }}>Greatly</option>
                    <option value="0" {{ (old('work') == '0') ? 'selected' : null }}>Totally</option>
                </select>
                @error('work')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="bed" class="basis-1/3 shrink-0">Have you been troubled by pain from your shoulder in bed at night?</label>
                <select name="bed" id="bed" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('bed') == '4') ? 'selected' : null }}>No Nights</option>
                    <option value="3" {{ (old('bed') == '3') ? 'selected' : null }}>1 or 2 Nights</option>
                    <option value="2" {{ (old('bed') == '2') ? 'selected' : null }}>Some Nights</option>
                    <option value="1" {{ (old('bed') == '1') ? 'selected' : null }}>Most Nights</option>
                    <option value="0" {{ (old('bed') == '0') ? 'selected' : null }}>Every Night</option>
                </select>
                @error('bed')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>
        </fieldset>

        <x-primary-button>Submit</x-primary-button>        

    </form>

</x-app-layout>