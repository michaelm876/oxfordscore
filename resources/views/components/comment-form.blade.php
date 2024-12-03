@props(['commentable_type', 'commentable_id'])

<form method="POST" action="{{ route('comments.store') }}" class="mb-6">
    @csrf
    <input type="hidden" name="commentable_type" value="{{ $commentable_type }}">
    <input type="hidden" name="commentable_id" value="{{ $commentable_id }}">
    <div class="p-2 flex items-center justify-between border border-gray-300 rounded-md shadow-sm">
        <label for="body" class="offscreen">Write your comment:</label>
        <textarea
            id="body"
            name="body"
            class="w-full p-2 resize-none border-none rounded focus:ring-sky-400"
            placeholder="Add comment..."
        ></textarea>
        <button class="p-2 text-gray-600 hover:text-gray-900 mx-4">
            <x-fas-paper-plane class="w-6 h-6"/>
        </button>                
    </div>
</form>