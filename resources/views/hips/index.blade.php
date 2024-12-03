<x-app-layout>
    <x-slot:heading>
        <a href="{{ route('dashboard') }}">Oxford Scores - Records</a>
    </x-slot>

    <div class="mb-8">
        @include('layouts.secondary-nav')        
    </div>

    <div class="mb-6 flex items-center justify-between">
    @if (request()->get('q') !== null)
        <h2 class="font-semibold text-lg text-gray-800">Search results for: {{ request()->get('q') }}</h2>
    @else
        <h2 class="font-semibold text-lg text-gray-800">Hip Records</h2>    
    @endif
        <x-search submission="hips" />        
    </div>
    
    <x-submissions-table type="hips" :data="$hips" />

    <div class="mb-4 mt-8">
        {{ $hips->appends(request()->query())->links() }}
    </div>

</x-app-layout>