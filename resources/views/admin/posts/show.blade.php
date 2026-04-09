<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $post->title }}</h3>

                <div class="space-y-2 mb-6 text-gray-700">
                    <p><span class="font-semibold">Category:</span> {{ optional($post->category)->name }}</p>
                    <p><span class="font-semibold">Author:</span> {{ $post->user->name }}</p>
                    <p><span class="font-semibold">Date:</span> {{ $post->created_at->format('d.m.Y') }}</p>
                </div>

                @if($post->image)
                    <div class="mb-6 showImage">
                        <img src="{{ asset('assets/images/' . $post->image) }}"
                             alt="{{ $post->title }}"
                             class="w-full max-w-md rounded-lg shadow">
                    </div>
                @endif

                <div class="text-gray-800 leading-7">
                    {{ $post->content }}
                </div>

                <div class="mt-6">
                    <a href="{{ route('admin.posts.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                        Back to Posts
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
