<x-app-layout>
    <x-slot:heading>
        <a href="{{ route('dashboard') }}">Oxford Scores - Records</a>
    </x-slot>

    <section class="mb-8">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-lg text-gray-800">Knee Submission ID: {{ $knee->id }}</h3>
            <p class="italic">Submitted: {{ $knee->created_at->format('d/m/Y') }}</p>
        @if($knee->updated_at->ne($knee->created_at))
            <p class="italic">Updated: {{ $knee->updated_at->format('d/m/Y') }}</p>
        @endif
            <div class="flex gap-6">
                <a title="Back to knee submissions" href="{{ route('knees.index') }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-arrow-left class="w-5 h-5"/>
                </a>
                <a title="Edit record" href="{{ route('knees.edit', $knee) }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-pen-to-square class="w-5 h-5"/>
                </a>   
                <a title="Print record" href="javascript:if(window.print)window.print()" class="text-gray-600 hover:text-gray-900">
                    <x-fas-print class="w-5 h-5"/>
                </a>                             
            </div>
        </div>
        <hr class="my-4"/>        
    </section>

@if(isset($knee->chi))
    <section class="mb-8">
        <h2 class="font-semibold text-3xl text-gray-800 mb-4">{{ strtoupper($knee->name) }}</h2>
        <p class="mb-2">CHI: 
        @if(isset($knee->chi))
            <span class="font-bold">{{ $knee->chi }}</span>
        @else
            <a href="{{ route('knees.edit', $knee) }}" class="nice-blue-text hover:text-sky-500">Required</a>
        @endif
        </p>
        <p class="mb-2">Date of Birth: <span class="font-bold">{{ $knee->dob->format('d/m/Y') }}</span></p>
    @if(isset($knee->surgery_cancelled) && $knee->surgery_cancelled == true)
        <p class="mb-2">Surgery Cancelled?: <span class="font-bold">✓</span></p>
    @else
        <p class="mb-2">Surgery Type: 
        @if(isset($knee->surgery_type))
            <span class="font-bold">{{ strtoupper($knee->surgery_type) }}</span>
        @else
            <a href="{{ route('knees.edit', $knee) }}" class="nice-blue-text hover:text-sky-500">Required</a>
        @endif
        </p>
        <p class="mb-2">Surgery Date: 
        @if(isset($knee->surgery_date))
            <span class="font-bold">{{ $knee->surgery_date->format('d/m/Y') }}</span>
        @else
            <a href="{{ route('knees.edit', $knee) }}" class="nice-blue-text hover:text-sky-500">Required</a>
        @endif
        </p>
    @if(isset($knee->surgery_notfv) && $knee->surgery_notfv == true)
        <p class="mb-2">Surgery Not in Forth Valley?: <span class="font-bold">✓</span></p>
    @else
        <p class="mb-2">Consultant: 
        @if(isset($knee->consultant))
            <span class="font-bold">{{ $knee->consultant->name }}</span>
        @else
            <a href="{{ route('knees.edit', $knee) }}" class="nice-blue-text hover:text-sky-500">Required</a>
        @endif
        </p>
    @endif
    @endif
        <p class="mb-2">Joint: <span class="font-bold">{{ $knee->joint }}</span></p>
        <p class="mb-2">Current Situation: <span class="font-bold">{{ $knee->type }}</span></p>
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
                    <td class="text-left p-2 font-bold">{{ $knee->pain }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Trouble Washing</td>
                    <td class="text-left p-2 font-bold">{{ $knee->washing }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Trouble With Car/Transport</td>
                    <td class="text-left p-2 font-bold">{{ $knee->car }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Trouble Walking</td>
                    <td class="text-left p-2 font-bold">{{ $knee->walking }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Knee Causes Limping</td>
                    <td class="text-left p-2 font-bold">{{ $knee->limping }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Ability To Kneel</td>
                    <td class="text-left p-2 font-bold">{{ $knee->kneel }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Standing Up After A Meal</td>
                    <td class="text-left p-2 font-bold">{{ $knee->meal }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Trouble In Bed</td>
                    <td class="text-left p-2 font-bold">{{ $knee->bed }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Trouble With Housework</td>
                    <td class="text-left p-2 font-bold">{{ $knee->work }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Knee Suddenly Gives Way</td>
                    <td class="text-left p-2 font-bold">{{ $knee->give }}</td>
                </tr>
                <tr class="border border-gray-200">
                    <td class="text-left p-2">Ability To Do Shopping</td>
                    <td class="text-left p-2 font-bold">{{ $knee->shopping }}</td>
                </tr>
                <tr class="border border-gray-200 bg-gray-50">
                    <td class="text-left p-2">Able To Walk Down Stairs</td>
                    <td class="text-left p-2 font-bold">{{ $knee->stairs }}</td>
                </tr>
            </tbody>
        </table>
        <p class="text-3xl">Total Score: <span class="font-bold">{{ 
            $knee->pain
            + $knee->washing
            + $knee->car
            + $knee->walking
            + $knee->limping
            + $knee->kneel
            + $knee->meal
            + $knee->bed
            + $knee->work
            + $knee->give
            + $knee->shopping
            + $knee->stairs
        }}</span></p>
        <hr class="my-4"/>
    </section>

    <section class="mb-8">
    @unless($related->isEmpty())
        <h3 class="font-semibold text-lg text-gray-800 mb-4">More Knee Records for {{ strtoupper($knee->name) }}</h3>
        <x-submissions-table-related type="knees" :data="$related" />
    @else
        <h3 class="font-semibold text-lg text-gray-800 mb-4">{{ strtoupper($knee->name) }} has no other knee records associated with this CHI number</h3>
    @endunless
    </section> 

    <section class="mb-8">
        <h3 class="font-semibold text-lg text-gray-800 mb-4">Comments</h3>
        <x-comment-form commentable_type="App\Models\Knee" :commentable_id="$knee->id" />
    @foreach($comments as $comment)
        <x-comment :comment="$comment" />
    @endforeach
    </section>

@else
    <section class="mb-8">
        <x-chi-form type="knees" :submission="$knee" />
    </section>
@endif

</x-app-layout>