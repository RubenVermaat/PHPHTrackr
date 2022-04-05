<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Packages panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-8 mb-8 h-8">
                        <form method="POST" action="{{ route('packageSearch') }}" > 
                            @csrf
                            <x-input name="search" placeholder="Search" class="border-gray-200 border h-10 px-5 pr-10 rounded-full text-sm focus:outline-none"></x-input>
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    <a href="/packages/create">Create package </a>
                    <x-adminPanel.list-packages :data="$packages" :sortable="true">

                    </x-adminPanel.list-packages>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
