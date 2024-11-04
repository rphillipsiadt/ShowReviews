@props(['action','method', 'show'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="title" class="block text-sm text-gray-700">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $show->title ??'') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <input
            type="text"
            name="description"
            id="description"
            value="{{ old('description', $show->description ??'') }}"
            required
            class="mt-1 block w-full h-24 border-gray-300 rounded-md shadow-sm" />
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="year" class="block text-sm text-gray-700">Year</label>
        <input
            type="range"
            name="year"
            id="year"
            min="1900" 
            max="2024"
            value="{{ old('year', $show->year ??'1900') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            onInput="document.getElementById('year-value').innerText = this.value" />
        <span id="year-value">{{ old('year', $show->year ?? '1900' )}}</span>
        @error('year')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="episode_count" class="block text-sm text-gray-700">Episode Count</label>
        <input
            type="number"
            name="episode_count"
            id="episode_count"
            value="{{ old('episode_count', $show->episode_count ??'') }}"
            required
            class="mt-1 block w-24 border-gray-300 rounded-md shadow-sm" />
        @error('episode_count')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <lavel for="image" class="block text-sm font-medium text-gray-700">Show Poster Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($show) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div
    
    @isset($show->image)
        <div class="mb-4">
            <img src="{{ asset($show->image) }}" alt="Show poster" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($show) ? 'Update Show': 'Add Show'}}
        </x-primary-button>
    </div>
</form>