<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Shows') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Shows</h3>
                        <!-- Displays all info about the show -->
                        <x-show-details
                            :title="$show->title"
                            :image="$show->image"
                            :episode_count="$show->episode_count"
                            :year="$show->year"
                            :description="$show->description"
                        />

                    <h4 class="font-semibold text-md mt-8">characters</h4>
                    
                    @if($show->characters->isEmpty())
                        <p class="text-gray-600">No characters yet</p>
                    @else
                        <ul class="mt-4 space-y-4">
                            @foreach($show->characters as $character)
                                <li class="bg-gray-100 p-4 rounded-lg">
                                    <p>Name: {{ $character->name }}</p>
                                    <p>{{ $character->about}}</p>
                                    <img src="{{ asset('images/characters/' . $character->image) }}" alt="Character image">
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Add a new character -->
                     <h4 class="font-semibold text-md mt-8">Add a Character</h4>
                     <form action="{{ route('characters.store', $show) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm text-gray-700">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $character->name ??'') }}"
                                required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="about" class="block text-sm text-gray-700">About</label>
                            <input
                                type="text"
                                name="about"
                                id="about"
                                value="{{ old('about', $character->about ??'') }}"
                                required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error('about')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Show Character Image</label>
                            <input
                                type="file"
                                name="image"
                                id="image"
                                value="{{ old('image', $character->image ??'') }}"
                                {{ isset($character) ? '' : 'required' }}
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                />
                            @error('image')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Shows the image under the box to input an image -->
                        @isset($character->image)
                            <div class="mb-4">
                                <img src="{{ asset('images/characters/' . $character->image) }}" alt="Character poster" class="w-24 h-32 object-cover">
                            </div>
                        @endisset
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Submit Character
                        </button>

                        
                     </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>