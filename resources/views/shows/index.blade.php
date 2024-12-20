<x-app-layout>
    <x-slot name="header">
        <!-- Displays "All Shows" under nav bar -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Shows') }}
        </h2>
        <!-- Displays a success alert if you successfully create/edit/delete a show -->
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid lg:grid-cols-2">
                        <h3 class="font-semibold text-lg mb-4 justify-start">List of Shows</h3>
                        <!-- Search Bar -->
                        <form method="GET" action="{{ route('shows.index') }}" class="inline-form">
                        <div class="search justify-end">
                            <input type="text" name="title" id="title" value="{{ request('title') }}" placeholder="Search shows..."  class="border rounded px-3 py-2 mx-5 text-black-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Creates a card for each show -->
                        @foreach($shows as $show)
                        <div>
                            <!-- Displays title and image -->
                            <a href="{{ route('shows.show', $show) }}">
                                <x-show-card
                                    :title="$show->title"
                                    :image="$show->image"
                                    
                                />
                            </a>
                            
                            <div class="mt-4 flex space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('shows.edit', $show) }}" class="text-black-600 bg-yellow-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                    Edit
                                </a>

                                <!-- Delete button -->
                                <form action="{{ route('shows.destroy', $show) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this show?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-black hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>