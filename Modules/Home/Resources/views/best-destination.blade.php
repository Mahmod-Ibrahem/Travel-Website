<section id="Trend Destination">
    <div class="parent_container relative ">
        <h2 class="parent_header" id="Trend_header">Top Destinations</h2>
        <div id="TrendCard" class="child_container gap-6 mx-auto">
            @forelse ($locations as $location)
                @include('location::components.destination-card', ['location' => $location])
            @empty
                <p>No locations found</p>
            @endforelse
        </div>
    </div>
</section>
