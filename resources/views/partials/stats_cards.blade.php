<div class="stats-desc mb-12"> MIN/MAX (PER CATEGORY) AND TOTAL SAVED MINUTES</div>

<div class="stats-cards ">

    <div class="stats-card max-stats-card w-full flex flex-col items-center justify-center">
        <h6 class="text-gray-400 stats-card-label">
            MAX SAVED MINUTES
        </h6>
        <p class="text-white stats-card-num flex items-center justify-center">
            {{ $max->saved_minutes }}
        </p>
        <p class="text-white stats-card-cat flex items-center justify-center">
            {{ ucfirst($max->name) }}
        </p>
    </div>
    <div class="stats-card min-stats-card w-full flex flex-col items-center justify-center">
        <h6 class="text-gray-400 stats-card-label">
            MIN SAVED MINUTES
        </h6>
        <p class="text-white stats-card-num flex items-center justify-center">
            {{ $min->saved_minutes }}
        </p>
        <p class="text-white stats-card-cat flex items-center justify-center">
            {{ ucfirst($min->name) }}
        </p>
    </div>
    <div class="stats-card total-stats-card w-full flex flex-col items-center justify-center">
        <h6 class="text-gray-400 stats-card-label">
            TOTAL SAVED MINUTES
        </h6>
        <p class="text-white stats-card-num flex items-center justify-center">
            {{ $total }}
        </p>
        <p class="text-gray-700 stats-card-cat flex items-center justify-center">
            All
        </p>
    </div>
</div>
