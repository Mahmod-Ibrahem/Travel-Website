<section>
    <div class="parent_container relative">
        <header>
            <h1 class="parent_header ">
                Book Your Tour By Category !</h1>
        </header>

        <div class="w-fit mx-auto">
            <div class="flex flex-col space-y-6 md:flex-row justify-between  mb-5 md:space-x-10 md:space-y-0">
                @component('home::components.main-category', [
                    'Category' => 'Day Tours',
                    'image' => asset('Images/TourByCategory/DayToursHomeCard.jpg'),
                    'route' => 'day-tours.index',
                ])
                @endcomponent

                @component('home::components.main-category', [
                    'Category' => 'Tour Packages',
                    'image' => asset('Images/TourByCategory/TourPackagesHome.jpg'),
                    'route' => 'tour-packages.index',
                ])
                @endcomponent
            </div>
        </div>
</section>
