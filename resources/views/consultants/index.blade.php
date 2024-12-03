<x-app-layout>
    <x-slot:heading>
        <a href="{{ route('dashboard') }}">Oxford Scores - Consultants</a>
    </x-slot>

    <section class="mb-8">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-lg text-gray-800">All Consultants</h3>
            <div class="flex gap-6">
                <a href="{{ route('consultants.create') }}" title="Add new consultant" class="text-gray-600 hover:text-gray-900">
                    <x-fas-plus class="w-5 h-5"/>
                </a>              
            </div>
        </div>
        <hr class="my-4"/>        
    </section>

    <section class="mb-8">
        @if(count($errors) > 0 )
        <p class="mb-4 text-red-700 font-semibold">
            @foreach($errors->all() as $error)
            {{$error}}
            @endforeach
        </p>
        @endif        
        <table class="w-full">
            <thead>
                <tr class="border border-gray-200 bg-gray-100">
                    <th class="text-left p-4">ID</th>
                    <th class="text-left p-4 w-3/4">Name</th>
                    <th class="text-left p-4">Active</th>
                    <th class="text-left p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($consultants as $consultant)
                <tr class="border border-gray-200 even:bg-gray-50">
                    <td class="text-left p-4">{{ $consultant->id }}</td>
                    <td class="text-left p-4">{{ $consultant->name }}</td>
                    <td class="text-left p-4">{{ $consultant->is_active ? '✓' : '⨉' }}</td>
                    <td class="p-4 flex gap-8">
                        <a href="{{ route('consultants.edit', $consultant) }}" title="Edit Consultant" class="text-gray-600 hover:text-gray-900">
                            <x-fas-pen-to-square class="w-5 h-5"/>
                        </a>
                        <form method="POST" action="{{ route('consultants.destroy', $consultant) }}">
                            @csrf
                            @method('DELETE')

                            <button title="Delete Consultant" class="text-gray-600 hover:text-gray-900">
                                <x-fas-trash class="w-5 h-5"/>
                            </button>
                        </form>   
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

</x-app-layout>