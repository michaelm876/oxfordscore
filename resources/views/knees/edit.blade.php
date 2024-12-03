<x-app-layout>
    <x-slot:heading>
        <a href="{{ route('dashboard') }}">Oxford Scores - Records</a>
    </x-slot>

    <section class="mb-8">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-lg text-gray-800">Editing Knee Submission ID: {{ $knee->id }}</h3>
            <div class="flex gap-6">
                <a title="Back to record" href="{{ route('knees.show', $knee) }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-arrow-left class="w-5 h-5"/>
                </a>              
            </div>
        </div>
        <hr class="my-4"/>        
    </section>


    <section class="mb-8">
        <form method="POST" action="{{ route('knees.update', $knee) }}">
            @csrf
            @method('PATCH')
            <fieldset class="p-4 bg-slate-50 mb-8">
                <legend class="mb-4 font-semibold text-xl text-gray-800">Patient Details</legend>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="name" class="basis-1/3 shrink-0">Full Name:</label>
                    <input type="text" name="name" id="name" value="{{ $knee->name }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    @error('name')
                    <p class="text-red-700 font-semibold">Please enter the patient's Full Name.</p>
                    @enderror
                </div>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="chi" class="basis-1/3 shrink-0">CHI:</label>
                    <input type="text" name="chi" id="chi" value="{{ $knee->chi }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    @error('chi')
                    <p class="text-red-700 font-semibold">Please enter the patient's CHI number.</p>
                    @enderror
                </div>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="dob" class="basis-1/3 shrink-0">Date of Birth:</label>
                    <input type="date" name="dob" id="dob" value="{{ $knee->dob->format('Y-m-d') }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    @error('dob')
                    <p class="text-red-700 font-semibold">Please enter the patient's Date of Birth.</p>
                    @enderror     
                </div>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="surgery_cancelled" class="basis-1/3 shrink-0">Surgery Cancelled?:</label>
                    <input
                        type="checkbox"
                        name="surgery_cancelled"
                        id="surgery_cancelled"
                        class="cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm"
                        {{ $knee->surgery_cancelled ? 'checked' : null }}
                    >
                    @error('surgery_cancelled')
                    <p class="text-red-700 font-semibold">Error.</p>
                    @enderror
                </div>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="surgery_type" class="basis-1/3 shrink-0">Type of Surgery:</label>
                    <input type="text" name="surgery_type" id="surgery_type" value="{{ $knee->surgery_type }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    @error('surgery_type')
                    <p class="text-red-700 font-semibold">Please enter the type of surgery.</p>
                    @enderror
                </div>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="surgery_date" class="basis-1/3 shrink-0">Date of Surgery:</label>
                    <input type="date" name="surgery_date" id="surgery_date" value="{{ $knee->surgery_date?->format('Y-m-d') }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                    @error('surgery_date')
                    <p class="text-red-700 font-semibold">Please enter the date of surgery.</p>
                    @enderror     
                </div>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="surgery_notfv" class="basis-1/3 shrink-0">Surgery Not in Forth Valley?:</label>
                    <input
                        type="checkbox"
                        name="surgery_notfv"
                        id="surgery_notfv"
                        class="cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm"
                        {{ $knee->surgery_notfv ? 'checked' : null }}
                    >
                    @error('surgery_notfv')
                    <p class="text-red-700 font-semibold">Error.</p>
                    @enderror
                </div>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="consultant_id" class="basis-1/3 shrink-0">Consultant:</label>
                    <select name="consultant_id" id="consultant_id" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                        <option value="">Please Select</option>
                    @foreach( $consultants as $consultant )
                        <option {{ $knee->consultant?->id == $consultant->id ? 'selected' : null }} value="{{ $consultant->id }}">{{ $consultant->name }}</option>
                    @endforeach
                    </select>
                    @error('consultant_id')
                    <p class="text-red-700 font-semibold">Please select an option.</p>
                    @enderror     
                </div>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="joint" class="basis-1/3 shrink-0">Joint:</label>
                    <select name="joint" id="joint" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                        <option value="">Please Select</option>
                        <option {{ $knee->joint == 'Left' ? 'selected' : null }}>Left</option>
                        <option {{ $knee->joint == 'Right' ? 'selected' : null }}>Right</option>
                        <option {{ $knee->joint == 'Bilateral' ? 'selected' : null }}>Bilateral</option>
                    </select>
                    @error('joint')
                    <p class="text-red-700 font-semibold">Please select an option.</p>
                    @enderror     
                </div>

                <div class="flex gap-4 mb-4 items-center flex-wrap">
                    <label for="type" class="basis-1/3 shrink-0">Current Situation:</label>
                    <select name="type" id="type" class="grow max-w-xs cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                        <option value="">Please Select</option>
                        <option {{ $knee->type == 'Pre Operation' ? 'selected' : null }}>Pre Operation</option>
                        <option {{ $knee->type == 'Year 1 Post Operation' ? 'selected' : null }}>Year 1 Post Operation</option>
                        <option {{ $knee->type == 'Year 5 Post Operation' ? 'selected' : null }}>Year 5 Post Operation</option>
                        <option {{ $knee->type == 'Year 10 Post Operation' ? 'selected' : null }}>Year 10 Post Operation</option>
                        <option {{ $knee->type == 'Subsequent Years' ? 'selected' : null }}>Subsequent Years</option>
                    </select>
                    @error('type')
                    <p class="text-red-700 font-semibold">Please select an option.</p>
                    @enderror     
                </div>
            </fieldset>

            <x-primary-button>Update Record</x-primary-button>

        </form>
    </section>

</x-app-layout>