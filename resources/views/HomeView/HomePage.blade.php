@extends('layouts')
@section('content')
    <div class=" h-screen w-full ">
        <div
            class="md:bg-fixed object-cover bg-center bg-cover"
            style="background-image: url('{{ asset('Images/homee.jpeg') }}')">
            @component('components.navbar')
            @endcomponent

            <header class="h-screen ">
                <div
                    class="flex flex-col items-center justify-center md:items-start  md:ml-32 space-y-4 md:space-y-6 h-full md:h-full text-[#fefae0]  box-border
                  ">

                    <div class=" h-fit overflow-hidden  box-border ">
                        <h1 id="home_title"
                            class="text-[26px] font-bold md:text-[30px] select-none animate-ToDown max-w-[350px] md:max-w-[540px] text-white leading-tight">
                            Experience The Magic of Egypt With Dr Boogie Egypt Tours – Tailored Journeys Just For You.
                        </h1>
                    </div>
                    <p class="max-w-[350px]   md:max-w-[540px] font-semibold select-none animate-ToDown">Welcome to Dr
                        Boogie Egypt Tours, where every journey becomes a story. Explore Egypt’s ancient wonders,
                        cruise the Nile, and dive into its vibrant culture with our carefully crafted tours. We design
                        experiences tailored to your dreams,
                        offering a perfect balance of adventure and relaxation. Let us create unforgettable memories
                        that honor your time and individuality.
                    </p>
                    <a href="{{route('Daytours.index')}}" class="h-fit overflow-hidden">
                        <button type="button" id="title_button"
                                class="inline-block font-medium text-white text-[16px] tracking-widest px-10 py-3 rounded-full transition-all duration-500 animate-Button_ToUp
                                 border-2 hover:bg-[#c1121f] hover:text-white hover:border-[#c1121f] border-[#ffffff]">
                            Check Our Offers !
                        </button>
                    </a>
                </div>
            </header>
        </div>
    </div>
    @component('components.Sections.BestDestination')@endcomponent
    @component('components.Sections.Services')@endcomponent
    @component('components.Sections.TailorMade')@endcomponent
    @component('components.Sections.Testimonials')@endcomponent
    @component('components.Sections.RecommendedTours')@endcomponent
    @component('components.Sections.HiddenGemsTours') @endcomponent
    @component('components.Sections.LimitedOffers')@endcomponent
    <section id="YoutubeVideos" class="pt-6 select-none">
        <div class="parent_container">
            <h1 class=" text-Primary font-bold text-2xl md:text-4xl text-center">Experience Egypt Through Our Happy Customers'
                Eyes !</h1>
            <div class="child_container gap-5 md:my-12">
                <iframe class="w-[370px] md:w-[450px] md:h-[315px]" width="450" height="315" src="https://www.youtube.com/embed/mfxQy5A_tHs?si=9nJoP5Sff0HYwGzu"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe class="w-[370px] h-[315px] md:w-[450px] md:h-[315px]" width="450" height="315" src="https://www.youtube.com/embed/mfxQy5A_tHs?si=9nJoP5Sff0HYwGzu"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe class="w-[370px] md:w-[450px] md:h-[315px]" width="450" height="315" src="https://www.youtube.com/embed/mfxQy5A_tHs?si=9nJoP5Sff0HYwGzu"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe class="w-[370px] md:w-[450px] md:h-[315px]" width="450" height="315" src="https://www.youtube.com/embed/mfxQy5A_tHs?si=9nJoP5Sff0HYwGzu"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe class="w-[370px] md:w-[450px] md:h-[315px]" width="450" height="315" src="https://www.youtube.com/embed/mfxQy5A_tHs?si=9nJoP5Sff0HYwGzu"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe class="w-[370px] md:w-[450px] md:h-[315px]" width="450" height="315" src="https://www.youtube.com/embed/mfxQy5A_tHs?si=9nJoP5Sff0HYwGzu"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </section>
i@endsection





