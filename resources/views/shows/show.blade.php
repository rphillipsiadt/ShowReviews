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
                        <x-show-details
                            :title="$show->title"
                            :image="$show->image"
                            :episode_count="$show->episode_count"
                            :year="$show->year"
                            :description="$show->description"
                        />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>