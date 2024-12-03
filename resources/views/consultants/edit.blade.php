<x-app-layout>
    <x-slot:heading>
        <a href="{{ route('dashboard') }}">Oxford Scores - Consultants</a>
    </x-slot>

    <section class="mb-8">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-lg text-gray-800">Editing Consultant ID: {{ $consultant->id }}</h3>
            <div class="flex gap-6">
                <a title="Back to consultants" href="{{ route('consultants.index') }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-arrow-left class="w-5 h-5"/>
                </a>              
            </div>
        </div>
        <hr class="my-4"/>        
    </section>

    <section class="mb-4">
        <form method="POST" action="{{route('consultants.update', $consultant)}}">
            @csrf
            @method('PATCH')

            <div class="flex gap-4 mb-4 items-center flex-wrap">
                <label for="name" class="basis-1/3 shrink-0">Name:</label>
                <input type="text" name="name" id="name" value="{{ $consultant->name }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
                @error('name')
                <p class="text-red-700 font-semibold">Please enter the Consultant's name.</p>
                @enderror
            </div>

            <div class="flex gap-4 mb-8 items-center flex-wrap">
                <label for="is_active" class="basis-1/3 shrink-0">Active:</label>
                <input
                    type="checkbox"
                    name="is_active"
                    id="is_active"
                    class="cursor-pointer border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm"
                    {{ $consultant->is_active ? 'checked' : null }}
                >
                @error('is_active')
                <p class="text-red-700 font-semibold">Error.</p>
                @enderror
            </div>

            <x-primary-button>Update Consultant</x-primary-button>

        </form>
    </section>

</x-app-layout>