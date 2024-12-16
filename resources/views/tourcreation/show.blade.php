@extends('layouts')
@section('title')
    Create Your Dream Tour in Minutes | Personalized Travel Planner
@endsection
@section('description')
    Easily create personalized tours in minutes! Select your desired location, and we’ll provide tailored travel plans, including top attractions and activities. Start planning your perfect trip today
@endsection
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full "
            style="background-image: url('{{ asset('Images/TMinute.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            @component('components.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="Category_title">
                        Adventure is calling. Start your journey today!
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="parent_container  mx-auto bg-[#f9f9f9]">

        @if(count($tours) > 0)
        <h1
            class="text-Primary font-bold text-xl md:text-3xl my-8">
            Explore Perfect Tours Based on Your Location.
        </h1>

            <div class="child_container gap-9">
                @forelse($tours as $tour)
                    @if($tour['group'] != 'SafariAdventures' && $tour['group'] != 'SeaShoreTours' && $tour['group'] != 'LayoverTours')
                        @component('components.TourCard', ['tour' => $tour])
                            @slot('image')
                                {{ asset($tour['tour_cover']) }}
                            @endslot
                        @endcomponent
                    @else
                        @component('components.SafariSeaTourCard', ['tour' => $tour])
                            @slot('image')
                                {{ asset($tour['tour_cover']) }}
                            @endslot
                        @endcomponent
                    @endif
                @empty
                    <p class="px-3 py-2 shadow-md rounded-lg text-center w-full font-semibold md:text-xl"> Soon </p>
                @endforelse
            </div>

        @endif

    </div>

@endsection
