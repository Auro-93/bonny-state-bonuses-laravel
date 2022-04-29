<div class="latest-records flex flex-col lg:flex-row justify-center">
    @if (count($latest_bonuses) > 0)
        <div class="latest-bonuses mt-12">
            <div class="stats-desc">LATEST BONUSES SOLD</div>
            <div class="flex flex-col items-center justify-center">
                <ul class="text-gray-400">
                    @foreach ($latest_bonuses as $bonus)
                        <li>{{ ucfirst($bonus->name) }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('bonuses.index') }}"
                    class="view-more-btn text-white flex items-center justify-center">
                    VIEW MORE
                </a>
            </div>
        </div>
    @endif
    @if (count($latest_cat) > 0)
        <div class="latest-cat mt-12">
            <div class="stats-desc">LATEST CATEGORIES ADDED</div>
            <div class="flex flex-col items-center justify-center">
                <ul class="text-gray-400">
                    @foreach ($latest_cat as $cat)
                        <li>{{ ucfirst($cat->name) }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('categories.index') }}"
                    class="view-more-btn text-white flex items-center justify-center">
                    VIEW MORE
                </a>
            </div>
        </div>
    @endif
