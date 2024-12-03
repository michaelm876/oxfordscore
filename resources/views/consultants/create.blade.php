<x-app-layout>
    <x-slot:heading>
        <a href="{{ route('dashboard') }}">Oxford Scores - Consultants</a>
    </x-slot>

    <section class="mb-8">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-lg text-gray-800">Create new Consultant</h3>
            <div class="flex gap-6">
                <a href="{{ route('consultants.index') }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-arrow-left class="w-6 h-6"/>
                </a>              
            </div>
        </div>
        <hr class="my-4"/>        
    </section>

    <section class="mb-8">
        <form method="POST" action="{{ route('consultants.index') }}">
            @csrf

            <div class="flex gap-4 mb-4 items-center flex-wrap">
                <label for="name" class="basis-1/3 shrink-0">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                @error('name')
                <p class="text-red-700 font-semibold">Please enter the Consultant's name.</p>
                @enderror
            </div>

            <x-primary-button>Submit</x-primary-button>

        </form>
    </section>

</x-app-layout>