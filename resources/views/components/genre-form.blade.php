@props(['action', 'method', 'genre'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Input for Genre Name -->
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Genre</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $genre->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Input for Genre Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <input
            type="text"
            name="description"
            id="description"
            value="{{ old('description', $genre->description ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <div>
        <x-primary-button class="bg-green-700">
            {{ isset($genre) ? 'Update Genre' : 'Add Genre' }}
        </x-primary-button>
    </div>
</form>
