<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Welcome, {{ auth()->user()->name }}</h3>
                <p class="text-gray-600">This is your admin panel.</p>

                <div class="mt-6">
                    <a href="{{ route('admin.posts.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                        Manage Posts
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
