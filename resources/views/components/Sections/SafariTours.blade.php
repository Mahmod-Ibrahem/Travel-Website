<section id="RecommendedTours" class="bg-[#f9f9f9] py-6 select-none">
    <div class="parent_container gap-8">
        <div
            class="flex flex-col justify-center  md:items-start md:justify-start  px-3 md:max-w-6xl gap-4 mb-6">
            <h1 class="text-Primary font-semibold text-xl md:text-2xl text-center">Discover the Hidden Treasures of
                Egypt’s Majestic
                Deserts with an Unforgettable Safari Adventure
            </h1>
            <p class="font-medium text-Primary/75">
                Escape into the mesmerizing deserts of Egypt with Desert Storm Egypt
                Tours. Feel the rush of exploring golden dunes, marvel at breathtaking sunsets, and embrace the warm
                hospitality of Bedouin culture. Whether it’s thrilling adventures or peaceful nights beneath starry
                skies, your desert journey will be an unforgettable blend of excitement and serenity.
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
                <p class="px-3 py-2 shadow-md rounded-lg text-center w-full font-semibold md:text-xl">We Are Maintaining
                    This Section </p>
            @endforelse


        </div>
    </div>
</section>
