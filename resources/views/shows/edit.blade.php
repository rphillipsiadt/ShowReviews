<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Create New Show') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-grat-900">
                    <h3 class="font-semibold text-lg mb-4">Edit New Show</h3>
                    <!-- Routes to shows.update -->
                    <x-show-form
                        :action="route('shows.update', $show)"
                        :method="'PUT'"
                        :show="$show"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>