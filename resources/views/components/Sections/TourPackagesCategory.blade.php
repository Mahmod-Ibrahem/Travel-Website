<section id="RecommendedTours" class="bg-[#f9f9f9] py-6 select-none">
    <div class="parent_container gap-8">
        <div class="flex items-center justify-center gap-3  mx-auto">
            <svg width="56" height="56" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"
                        stroke="#ff6700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                        stroke="#ff6700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
            <h1 class=" text-Primary font-semibold text-2xl md:text-4xl">Exclusive Egypt Travel Packages for Unforgettable Adventures

            </h1>

        </div>
        <div class="child_container gap-4 mx-auto">
            @component('components.CategoryCard' , ['city'=>'Egypt Classic Tours',])
                @slot('url')
                    {{asset('Images/TourPackageCategory/EgyptClassicTours.jpg')}}
                @endslot
            @endcomponent
                @component('components.CategoryCard' , ['city'=>'Egypt Nile Cruise',])
                    @slot('url')
                        {{asset('Images/TourPackageCategory/EgyptNileCruise.jpg')}}
                    @endslot
                @endcomponent
            @component('components.CategoryCard' , ['city'=>'Egypt Luxury Tours',])
                @slot('url')
                    {{asset('Images/TourPackageCategory/EgyptLuxuryTours.jpg')}}
                @endslot
            @endcomponent
            @component('components.CategoryCard' , ['city'=>'Egypt Family Tours'])
                @slot('url')
                    {{asset('Images/TourPackageCategory/EgyptFamilyTours.jpg')}}
                @endslot
            @endcomponent
            @component('components.CategoryCard' , ['city'=>'Egypt Christmas Tours',])
                @slot('url')
                    {{asset('Images/TourPackageCategory/ChristmasEgyptTours.jpg')}}
                @endslot
            @endcomponent
            @component('components.CategoryCard' , ['city'=>'Egypt Honeymoon Holiday',])
                @slot('url')
                    {{asset('Images/TourPackageCategory/EgyptHoneyMoon.jpg')}}
                @endslot
            @endcomponent

        </div>
    </div>
</section>
