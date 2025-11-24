<section id="RecommendedTours" class="bg-[#F5F5F5] py-6 select-none">
    <div class="parent_container gap-8">
        <div class="flex items-center gap-3">
            <h1 class="parent_header">Recommended Tour Packages</h1>

        </div>
        <div class="child_container gap-9">
            @forelse($tours as $tour)
                @include('tour::components.tour-card', ['tour' => $tour , 'image'=>asset($tour['tour_cover'])])
            @empty
            @endforelse


        </div>
    </div>
</section>
