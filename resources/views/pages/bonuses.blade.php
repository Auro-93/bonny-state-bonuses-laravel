@extends("layouts.main")

@section('title')
    Bonuses
@endsection

@section('content')
    <div class="custom-container flex flex-col">
        @if (session()->has('success'))
            <div class="success bg-emerald-200 rounded text-center success-not-full-width">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="flex items-center justify-between">
                @include('partials.filters')
                <a class=" bg-stone-500 hover:bg-stone-700 text-white font-bold  py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    href="{{ route('bonuses.index') }}">
                    All
                </a>
            @include('partials.create_bonus_btn')
        </div>


        @if (count($bonuses) > 0)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                @include('partials/bonuses_table')
            </div>
        @else
            <div class="text-center text-xl text-gray-100 my-6">No bonuses in the database</div>
        @endif
        <div class="pagination mt-10 px-2">{!! $bonuses->withQueryString()->links() !!}</div>
    </div>
@endsection
