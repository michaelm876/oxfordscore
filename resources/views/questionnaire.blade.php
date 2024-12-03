<x-app-layout>
    
    <h2 class="mb-4 font-semibold text-2xl text-gray-800">Which type of operation is this for?</h2>

    <p class="mb-8">Please select whether you are having (or have had) a hip, knee or shoulder operation.</p>

    <x-dropdown align="left">
        <x-slot name="trigger">
            <x-primary-button>
                <div>Please Select</div>
                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>      
            </x-primary-button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link href="{{ route('hips.create') }}">Hip</x-dropdown-link>                 
            <x-dropdown-link href="{{ route('knees.create') }}">Knee</x-dropdown-link>                 
            <x-dropdown-link href="{{ route('shoulders.create') }}">Shoulder</x-dropdown-link>
        </x-slot>
    </x-dropdown>

</x-app-layout>