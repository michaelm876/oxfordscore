@props(['type', 'data'])


<table class="w-full">
    <thead>
        <tr class="border border-gray-200 bg-gray-100">
            <th class="text-left p-2">ID</th>
            <th class="text-left p-2">Situation</th>
            <th class="text-left p-2">Surgery</th>
            <th class="text-left p-2">Consultant</th>
            <th class="text-left p-2">Score</th>
            <th class="text-left p-2">Submitted</th>
            <th class="text-left p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
        <tr class="border border-gray-200 even:bg-gray-50">
            <td class="text-left p-2">{{ $d->id }}</td>
            <td class=" text-left p-2">{{ $d->type }}</td>
            <td class="text-left p-2">
            @if(isset($d->surgery_type))
                {{ strtoupper($d->surgery_type) }}
            @else
                <a href="{{ route($type . '.edit', $d) }}" class="nice-blue-text hover:text-sky-500">Required</a>
            @endif
            </td>
            <td class="text-left p-2">
            @if(isset($d->consultant))
               {{ $d->consultant->name }}
            @else
                <a href="{{ route($type . '.edit', $d) }}" class="nice-blue-text hover:text-sky-500">Required</a>
            @endif
            </td>
            <td class="text-left p-2 font-bold">
            @switch($type)
                @case('hips')
                    {{
                          $d->bed
                        + $d->car
                        + $d->limping
                        + $d->meal
                        + $d->pain
                        + $d->shopping
                        + $d->socks
                        + $d->spasms
                        + $d->stairs
                        + $d->walking
                        + $d->washing
                        + $d->work
                    }}
                    @break             
                @case('knees')
                    {{
                          $d->bed
                        + $d->car
                        + $d->give
                        + $d->kneel
                        + $d->limping
                        + $d->meal
                        + $d->pain
                        + $d->shopping
                        + $d->stairs
                        + $d->walking
                        + $d->washing
                        + $d->work
                    }}
                    @break             
                @case('shoulders')
                    {{
                          $d->bed
                        + $d->car
                        + $d->cutlery
                        + $d->dressing
                        + $d->hair
                        + $d->pain
                        + $d->shopping
                        + $d->tray
                        + $d->usualpain
                        + $d->wardrobe
                        + $d->wash
                        + $d->work
                    }}
                    @break             
                @default
                    N/A
            @endswitch
            </td>
            <td class="text-left p-2">{{ $d->created_at->format('d/m/Y') }}</td>
            <td class="text-left p-2 flex gap-4">
                <a title="View record" href="{{ route($type . '.show', $d) }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-eye class="w-5 h-5"/>
                </a>   
            </td>
        </tr>
    @endforeach
    </tbody>
</table> 