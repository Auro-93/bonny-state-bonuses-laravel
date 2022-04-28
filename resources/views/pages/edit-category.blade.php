@extends("layouts.main")

@section('title')
    Edit Category
@endsection

@section('content')



    <div class="custom-container flex flex-items justify-center">
        <div class="w-full max-w-xl">
            <form method="POST" action="{{ url('categories/' . $category->id . '/update') }}"
                class="bg-white shadow-md rounded">
                @csrf
                @method('PUT')
                <h3 class="bg-red-500 text-white p-4 rounded-t text-center">EDIT CATEGORY</h3>
                <div class=" py-8 px-6">
                    @if (session()->has('success'))
                        <div class="success bg-emerald-200 rounded text-center">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="error bg-red-200 rounded">
                                {{ $error }}
                                <div class="close-icon"><i class="fa-solid fa-xmark"></i></div>
                            </div>
                        @endforeach
                    @endif
                    <div class="mb-6 mt-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Name:
                        </label>
                        <input id="name" name="name" type="text" value="{{ old('name', $category->name) }}"
                            placeholder="Category Name..."
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="saved_minutes">
                            Saved Minutes:
                        </label>
                        <input id="saved_minutes" name="saved_minutes" type="number" min=1
                            value="{{ old('saved_minutes', $category->saved_minutes) }}"
                            placeholder="Category Saved Minutes..."
                            class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>


                    <button
                        class=" w-full bg-emerald-500 hover:bg-emerald-700 text-white font-bold mt-6 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Edit
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
