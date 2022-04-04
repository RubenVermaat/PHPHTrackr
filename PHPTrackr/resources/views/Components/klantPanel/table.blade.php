<table class="border-collapse w-full mt-8 mb-8 h-8">
    <thead>
        <tr>
            <form method="GET" action="#">
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    <button type="submit" value="id" name="name">Naam</button>
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    <button type="submit" value="email" name="name">Email</button>
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    <button type="submit" value="shop" name="name">Winkel</button>
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    <button type="submit" value="status" name="name">Status</button>
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    <a>Actions</a>
                </th>
            </form>
        </tr>
    </thead>
    <tbody>
        @if ($data->count() == 0)
        <tr>
            <td colspan="5">No products to display.</td>
        </tr>
        @endif
        @foreach ($data as $label)
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                {{ $label->firstname}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                {{ $label->email}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                {{ $label->shop}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                {{ $label->status}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <a class="text-blue-400 hover:text-blue-600 underline">Review</a>
                <a class="text-blue-400 hover:text-blue-600 underline pl-6">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $data->links() }}

</tbody>
</table>