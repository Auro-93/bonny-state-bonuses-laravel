<table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-400 dark:text-gray-800">
        <tr>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                Category
            </th>
            <th scope="col" class="px-6 py-3">
                Quantity Sold
            </th>
            <th scope="col" class="px-6 py-3">
                Sold At
            </th>
            <th scope="col" class="px-6 py-3">
                Edit
            </th>
            <th scope="col" class="px-6 py-3">
                Delete
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($bonuses as $bonus)
            <tr class=" border-b dark:border-gray-700 even:dark:bg-gray-800 odd:dark:bg-gray-900">
                <th scope="row" class="px-6 py-4 font-medium text-gray-400 dark:text-white whitespace-nowrap">
                    {{ ucfirst($bonus->name) }}
                </th>
                <td class="px-6 py-4">
                    @foreach ($categories as $category)
                        {{ $bonus->category_id === $category->id ? ucfirst($category->name) : null }}
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    {{ ucfirst($bonus->quantity_sold) }}
                </td>
                <td class="px-6 py-4">
                    {{ date('d-m-Y', strtotime($bonus->sold_at)) }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('bonuses.edit', ['id' => $bonus->id]) }}"
                        class="table-btn px-4 py-2 bg-green-500 text-white rounded"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                </td>
                <td class="px-6 py-4">
                    <form action="{{ url('bonuses/' . $bonus->id . '/delete') }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="table-btn px-4 py-2 bg-red-500 text-white rounded"><i
                                class="fa-solid fa-trash"></i></a>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
