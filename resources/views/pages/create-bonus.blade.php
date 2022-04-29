@extends("layouts.main")

@section('title')
    Create Bonus
@endsection

@section('content')



    <div class="custom-container flex flex-items justify-center">
        <div class="w-full max-w-xl">
            <form method="post" action="{{ route('bonuses.store') }}" class="bg-white shadow-md rounded">
                @csrf
                <h3 class="bg-red-500 text-white p-4 rounded-t text-center">CREATE BONUS</h3>
                <div class=" py-8 px-6">
                    @if (session()->has('success'))
                        <div class="success  bg-emerald-200 rounded text-center">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="error  bg-red-200 rounded">
                                {{ $error }}
                                <div class="close-icon"><i class="fa-solid fa-xmark"></i></div>
                            </div>
                        @endforeach
                    @endif
                    <div class="mb-6 mt-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Name:
                        </label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Bonus Name..."
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Category:
                        </label>
                        <select name="category_id"
                            class="shadow  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" selected disabled>Select bonus category...</option>
                            @foreach ($categories as $category)
                                <option value={{ $category->id }}>{{ ucfirst($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col  md:flex-row items-center">
                        <div class="mb-6 w-full">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity_sold">
                                Quantity Sold:
                            </label>
                            <input id="quantity_sold" name="quantity_sold" type="number"
                                value="{{ old('quantity_sold') }}" min=1 placeholder="Quantity Sold..."
                                class="shadow  border rounded w-full py-2 px-3 mr-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-6 w-full">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity_sold">
                                Sold At:
                            </label>
                            <input id="sold_at" name="sold_at" type="date" value="{{ old('sold_at') }}" min="2022-01-01"
                                max="2022-12-31"
                                class="shadow  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                    </div>

                    <button
                        class=" w-full bg-emerald-500 hover:bg-emerald-700 text-white font-bold mt-6 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
