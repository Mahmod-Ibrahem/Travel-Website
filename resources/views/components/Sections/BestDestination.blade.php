<section id="Best Destination"
class="">
    <div
        class="flex flex-col md:flex-row items-center md:justify-between md:max-w-7xl flex-nowrap mx-auto   mt-6 md:my-12">
        <div class="flex flex-col">
            <div class=" gap-2 hidden md:flex">
                <div id="prev" class="cursor-pointer">
                    <svg class="h-8 w-8 text-[#ff6700] hover:text-[#c1121f] shadow-2xl transition-all"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 8 8 12 12 16"/>
                        <line x1="16" y1="12" x2="8" y2="12"/>
                    </svg>
                </div>

                <div id="next" class="cursor-pointer md:mb-2">
                    <svg class="h-8 w-8 text-[#ff6700] hover:text-[#c1121f] transition-all" viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 16 16 12 12 8"/>
                        <line x1="8" y1="12" x2="16" y2="12"/>
                    </svg>
                </div>
            </div>

            <h2 class="text-2xl font-bold text-Primary leading-[3rem] mb-3 md:text-4xl ">Explore <span
                    class="text-[#ff6700]">Best Destination</span>
                In Egypt
            </h2>
            <p class="mx-auto text-Primary/75  max-w-[330px]  select-none
                md:max-w-[690px] md:mb-12
                 font-medium">
                Discover Egypt’s top destinations with Dr. Boogie Egypt Tours. From the pyramids to the Nile, we
                have the perfect package for you!</p>
        </div>
        <div id="TrendCard"
             class="flex    space-x-0 items-center  w-[18rem] gap-6 md:gap-0
                  md:flex-row md:items-start  md:space-x-7 md:space-y-0  md:w-full
                  mx-auto  overflow-x-auto  p-6 overflow-y-hidden  scroll-smooth hide-scrollbar">
            @component('components.PouplarDestinationCard')
                @slot('city')
                    Cairo
                @endslot
                @slot('url')
                    {{asset('Images/Best Destination/Cairo.jpg')}}"
                @endslot
            @endcomponent

            @component('components.PouplarDestinationCard')
                @slot('city')
                    Aswan
                @endslot
                @slot('url')
                    {{asset('Images/Best Destination/Aswan.jpg')}}"
                @endslot
            @endcomponent

            @component('components.PouplarDestinationCard')
                @slot('city')
                    Luxor
                @endslot
                @slot('url')
                    {{asset('Images/Best Destination/Luxor.jpg')}}"
                @endslot
            @endcomponent

            @component('components.PouplarDestinationCard')
                @slot('city')
                    Alexandria
                @endslot
                @slot('url')
                    {{asset('Images/Best Destination/Alexandria.jpg')}}"
                @endslot
            @endcomponent
        </div>
        <div class=" gap-2 flex md:hidden mt-5">
            <div id="sm_prev" class="cursor-pointer">
                <svg class="h-10 w-10 text-[#ff6700] hover:text-[#c1121f] shadow-2xl transition-all"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 8 8 12 12 16"/>
                    <line x1="16" y1="12" x2="8" y2="12"/>
                </svg>
            </div>

            <div id="sm_next" class="cursor-pointer md:mb-2">
                <svg class="h-10 w-10 text-[#ff6700] hover:text-[#c1121f] transition-all" viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 16 16 12 12 8"/>
                    <line x1="8" y1="12" x2="16" y2="12"/>
                </svg>
            </div>
        </div>

    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const TrendCard = document.getElementById("TrendCard");
        const Next = document.getElementById('next')
        const Prev = document.getElementById('prev')
        const sm_prev = document.getElementById('sm_prev')
        const sm_next = document.getElementById('sm_next')
        Next.addEventListener('click', () => ScrollHorizontal(1))
        Prev.addEventListener('click', () => ScrollHorizontal(-1))
        sm_prev.addEventListener('click', () => ScrollHorizontal(-1))
        sm_next.addEventListener('click', () => ScrollHorizontal(1))

        function ScrollHorizontal(sign) {
            if (window.innerWidth >= 768) {
                TrendCard.scrollLeft += 284 * sign;
            } else {
                TrendCard.scrollLeft += 298 * sign;
            }
        }

    });

</script>
