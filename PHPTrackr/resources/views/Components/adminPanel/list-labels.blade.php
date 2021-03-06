<table class="border-collapse w-full">
    <thead>
        @if ($sortable)
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">@sortablelink('id')</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">@sortablelink('packageId')</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">@sortablelink('status')</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
            </tr>
        @else
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">ID</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Package ID</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
            </tr>
        @endif
    </thead>
    <tbody>
        @foreach ($data as $label)
            <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
                    {{ $label->id }}
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                    {{ $label->packageId }}
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static" style="display: flex; justify-content: space-around; align-items: center;">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                    <span class="rounded @if($label->status == "Uitgeprint")bg-red-400 @elseif($label->status == "Afgeleverd")bg-green-400 @else bg-blue-400 @endif  py-1 px-3 text-xs font-bold">{{ $label->status }}</span>
                    <form id="statusForm" method="POST" action="/labels/update">
                        @csrf
                        <input name="id" value="{{ $label->id }}" type="hidden">
                        <select name="status"  class="border-gray-200 border h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                                @foreach($statuses as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                        </select>
                        <button class="bg-blue-600 text-white text-sm px-4 py-2 border rounded-full" type="submit" name="submit">Update</button>
                    </form>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                    <a href="/labels/pdf/{{ $label->id }}" class="bg-blue-600 text-white text-sm px-4 py-2 border rounded-full">PDF downloaden</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@if ($sortable)
    {{ $data->links() }}

    <p>
    Displaying {{$data->count()}} of {{ $data->total() }} label(s).
    </p>
@endif