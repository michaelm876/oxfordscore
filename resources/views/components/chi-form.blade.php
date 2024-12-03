@props(['type', 'submission'])

<h2 class="font-semibold text-2xl text-gray-800 mb-4">Information Required</h2>

<p class="mb-8">Please enter the CHI number for <span class="font-bold">{{ strtoupper($submission->name) }} ({{ $submission->dob->format('d/m/Y') }})</span> to complete the record. Surgery date and consultant can be added later.</p>

<form method="POST" action="{{ route($type . '.update', $submission) }}">
    @csrf
    @method('PATCH')

    <input type="hidden" name="name" value="{{ $submission->name }}" />
    <input type="hidden" name="dob" value="{{ $submission->dob }}" />
    <input type="hidden" name="joint" value="{{ $submission->joint }}" />
    <input type="hidden" name="type" value="{{ $submission->type }}" />

    <div class="flex gap-4 mb-8 items-center flex-wrap">
        <label for="chi">CHI:</label>
        <input type="text" name="chi" id="chi" value="{{ old('chi') }}" class="grow max-w-xs cursor-text border-gray-300 focus:border-sky-400 focus:ring-sky-400 rounded-md shadow-sm">
        @error('chi')
        <p class="text-red-700 font-semibold">Please enter the patient's CHI number.</p>
        @enderror
    </div>

    <x-primary-button>Update & View Record</x-primary-button>

</form>