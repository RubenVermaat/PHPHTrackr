<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ __('Review') }}
        </h2>
    </x-slot>

  

    <div class="py-12">
        <div class="h-full mx-auto sm:px-6 lg:px-8 max-w-7xl" style="width: 2/3; ">
            <div class="flex items-center justify-center flex-col h-full bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="h-full bg-white mr-4 ml-4 mt-4 mb-4 h-full max-w-xl border-gray-200 border p-6 sm:rounded-lg">
                    <form method="POST" action="{{ route('customerreview-post') }}">
                        @csrf
                        <header class="flex items-center">
                            <h2>write a new comment</h2>
                        </header>

                        <div class="mt-4">
                            <input name="name" placeholder="Naam" type="text" class="border-gray-200 border h-10 px-5 pr-10 rounded-full text-sm focus:outline-none" required>
                        </div>

                        <div class="mt-4">
                            <input name="stars" placeholder="Stars 1-5" type="number" class="border-gray-200 border h-10 px-5 pr-10 rounded-full text-sm focus:outline-none" required>
                        </div>

                        <div class="mt-4">
                            <textarea style="resize:none" name="body" class="w-full sm:rounded-lg border-gray-200" cols="30" rows="10" placeholder="Write a comment" required></textarea>
                        </div>

                        <div class="mt-4 flex justify-end">
                            <button class="bg-blue-600 text-white text-sm px-4 py-2 border rounded-full">
                                Post
                            </button>
                        </div>

                    </form>
                </div>
                @if($data != null)
                @foreach($data as $reviews)

                <div style="width: 40%;" class="h-full bg-white mr-4 ml-4 mt-4 mb-4 border-gray-200 border p-6 sm:rounded-lg">
                    <header>
                        <h3>{{ $reviews->name }} - {{ $reviews->rating }} stars</h3>
                    </header>
                    <p>{{ $reviews->comment }}</p>
                </div>

                @endforeach
                @endif
            </div>


        </div>
    </div>
</x-app-layout>