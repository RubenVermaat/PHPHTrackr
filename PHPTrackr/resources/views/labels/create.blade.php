<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Label create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form> 
                        <h4>{{ $firstname }} {{ $surname }}</h4>
                        <input name="shopName" value="{{ $webshopName }} " disabled>
                        <input type="submit" value="Generate label">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
