<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Packages panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="width: 2/3;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-8 mb-8 h-8">
                        <form method="POST" action="{{ route('packageSearch') }}" > 
                            @csrf
                            <x-input name="search" placeholder="Search" class="border-gray-200 border h-10 px-5 pr-10 rounded-full text-sm focus:outline-none"></x-input>
                            <button class="bg-blue-600 text-white text-sm px-4 py-2 border rounded-full" type="submit" value="Search">Search</button>
                        </form>
                    </div>
                    <form class="mb-3" action="{{ route('packagesImport') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control"><button  class="bg-blue-600 text-white text-sm px-4 py-2 border rounded-full">Import Packages Data</button>
                        <a class="bg-blue-600 text-white text-sm px-4 py-2 border rounded-full" href="/packages/create">Create package </a>
                    </form>
                    
                    <form action="{{ route('labelsBulkStore')}}" method="POST"> 
                        @csrf
                        <x-adminPanel.list-packages :data="$packages" :sortable="true">

                        </x-adminPanel.list-packages> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
