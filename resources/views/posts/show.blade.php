<x-layout>
    <x-slot name="title">
        {{ $post->title }} - My BBS
    </x-slot>
    <div class="mt-4">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <h1 class="border-b border-black m-4 pb-2 flex items-center">
        <span class="text-lg font-bold">{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}" class="ml-auto mr-1">[Edit]</a>
        <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post">
            @method('DELETE')
            @csrf

            <button>[x]</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>
    <h2 class="font-bold m-4 pb-2">Comment</h2>
    <ul>
        <li>
            <form method="post" action="{{ route('comments.store', $post) }}" class="flex">
                @csrf

                <input type="text" name="body" class="border border-black rounded-sm p-1 w-full box-border">
                <button class="ml-2">[Add]</button>
            </form>
        </li>
        @foreach ($comments as $comment)
        <li>
            {{ $comment->body }}
            <form method="post" action="{{ route('comments.destroy', $comment) }}" class="inline-block">
                @method('DELETE')
                @csrf

                <button>[x]</button>
            </form>
        </li>
        @endforeach
    </ul>

    <script>
        'use strict';
        {
            document.getElementById('delete_post').addEventListener('submit', (e) => {
                e.preventDefault();

                if (!confirm('Sure to delete?')) {
                    return;
                }
                e.target.submit();
            });

            document.querySelectorAll('.inline-block').forEach((form) => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    if (!confirm('Sure to delete?')) {
                    return;
                }
                e.target.submit();
                })
            })
        }
    </script>
</x-layout>
