@extends('layout.layouts')
@section('title')
    Mr Egypt Tours | Discover Authentic Egypt with Unforgettable Tours
@endsection
@section('description')
    Explore the wonders of Egypt with Mr Egypt Tours. Offering personalized and unforgettable travel experiences across
    iconic destinations like Cairo, Luxor, and the pyramids. Your adventure awaits!
@endsection
@section('title')
    MrEgyptTorus
@endsection
@section('content')
    <div class="h-[25rem] md:h-screen w-full ">
        <div class="md:bg-fixed h-full w-full "
            style="background-image: url('{{ asset('Images/Home.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class="flex flex-col items-center justify-center  w-full h-full bg-black/10 pt-10">
                <h1
                    class="
                 text-[20px] font-extrabold tracking-wider  md:text-[50px] select-none text-center leading-[3rem] md:leading-[5rem] text-white">
                    DISCOVER THE
                    AUTHENTIC EGYPT
                </h1>
                <p class="text-[20px] font-medium md:text-[40px] select-none text-center   text-white">With Endless
                    Possibility</p>
            </div>
        </div>
    </div>
    {{-- @include('home::best-destination', ['locations' => $locations]) --}}
    @include('home::TourByCategory')
    @include('home::Services')
    @if (!$reviews->isEmpty())
        @include('home::Testimonials', ['reviews' => $reviews])
    @endif
    @if ($recommendedDayTours ?? false)
        @include('home::RecommendedDayTours', ['tours' => $recommendedDayTours])
    @endif
    @if ($recommendedTourPackages ?? false)
        @include('home::RecommendedTourPackages', ['tours' => $recommendedTourPackages])
    @endif
    {{--    <section id="YoutubeVideos" class="pt-6 select-none"> --}}
    {{--        <div class="parent_container"> --}}
    {{--            <h1 class="parent_header">See Egypt Through the Eyes of Our Satisfied Customers!</h1> --}}

    {{--                <div class="child_container"> --}}
    {{--                <iframe class="w-[370px] md:w-[450px] md:h-[315px]" --}}
    {{--                        src="https://www.youtube.com/embed/pz2e0zxt-OE?si=89UkT07rOd4-OZxT" title="YouTube video player" --}}
    {{--                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; Web-share" --}}
    {{--                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}

    {{--                    <iframe class="w-[370px] md:w-[450px] md:h-[315px]" --}}
    {{--                            src="https://www.youtube.com/embed/pz2e0zxt-OE?si=89UkT07rOd4-OZxT" title="YouTube video player" --}}
    {{--                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; Web-share" --}}
    {{--                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </section> --}}
    @component('home::Faq', ['faqs' => $faqs])
    @endcomponent
@endsection
