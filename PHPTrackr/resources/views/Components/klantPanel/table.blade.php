<table dusk="table" class="border-collapse w-full mt-8 mb-8 h-8">
    <thead>
        <tr>
            <form method="GET" action="#">
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    <button dusk="name" type="submit" value="firstname" name="button">Naam</button>
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    <button dusk="email" type="submit" value="email" name="button">Email</button>
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    <button dusk="shop" type="submit" value="shop" name="button">Winkel</button>
                </th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    <button dusk="status" type="submit" value="status" name="button">Status</button>
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
            <td name="noproducts" dusk="noproducts" colspan="5">No products to display.</td>
        </tr>
        @endif
        @foreach ($data as $label)
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td name="firstname" class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
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
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $data->links() }}

</tbody>
</table>