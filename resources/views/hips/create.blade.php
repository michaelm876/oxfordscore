<x-app-layout>

    <h2 class="font-semibold text-2xl text-gray-800">New Hip Submission</h2>
    <hr class="my-4"/>     
    <p class="my-8">Please fill out the questions below and press submit when complete.</p>

    <form method="POST" action="{{ route('hips.index') }}" autocomplete="off">
        @csrf
        <fieldset class="p-4 bg-slate-50 mb-8">
            <legend class="form-margin font-semibold text-xl text-gray-800">Your Details</legend>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="name" class="basis-1/3 shrink-0">Your Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                @error('name')
                <p class="text-red-700 font-semibold">Please enter your Full Name.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="dob" class="basis-1/3 shrink-0">Date of Birth</label>
                <input type="date" name="dob" id="dob" value="{{ old('dob') }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
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
                <label for="pain" class="basis-1/3 shrink-0">How would you describe the pain you would usually have from your hip?</label>
                <select name="pain" id="pain" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
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
                <label for="washing" class="basis-1/3 shrink-0">Have you had any trouble washing and drying yourself all over because of your hip?</label>
                <select name="washing" id="washing" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('washing') == '4') ? 'selected' : null }}>No Trouble</option>
                    <option value="3" {{ (old('washing') == '3') ? 'selected' : null }}>Very Little Trouble</option>
                    <option value="2" {{ (old('washing') == '2') ? 'selected' : null }}>Moderate Trouble</option>
                    <option value="1" {{ (old('washing') == '1') ? 'selected' : null }}>Extremely Difficult</option>
                    <option value="0" {{ (old('washing') == '0') ? 'selected' : null }}>Impossible to do</option>
                </select>
                @error('washing')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="car" class="basis-1/3 shrink-0">Have you had trouble getting in and out of a car or using public transport because of your hip?</label>
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
                <label for="socks" class="basis-1/3 shrink-0">Have you been able to put on a pair of socks, stockings or tights?</label>
                <select name="socks" id="socks" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('socks') == '4') ? 'selected' : null }}>Yes Easily</option>
                    <option value="3" {{ (old('socks') == '3') ? 'selected' : null }}>With Little Difficulty</option>
                    <option value="2" {{ (old('socks') == '2') ? 'selected' : null }}>With Moderate Difficulty</option>
                    <option value="1" {{ (old('socks') == '1') ? 'selected' : null }}>With Extreme Difficulty</option>
                    <option value="0" {{ (old('socks') == '0') ? 'selected' : null }}>Not Possible</option>
                </select>
                @error('socks')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="shopping" class="basis-1/3 shrink-0">Could you do household shopping on your own?</label>
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
                <label for="walking" class="basis-1/3 shrink-0">For how long have you been able to walk before pain from your hip becomes severe? (with or without a stick)</label>
                <select name="walking" id="walking" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('walking') == '4') ? 'selected' : null }}>No Pain or Over 30mins</option>
                    <option value="3" {{ (old('walking') == '3') ? 'selected' : null }}>16 to 30mins</option>
                    <option value="2" {{ (old('walking') == '2') ? 'selected' : null }}>5 to 15mins</option>
                    <option value="1" {{ (old('walking') == '1') ? 'selected' : null }}>Only Round The House</option>
                    <option value="0" {{ (old('walking') == '0') ? 'selected' : null }}>Not At All</option>
                </select>
                @error('walking')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="stairs" class="basis-1/3 shrink-0">Have you been able to climb a flight of stairs?</label>
                <select name="stairs" id="stairs" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('stairs') == '4') ? 'selected' : null }}>Yes Easily</option>
                    <option value="3" {{ (old('stairs') == '3') ? 'selected' : null }}>With Little Difficulty</option>
                    <option value="2" {{ (old('stairs') == '2') ? 'selected' : null }}>With Moderate Difficulty</option>
                    <option value="1" {{ (old('stairs') == '1') ? 'selected' : null }}>With Extreme Difficulty</option>
                    <option value="0" {{ (old('stairs') == '0') ? 'selected' : null }}>Not Possible</option>
                </select>
                @error('stairs')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="meal" class="basis-1/3 shrink-0">After a meal (sat at a table), how painful has it been for you to stand up from a chair because of your hip?</label>
                <select name="meal" id="meal" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('meal') == '4') ? 'selected' : null }}>Not at all</option>
                    <option value="3" {{ (old('meal') == '3') ? 'selected' : null }}>Slightly Painful</option>
                    <option value="2" {{ (old('meal') == '2') ? 'selected' : null }}>Moderately Painful</option>
                    <option value="1" {{ (old('meal') == '1') ? 'selected' : null }}>Very Painful</option>
                    <option value="0" {{ (old('meal') == '0') ? 'selected' : null }}>Unbearable</option>
                </select>
                @error('meal')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="limping" class="basis-1/3 shrink-0">Have you been limping when walking because of your hip?</label>
                <select name="limping" id="limping" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('limping') == '4') ? 'selected' : null }}>Rarely/never</option>
                    <option value="3" {{ (old('limping') == '3') ? 'selected' : null }}>Sometimes, Just At First</option>
                    <option value="2" {{ (old('limping') == '2') ? 'selected' : null }}>Often, Not Just At First</option>
                    <option value="1" {{ (old('limping') == '1') ? 'selected' : null }}>Most Of The Time</option>
                    <option value="0" {{ (old('limping') == '0') ? 'selected' : null }}>All The Time</option>
                </select>
                @error('limping')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="spasms" class="basis-1/3 shrink-0">Have you had any sudden, severe pain-‘shooting’, ‘stabbing’ or ‘spasms’ from the affected hip?</label>
                <select name="spasms" id="spasms" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('spasms') == '4') ? 'selected' : null }}>None</option>
                    <option value="3" {{ (old('spasms') == '3') ? 'selected' : null }}>1 - 2 Days</option>
                    <option value="2" {{ (old('spasms') == '2') ? 'selected' : null }}>Some Days</option>
                    <option value="1" {{ (old('spasms') == '1') ? 'selected' : null }}>Most Days</option>
                    <option value="0" {{ (old('spasms') == '0') ? 'selected' : null }}>Every Day</option>
                </select>
                @error('spasms')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="work" class="basis-1/3 shrink-0">How much has pain from your hip interfered with your usual work? (including housework)</label>
                <select name="work" id="work" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('work') == '4') ? 'selected' : null }}>Not At All</option>
                    <option value="3" {{ (old('work') == '3') ? 'selected' : null }}>A Little</option>
                    <option value="2" {{ (old('work') == '2') ? 'selected' : null }}>Moderately</option>
                    <option value="1" {{ (old('work') == '1') ? 'selected' : null }}>Greatly</option>
                    <option value="0" {{ (old('work') == '0') ? 'selected' : null }}>Totally</option>
                </select>
                @error('work')
                <p class="text-red-700 font-semibold">Please select an option.</p>
                @enderror     
            </div>

            <div class="flex gap-4 form-margin items-center flex-wrap">
                <label for="bed" class="basis-1/3 shrink-0">Have you been troubled by pain from your hip in bed at night?</label>
                <select name="bed" id="bed" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    <option value="">Please Select</option>
                    <option value="4" {{ (old('bed') == '4') ? 'selected' : null }}>None</option>
                    <option value="3" {{ (old('bed') == '3') ? 'selected' : null }}>1 - 2 Nights</option>
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