<section id="RecommendedTours" class="bg-[#f9f9f9] py-6 select-none">
    <div class="parent_container gap-8">
        <div
            class="flex flex-col justify-center  md:items-start md:justify-start  px-3 md:max-w-6xl gap-4 mb-6">
            <h1 class="text-Primary font-semibold text-xl md:text-2xl text-center">Make the Most of Your Layover:
                Discover Egypt in a Day
            </h1>
            <p class="font-medium text-Primary/75">
                Maximize your layover in Egypt with a whirlwind journey to its most iconic landmarks. Marvel at the
                Great Pyramids of Giza, savor authentic Egyptian cuisine, and soak in the rich history of ancient
                civilizations—all in a single unforgettable day. Your brief stop will leave you with lifelong memories.
            </p>
        </div>


        <div class="child_container gap-4 mx-auto">

            @forelse($tours as $tour)
                @component('components.SafariSeaTourCard', ['tour' => $tour])
                    @slot('image')
                        {{ asset($tour['tour_cover']) }}
                    @endslot
                @endcomponent
            @empty
                <p class="px-3 py-2 shadow-md rounded-lg text-center w-64 font-semibold md:text-xl">Soon</p>
            @endforelse
        </div>
    </div>
</section>
