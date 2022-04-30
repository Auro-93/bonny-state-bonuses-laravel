@extends("layouts.main")

@section('title')
    Bonuses
@endsection

@section('content')
    <div class="custom-container flex flex-col">

        <div class="flex items-center justify-center">

            <?//SEARCH MULTI-FILTERS?>
            @include('partials.filters')

        </div>

        <div class="flex items-center justify-between">
            @include('partials.create_bonus_btn')

            <?//SUCCESS MESSAGE?>
            @if (session()->has('success'))
                <div class="success bg-emerald-200 rounded text-center success-not-full-width">
                    {{ session()->get('success') }}
                </div>
            @endif

        </div>


        @if (count($bonuses) > 0)
            <div class="relative overflow-table shadow-md sm:rounded-lg">

                <?//BONUSES TABLE?>
                @include('partials/bonuses_table')
            </div>
        @else
            <div class="text-center text-xl text-gray-100 my-6">No bonuses in the database</div>
        @endif

        <?//PAGINATION?>
        <div class="pagination mt-10 px-2">{!! $bonuses->withQueryString()->links() !!}</div>
    </div>
@endsection
