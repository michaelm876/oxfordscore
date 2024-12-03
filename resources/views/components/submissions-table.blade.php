@props(['type', 'data'])

<table class="w-full">
    <thead>
        <tr class="border border-gray-200 bg-gray-100">
            <th class="text-left p-2">ID</th>
            <th class="text-left p-2 w-2/5">Patient</th>
            <th class="text-left p-2">DOB</th>
            <th class="text-left p-2">CHI</th>
            <th class="text-left p-2">Consultant</th>
            <th class="text-left p-2">Submitted</th>
            <th class="text-left p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
        <tr class="border border-gray-200 even:bg-gray-50">
            <td class="text-left p-2">{{ $d->id }}</td>
            <td class=" text-left p-2"> <a href="{{ route($type . '.show', $d) }}" class="nice-blue-text hover:text-sky-500">{{ strtoupper($d->name) }}<a></td>
            <td class="text-left p-2">{{ $d->dob->format('d/m/Y') }}</td>
            <td class="text-left p-2">
            @if(isset($d->chi))
                {{ $d->chi }}
            @else
                <a href="{{ route($type . '.edit', $d) }}" class="nice-blue-text hover:text-sky-500">Required</a>
            @endif
            </td>
            <td class="text-left p-2">
            @if(isset($d->surgery_notfv) && $d->surgery_notfv == true)
                N/A
            @else
            @if(isset($d->consultant))
                {{ $d->consultant->name }}
            @else
                <a href="{{ route($type . '.edit', $d) }}" class="nice-blue-text hover:text-sky-500">Required</a>
            @endif
            @endif
            </td>
            <td class="text-left p-2">{{ $d->created_at->format('d/m/Y') }}</td>
            <td class="text-left p-2 flex gap-4">
                <a title="View record" href="{{ route($type . '.show', $d) }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-eye class="w-5 h-5"/>
                </a>
                <a title="Edit record" href="{{ route($type . '.edit', $d) }}" class="text-gray-600 hover:text-gray-900">
                    <x-fas-pen-to-square class="w-5 h-5"/>
                </a>    
            </td>
        </tr>
    @endforeach
    </tbody>
</table> 