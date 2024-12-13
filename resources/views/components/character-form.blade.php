@props(['action', 'method', 'show', 'character'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'Patch')
        @method($method)
    @endif
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
    <x-primary-button>
        {{ isset($character) ? 'Update Character' : 'Save Character'}}
    </x-primary-button>
</form>