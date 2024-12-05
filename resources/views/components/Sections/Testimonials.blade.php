<section id="Testimonials"
         class="py-2">
    <div
        class="flex flex-col md:flex-row items-center md:justify-between md:max-w-7xl flex-nowrap mx-auto md:my-12">
        <div class="flex flex-col">
            <div class=" gap-2 hidden md:flex">
                <div id="prevTestimonials" class="cursor-pointer">
                    <svg class="h-8 w-8 text-[#ff6700] hover:text-[#c1121f] shadow-2xl transition-all"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 8 8 12 12 16"/>
                        <line x1="16" y1="12" x2="8" y2="12"/>
                    </svg>
                </div>

                <div id="nextTestimonials" class="cursor-pointer md:mb-2">
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
            <h2 class="text-2xl font-bold text-Primary leading-[3rem] md:mb-3 md:text-4xl ">Reflective <span
                    class=" text-[#ff6700]">&</span> Honest Reviews
            </h2>
            <p class="mx-auto text-Primary/75  max-w-[330px]  select-none
                md:max-w-[690px] md:mb-12
                 font-medium">
                Discover what our customers have to say about their experiences with us—genuine, heartfelt reviews that
                reflect the unforgettable journeys we've created together</p>
        </div>
        <div id="Testimonials_Cards"
             class="flex items-center  w-[22rem] gap-6 md:gap-0
                  md:flex-row md:items-start  md:space-x-7  md:w-full
                    overflow-x-auto overflow-y-hidden  scroll-smooth hide-scrollbar mt-5 md:mt-0">
           @component('components.Tripadvisor',['review_name' =>'John Doe','review_description'=>'
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate officia natus
                blanditiis rerum incidunt ex autem repudiandae doloribus eveniet quia? Culpa commodi
                quae atque perspiciatis? Provident, magni beatae saepe porro aspernatur facere neque
                sunt possimus assumenda perspiciatis aperiam quisquam animi
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate officia natus
                blanditiis rerum incidunt ex autem repudiandae doloribus eveniet quia? Culpa commodi
                quae atque perspiciatis? Provident, magni beatae saepe porro aspernatur facere neque
                sunt possimus assumenda perspiciatis aperiam quisquam animi
'])@endcomponent
               @component('components.Tripadvisor',['review_name' =>'Michele Doe','review_description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate officia natus
                blanditiis rerum incidunt ex autem repudiandae doloribus eveniet quia? Culpa commodi
                quae atque perspiciatis? Provident, magni beatae saepe porro aspernatur facere neque
                sunt possimus assumenda perspiciatis aperiam quisquam animi libero voluptatem fuga.
                Repudiandae, facere? Nemo reprehenderit quas ratione quis.'])@endcomponent           @component('components.Tripadvisor',['review_name' =>'John DOE','review_description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate officia natus
                blanditiis rerum incidunt ex autem repudiandae doloribus eveniet quia? Culpa commodi
                quae atque perspiciatis? Provident, magni beatae saepe porro aspernatur facere neque
                sunt possimus assumenda perspiciatis aperiam quisquam animi libero voluptatem fuga.
                Repudiandae, facere? Nemo reprehenderit quas ratione quis.'])@endcomponent           @component('components.Tripadvisor',['review_name' =>'Paul Doe','review_description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate officia natus
                blanditiis rerum incidunt ex autem repudiandae doloribus eveniet quia? Culpa commodi
                quae atque perspiciatis? Provident, magni beatae saepe porro aspernatur facere neque
                sunt possimus assumenda perspiciatis aperiam quisquam animi libero voluptatem fuga.
                Repudiandae, facere? Nemo reprehenderit quas ratione quis.'])@endcomponent           @component('components.Tripadvisor',['review_name' =>'Michele Doe','review_description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate officia natus
                blanditiis rerum incidunt ex autem repudiandae doloribus eveniet quia? Culpa commodi
                quae atque perspiciatis? Provident, magni beatae saepe porro aspernatur facere neque
                sunt possimus assumenda perspiciatis aperiam quisquam animi libero voluptatem fuga.
                Repudiandae, facere? Nemo reprehenderit quas ratione quis.'])@endcomponent
        </div>
        <div class="gap-2 flex md:hidden mt-5">
            <div id="sm_prev_testimonials" class="cursor-pointer">
                <svg class="h-10 w-10 text-[#ff6700] hover:text-[#c1121f] shadow-2xl transition-all"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 8 8 12 12 16"/>
                    <line x1="16" y1="12" x2="8" y2="12"/>
                </svg>
            </div>

            <div id="sm_next_testimonials" class="cursor-pointer md:mb-2">
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
        const Testimonials_Cards = document.getElementById("Testimonials_Cards");
        const Next = document.getElementById('nextTestimonials')
        const Prev = document.getElementById('prevTestimonials')
        const sm_prev = document.getElementById('sm_prev_testimonials')
        const sm_next = document.getElementById('sm_next_testimonials')
        Next.addEventListener('click', () => ScrollHorizontal(1))
        Prev.addEventListener('click', () => ScrollHorizontal(-1))
        sm_prev.addEventListener('click', () => ScrollHorizontal(-1))
        sm_next.addEventListener('click', () => ScrollHorizontal(1))

        function ScrollHorizontal(sign) {
            if (window.innerWidth >= 768) {
                Testimonials_Cards.scrollLeft += 380 * sign;
            } else {
                Testimonials_Cards.scrollLeft += 376 * sign;
            }
        }

        /*Toggle Line Clamp in Review Card*/

            let reviewDescriptions = [...document.getElementsByClassName('review_description')];

            reviewDescriptions.forEach((description) => {
            description.addEventListener('click', () => {
                description.classList.toggle('line-clamp-[15]');
            })
        })

    });

</script>
