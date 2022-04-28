@extends("layouts.main")

@section('title')
    Bonny - Italian State Bonuses 2022
@endsection

@section('content')
    <main class="custom-container">
        @if ($total > 0)
            @include('partials.stats_cards')
            @include('partials.latest_records')
        @else
            <div class="text-center text-white flex justify-between items-center text-xl py-4">
                @include('partials.create_cat_btn')
                <h2>No records in the database</h2>
                @include('partials.create_bonus_btn')
            </div>
        @endif
    </main>
@endsection
