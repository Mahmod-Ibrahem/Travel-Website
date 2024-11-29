<section id="TailorMade" class="bg-[#f9f9f9] md:py-12">
    <div class="parent_container  space-y-8">
        <header>
            <h1
                id="tailorHeader"
                class="parent_header   opacity-0 border-orange-500/60 ">
                Tailor Made Your Egypt Trips
            </h1>
        </header>
        <div class="flex flex-col  items-center flex-nowrap mx-auto gap-8
             md:flex-row md:justify-between md:max-w-7xl  w-full  md:gap-0">

            <div id="left_container"
                 class="flex flex-col bg-[#f9f9f9] rounded-2xl shadow-md items-center p-8
                 md:max-w-[680px] md:p-20 md:opacity-0">
                <h3 class="font-bold text-base text-Primary/95 md:text-[1.1rem]">25% OFF SALE</h3>
                <h2 class="text-2xl font-bold text-[#ff6700] tracking-wide md:text-3xl ">TOUR OF YOUR DREAMS</h2>
            </div>

            <div id="right_container"
                 class="flex flex-col bg-[#f9f9f9]  gap-6 rounded-2xl shadow-md max-w-[350px] md:max-w-[680px] p-6 md:opacity-0">
                <h1 class="font-medium text-gray-600 select-none">At Dr Boogie Egypt Tours, we create exceptional
                    tours that showcase the best of
                    Egypt, blending history,
                    luxury, and adventure into every journey. From crafting tailored vacation packages and
                    organizing seamless flights, cruises, and car rentals to curating magical Easter tours and
                    romantic honeymoon getaways, we design experiences that leave lasting impressions. Explore Egypt
                    through our carefully planned day trips, including Cairo, Hurghada, and Sharm El Sheikh, or
                    embark on unforgettable journeys from Hurghada Resort to Abu Simbel.

                    We bring Egypt’s rich history to life, unveiling the secrets of the Pharaohs, King Tutankhamun’s
                    treasures, the iconic pyramids of Giza, and the coastal beauty of Alexandria. Every tour is a
                    testament to our dedication to creating extraordinary moments for you.</h1>
            </div>
        </div>
        <a href="{{route('TailorMade.index')}}" class="h-fit overflow-hidden">
            <button id="tailorButton"
                    type="button"
                    class="font-medium text-Primary text-[16px] tracking-widest px-10 py-3 rounded-full transition-all duration-500
                          bg-[#f9f9f9]  border-2 border-[#ff6700] shadow-md hover:bg-orange-600 hover:text-white opacity-0">
                Tailor Made Your Egypt Tour !
            </button>
        </a>

    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tailorHeader = document.getElementById("tailorHeader");
        const left_container = document.getElementById("left_container");
        const right_container = document.getElementById("right_container");
        const tailorButton = document.getElementById("tailorButton");

        function scrollfunction() {
            const scrollPosition = window.scrollY;
            if (window.innerWidth >= 768) {
                if (scrollPosition >= 1300) {
                    tailorHeader.classList.remove("opacity-0");
                    tailorHeader.classList.add('animate-Button_ToUp');
                }
                if (scrollPosition >= 1333) {
                    left_container.classList.remove("md:opacity-0");
                    left_container.classList.add('animate-ServicesToRight');
                    right_container.classList.remove("md:opacity-0");
                    right_container.classList.add('animate-ServicesToLeft');
                }
                if (scrollPosition >= 1500) {
                    tailorButton.classList.remove("opacity-0");
                    tailorButton.classList.add('animate-Button_ToUp');
                }
            } else {
                if (scrollPosition >= 2000) {
                    tailorHeader.classList.remove("opacity-0");
                    tailorHeader.classList.add('animate-Button_ToUp');
                }
                if (scrollPosition >= 2155) {
                    left_container.classList.remove("md:opacity-0");
                    left_container.classList.add('animate-ServicesToRight');
                }
                if (scrollPosition >= 2300) {
                    right_container.classList.remove("md:opacity-0");
                    right_container.classList.add('animate-ServicesToLeft');
                }
                if (scrollPosition >= 2840) {
                    tailorButton.classList.remove("opacity-0");
                    tailorButton.classList.add('animate-Button_ToUp');
                }
            }
        }

        //call scrollfunction when page is mounted
        scrollfunction();
        window.addEventListener("scroll", function () {
            scrollfunction()
        })
    });
</script>
