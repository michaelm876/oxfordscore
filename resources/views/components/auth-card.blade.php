<div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
    <p class="text-center mt-6 text-sm text-gray-600">© NHS Forth Valley - Oxford Scores</p>
</div>