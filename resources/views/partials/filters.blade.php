<form method="GET" action="{{ route('bonuses.index') }}" class="search-form">
    @csrf
    <select name="category_id"
        class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <option value="" selected disabled>Select bonus category...</option>
        @foreach ($categories as $category)
            <option value={{ $category->id }}>{{ ucfirst($category->name) }}</option>
        @endforeach
    </select>

    <label class="block text-gray-100 text-sm font-bold" for="quantity_sold">
        From:
    </label>
    <input id="from_date" name="from_date" type="date" min="2022-01-01" max="2022-12-31"
        class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">


    <label class="block text-gray-100 text-sm font-bold" for="quantity_sold">
        To:
    </label>
    <input id="from_date" name="to_date" type="date" min="2022-01-01" max="2022-12-31"
        class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

    <div class="flex justify-between my-4">

        <button
            class="bg-emerald-500 hover:bg-emerald-700 text-white font-bold  py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2"
            type="submit">
            Filter
        </button>

        <a class=" bg-stone-500 hover:bg-stone-700 text-white font-bold  py-2 px-4 rounded focus:outline-none focus:shadow-outline flex justify-center items-center"
            href="{{ route('bonuses.index') }}">
            All
        </a>


    </div>

</form>
