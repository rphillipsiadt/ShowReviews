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
                                    <p class="font-semibold">{{ $character->user->name }} ({{ $character->created_at->format('M d, Y') }})</p>
                                    <p>Name: {{ $character->name }}</p>
                                    <p>{{ $character->about}}</p>
                                    <p>{{ asset('images/characters/' . $character->image) }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Add a new character -->
                     <h4 class="font-semibold text-md mt-8">Add a Character</h4>
                     <form action="{{ route('characters.store', $show) }}" method="POST" class="mt-4">
                        @csrf
                        
                     </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>