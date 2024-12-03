<x-app-layout>
    <x-slot:heading>
        <a href="{{ route('dashboard') }}">Oxford Scores - Records</a>
    </x-slot>

    <div class="mb-8">
        @include('layouts.secondary-nav')        
    </div>

    <section class="mb-8">
        <h2 class="mb-4 font-semibold text-lg text-gray-800">Latest Hip Records</h2>
        <x-submissions-table type="hips" :data="$hips" />
        <p class="mt-3"><a class="nice-blue-text hover:text-sky-500" href="{{route('hips.index')}}">View All →</a></p>
    </section>

    <section class="mb-8">
        <h2 class="mb-4 font-semibold text-lg text-gray-800">Latest Knee Records</h2>
        <x-submissions-table type="knees" :data="$knees" />
        <p class="mt-3"><a class="dark-blue-text hover:text-sky-500" href="{{route('knees.index')}}">View All →</a></p>        
    </section>

    <section class="mb-8">
        <h2 class="mb-4 font-semibold text-lg text-gray-800">Latest Shoulder Records</h2>
        <x-submissions-table type="shoulders" :data="$shoulders" />
        <p class="mt-3"><a class="nice-blue-text hover:text-sky-500" href="{{route('shoulders.index')}}">View All →</a></p>
    </section>

</x-app-layout>
