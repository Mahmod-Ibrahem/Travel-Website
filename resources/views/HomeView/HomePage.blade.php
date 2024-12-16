@extends('layouts')
@section('content')
    @component('components.navbar')
    @endcomponent
    <header class="h-screen absolute top-0 z-10 w-screen md:w-full bg-black/35">
        <div
            class="flex flex-col items-center justify-center md:items-start  md:ml-32 space-y-4 md:space-y-6 h-full md:h-full text-white box-border
                  ">
            <div class="p-6 rounded-lg gap-6 flex flex-col">
            <div class=" h-fit overflow-hidden  box-border ">
                <h1 id="home_title"
                    class="text-[26px] font-bold md:text-[30px] select-none max-w-[350px] md:max-w-[540px]  leading-tight">
                    Desert Storm Egypt Tours Since 2011
                </h1>
            </div>
            <p class="w-[350px]   md:w-[540px] font-medium select-none">Welcome to Desert Storm Egypt Tours, where every journey becomes a story. Explore Egypt’s ancient wonders,
                cruise the Nile, and dive into its vibrant culture with our carefully crafted tours. We design
                experiences tailored to your dreams,
                offering a perfect balance of adventure and relaxation. Let us create unforgettable memories
                that honor your time and individuality.
            </p>
            <a href="{{route('DayTours.index')}}" class="h-fit overflow-hidden">
                <button type="button" id="title_button"
                        class="inline-block font-medium text-white text-[16px] tracking-widest px-10 py-3 rounded-full transition-all duration-500 animate-Button_ToUp
                                 border-2 hover:bg-[#ff6700] hover:text-white hover:border-[#ff6700]]">
                    Check Our Offers !
                </button>
            </a>
            </div>
        </div>
    </header>

    <div class=" h-screen w-full overflow-hidden ">
        <div
            class="md:bg-fixed object-cover bg-center bg-cover  animate-imageScale h-full"
            style="background-image: url('{{ asset('Images/homee.jpeg') }}')">
        </div>
    </div>
    @component('components.Sections.BestDestination')@endcomponent
    @component('components.Sections.Services')@endcomponent
    @component('components.Sections.TailorMade')@endcomponent
    @component('CreateTourByLocation')@endcomponent

    @component('components.Sections.Testimonials')@endcomponent
    @if($recommendedTours ?? false)
    @component('components.Sections.RecommendedTours',['tours'=>$recommendedTours])@endcomponent
    @endif
    @if($hiddenGemsTours ?? false)
    @component('components.Sections.HiddenGemsTours',['tours'=>$hiddenGemsTours]) @endcomponent
    @endif
    @if($limitedOffersTorus ?? false)
    @component('components.Sections.LimitedOffers',['tours'=>$limitedOffersTorus])@endcomponent
    @endif
    <section id="YoutubeVideos" class="pt-6 select-none">
        <div class="parent_container">
            <h1 class=" text-Primary font-bold text-2xl md:text-4xl text-center">Experience Egypt Through Our Happy Customers'
                Eyes !</h1>
            <iframe  class="w-[370px] md:w-[450px] md:h-[315px]" src="https://www.youtube.com/embed/pz2e0zxt-OE?si=89UkT07rOd4-OZxT" title="YouTube video player"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </section>
@endsection





