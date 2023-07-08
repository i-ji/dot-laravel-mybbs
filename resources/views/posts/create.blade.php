<x-layout>
    <x-slot name="title">
        Add New Post - My BBS
    </x-slot>
    <div class="mt-4">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <h1 class="border-b border-black m-4 pb-2 text-lg font-bold">Add New Post</h1>
    <form method="post" action="{{ route('posts.store') }}">
        @csrf

        <div class="mb-4">
            <label>
                Title
                <input type="text" name="title" class="border border-black rounded-sm p-1 w-full box-border" value="{{ old('title') }}">
            </label>
            @error('title')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label>
                Body
                <textarea name="body" class="border border-black rounded-sm p-1 w-full box-border h-40">
                    {{ old('body') }}
                </textarea>
            </label>
            @error('body')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-right">
            <button>[Add]</button>
        </div>
    </form>
</x-layout>
