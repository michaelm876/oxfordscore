<x-app-layout>
    <x-slot:heading>
        <a href="{{ route('dashboard') }}">Oxford Scores - Records</a>
    </x-slot>

    <section class="mb-8">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-lg text-gray-800">Hip ID: {{ $hip->id }}</h3>
            <p class="italic">Submitted: {{ $hip->created_at->format('d/m/Y') }}</p>
        @if($hip->updated_at->ne($hip->created_at))
            <p class="italic">Updated: {{ $hip->updated_at->format('d/m/Y') }}</p>
        @endif
            <div class="flex gap-6">
                <a title="Back to hip submissions" href="{{ route('hips.index') }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-arrow-left class="w-5 h-5"/>
                </a>
                <a title="Edit record" href="{{ route('hips.edit', $hip) }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-pen-to-square class="w-5 h-5"/>
                </a> 
                <a title="Print record" href="javascript:if(window.print)window.print()" class="text-gray-600 hover:text-gray-900">
                    <x-fas-print class="w-5 h-5"/>
                </a>                                
            </div>
        </div>
        <hr class="my-4"/>        
    </section>

@if(isset($hip->chi))
    <section class="mb-8">
        <h2 class="font-semibold text-3xl text-gray-800 mb-4">{{ strtoupper($hip->name) }}</h2>
        <p class="mb-2">CHI: 
        @if(isset($hip->chi))
            <span class="font-bold">{{ $hip->chi }}</span>
        @else
            <a href="{{ route('hips.edit', $hip) }}" class="nice-blue-text hover:text-sky-500">Required</a>
        @endif
        </p>
        <p class="mb-2">Date of Birth: <span class="font-bold">{{ $hip->dob->format('d/m/Y') }}</span></p>
    @if(isset($hip->surgery_cancelled) && $hip->surgery_cancelled == true)
        <p class="mb-2">Surgery Cancelled?: <span class="font-bold">✓</span></p>
    @else
        <p class="mb-2">Surgery Type: 
        @if(isset($hip->surgery_type))
            <span class="font-bold">{{ strtoupper($hip->surgery_type) }}</span>
        @else
            <a href="{{ route('hips.edit', $hip) }}" class="nice-blue-text hover:text-sky-500">Required</a>
        @endif
        </p>
        <p class="mb-2">Surgery Date: 
        @if(isset($hip->surgery_date))
            <span class="font-bold">{{ $hip->surgery_date->format('d/m/Y') }}</span>
        @else
            <a href="{{ route('hips.edit', $hip) }}" class="nice-blue-text hover:text-sky-500">Required</a>
        @endif
        </p>
    @if(isset($hip->surgery_notfv) && $hip->surgery_notfv == true)
        <p class="mb-2">Surgery Not in Forth Valley?: <span class="font-bold">✓</span></p>
    @else
        <p class="mb-2">Consultant: 
        @if(isset($hip->consultant))
            <span class="font-bold">{{ $hip->consultant->name }}</span>
        @else
            <a href="{{ route('hips.edit', $hip) }}" class="nice-blue-text hover:text-sky-500">Required</a>
        @endif
        </p>
    @endif
    @endif
        <p class="mb-2">Joint: <span class="font-bold">{{ $hip->joint }}</span></p>
        <p class="mb-2">Current Situation: <span class="font-bold">{{ $hip->type }}</span></p>
        <hr class="my-4"/>
    </section>

    <section class="mb-8">
        <table class="w-full mb-6">
            <thead>
                <tr class="border border-gray-200 bg-gray-100">
                    <th class="text-left p-2">Question</th>
                    <th class="text-left p-2 w-24">Score</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Description of Pain</td>
                    <td class="text-left p-2 font-bold">{{ $hip->pain }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Trouble Washing</td>
                    <td class="text-left p-2 font-bold">{{ $hip->washing }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Trouble With Car/Transport</td>
                    <td class="text-left p-2 font-bold">{{ $hip->car }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Trouble Using Socks/Tights</td>
                    <td class="text-left p-2 font-bold">{{ $hip->socks }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Trouble With Household Shopping</td>
                    <td class="text-left p-2 font-bold">{{ $hip->shopping }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Trouble Walking</td>
                    <td class="text-left p-2 font-bold">{{ $hip->walking }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Trouble Using Stairs</td>
                    <td class="text-left p-2 font-bold">{{ $hip->stairs }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Trouble Standing Up After A Meal</td>
                    <td class="text-left p-2 font-bold">{{ $hip->meal }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Hip Casues Limping</td>
                    <td class="text-left p-2 font-bold">{{ $hip->limping }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Sudden Pains Or Spasms</td>
                    <td class="text-left p-2 font-bold">{{ $hip->spasms }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Problem Completing Housework</td>
                    <td class="text-left p-2 font-bold">{{ $hip->work }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Trouble In Bed</td>
                    <td class="text-left p-2 font-bold">{{ $hip->bed }}</td>
                </tr>
            </tbody>
        </table>
        <p class="text-3xl">Total Score: <span class="font-bold">{{ 
            $hip->pain
            + $hip->washing
            + $hip->car
            + $hip->socks
            + $hip->shopping
            + $hip->walking
            + $hip->stairs
            + $hip->meal
            + $hip->limping
            + $hip->spasms
            + $hip->work
            + $hip->bed
        }}</span></p>
        <hr class="my-4"/>
    </section>

    <section class="mb-8">
    @unless($related->isEmpty())
        <h3 class="font-semibold text-lg text-gray-800 mb-4">More Hip Records for {{ strtoupper($hip->name) }}</h3>
        <x-submissions-table-related type="hips" :data="$related" />
    @else
        <h3 class="font-semibold text-lg text-gray-800 mb-4">{{ strtoupper($hip->name) }} has no other hip records associated with this CHI number</h3>
    @endunless
    </section>    

    <section class="mb-8">
        <h3 class="font-semibold text-lg text-gray-800 mb-4">Comments</h3>
        <x-comment-form commentable_type="App\Models\Hip" :commentable_id="$hip->id" />
    @foreach($comments as $comment)
        <x-comment :comment="$comment" />
    @endforeach
    </section>

@else
    <section class="mb-8">
        <x-chi-form type="hips" :submission="$hip" />
    </section>
@endif


</x-app-layout>