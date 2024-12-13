<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Genres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Genres</h3>
                        <!-- Displays all info about the show -->
                        <x-genre-details
                            :name="$genre->name"
                            :description="$genre->description"
                        />

                </div>
            </div>
        </div>
    </div>
    @if(auth()->user()->role === 'admin')
        <x-slot name="header">
            <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
                {{ __('Edit Genre') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">Edit Genre</h3>
                        <!-- Routes to genres.update -->
                        <x-genre-form
                            :action="route('genres.update', $genre)"
                            :method="'PUT'"
                            :genre="$genre"
                        />


                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
    