<section id="RecommendedTours" class="bg-[#f9f9f9] py-6 select-none">
    <div class="parent_container gap-8">
        <div
            class="flex flex-col items-center justify-center  md:items-start md:justify-start  px-3 md:max-w-[68rem] gap-4">
            <h1 class="text-Primary font-semibold text-xl md:text-2xl">
                {{ $tours[0]['category']['header'] }}
            </h1>
            <p class="font-medium text-Primary/75">
                {{ $tours[0]['category']['description'] }}
            </p>
        </div>


        <div class="child_container gap-4 mx-auto">
            @forelse($tours as $tour)
                @component('components.TourCard', ['tour' => $tour])
                    @slot('image')
                        {{ asset($tour['tour_cover']) }}
                    @endslot
                @endcomponent
            @empty
                <p class="px-3 py-2 shadow-md rounded-lg text-center w-full font-semibold md:text-xl">We Are Maintaining
                    This Section </p>
            @endforelse


        </div>
    </div>
</section>
