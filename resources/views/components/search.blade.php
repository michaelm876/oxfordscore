@props(['submission'])

<form method="GET" action="{{ route($submission . '.index') }}">
	<div class="p-1 flex items-center justify-between border border-gray-300 rounded-md shadow-sm">
		<label for="q" class="offscreen">Input your search query:</label>
		<input type="text" name="q" id="q" placeholder="CHI, Name or Consultant" class="w-full rounded-md p-1 border-none focus:ring-sky-400"/>
	    <button title="Search for submissions" class="p-1 text-gray-600 hover:text-gray-900 mx-4">
	        <x-fas-search class="w-5 h-5"/>
	    </button>
	</div>
</form>