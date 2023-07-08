<x-layout>
    <x-slot name="title">
        My BBS
    </x-slot>
    <h1 class="border-b border-black m-4 pb-2 flex items-center">
        <span class="text-lg font-bold">My BBS</span>
        <a href="{{ route('posts.create') }}" class="ml-auto">[Add]</a>
    </h1>
        <ul class="list-disc mx-10">
        @forelse ($posts as  $post)
            <li class="leading-4 mb-2">
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </li>
        @empty
            <li>No post yet</li>
        @endforelse
    </ul>
</x-layout>
