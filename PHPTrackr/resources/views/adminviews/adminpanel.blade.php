<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin panel') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-adminPanel.list-packages :data="$packages" :sortable=false>

                    </x-adminPanel.list-packages>
                    <a href="/packages/index">All packages </a> <a href="/packages/create">Create package </a>
                    <x-adminPanel.list-labels :data="$labels" :sortable=false>

                    </x-adminPanel.list-labels>
                    <a href="/labels/index">All labels </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
