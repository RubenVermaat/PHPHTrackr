<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create package') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Creating package</h3>
                    <form method="POST" action="{{ route('packageStore') }}" > 
                        @csrf
                        <label>Firstname</label>
                        <input type="text" name="firstname"> 
                        <label>Surname</label>
                        <input type="text" name="surname"> 
                        <label>Email</label>
                        <input type="text" name="email"> 
                        <label>Webshop</label>
                        <input type="text" name="webshopName" value="Dierenwinkel" disabled>
                        <input type="submit" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
