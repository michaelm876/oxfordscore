@props(['comment'])

<div class="p-2 mb-2">
    <div class="flex gap-4 items-center">
        <h4 class="font-semibold text-lg text-gray-800"><a class="nice-blue-text hover:text-sky-500" href="mailto:{{ $comment->user->email }}">{{ $comment->user->name }}</a></h4>
        <p class="italic">{{ $comment->created_at->diffForHumans() }}</p>
    </div>
    <p class="mb-4">{{ $comment->body }}</p>
    <hr />
</div>