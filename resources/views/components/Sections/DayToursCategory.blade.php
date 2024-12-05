<section id="DayToursCategory" class="bg-[#f9f9f9] py-6 select-none">
    <div class="parent_container gap-8">
        <div class="flex flex-col items-center justify-center  md:items-start md:justify-start  px-3 md:max-w-[68rem] gap-4">
            <h1 class="text-Primary font-semibold text-xl md:text-3xl text-center">Check Your Egypt Day Tours & Excursions By Your
                Destination</h1>

        </div>
        <div class="child_container gap-4 mx-auto">
        @forelse ($categories as $Category)
                @component('components.CategoryCard' , ['Category'=>$Category])
                    @slot('url')
                        {{$Category['image']}}
                    @endslot
                @endcomponent
            @empty
        not found
        @endforelse
        </div>
    </div>
</section>
