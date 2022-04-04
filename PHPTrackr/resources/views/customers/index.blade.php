<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="width: 2/3;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white mr-4 ml-4 mt-4 mb-4" style="width: 1/3;">
                    <div class="mt-8 mb-8 h-8">
                        <form method="GET" action="#">
                            <x-input name="search" placeholder="Search" class="border-gray-200 border h-10 px-5 pr-10 rounded-full text-sm focus:outline-none"></x-input>
                        </form>
                    </div>

                    <x-klantPanel.table :data="$data">

                    </x-klantPanel.table>


                </div>


            </div>
        </div>
    </div>
</x-app-layout>