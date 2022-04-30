@extends("layouts.main")

@section('title')
    Bonus Categories
@endsection


@section('content')
    <div class="custom-container flex flex-col">
        <div class="flex items-center justify-between">

            <?//CREATE-CATEGORY-BUTTON?>
            @include('partials.create_cat_btn')

            <?//SUCCESS MESSAGE?>
            @if (session()->has('success'))
                <div class="success bg-emerald-200 rounded text-center success-not-full-width">
                    {{ session()->get('success') }}
                </div>
            @endif

        </div>
        @if (count($categories) > 0)
            <div class="relative overflow-table shadow-md sm:rounded-lg">

                <?//CATEGORIES TABLE?>
                @include('partials.categories_table')
            </div>
        @else
            <div class="text-center text-xl text-gray-100 my-6">No categories in the database</div>
        @endif

        <?//PAGINATION?>
        <div class="pagination mt-10 px-2">{!! $categories->withQueryString()->links() !!}</div>
    </div>
@endsection
