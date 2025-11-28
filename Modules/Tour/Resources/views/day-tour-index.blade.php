@extends('layout.layouts')
@section('title')
    Egypt Day Tours | Egypt Excursions | Egypt Sightseeing Tours
@endsection
@section('description')
    Explore the wonders of Egypt with our expert-led day tours and excursions. Discover iconic landmarks, delve into ancient
    history, and experience vibrant cultures on unforgettable sightseeing adventures tailored to your interests
@endsection
@section('content')
    <section class="relative md:bg-fixed md:h-screen h-[50vh]  w-full"
        style="background-image: url('{{ asset('Images/DayToursBg.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center px-2">
            <h1 class="backgroundImageHeader">
                {{ __("Explore Egypt's Best Day Tours for Unforgettable Adventures") }}
            </h1>
        </div>
    </section>
    <div class="child_container gap-4 mx-auto py-4">
        @forelse($tours as $tour)
            @include('tour::components.tour-card', ['tour' => $tour])
        @empty
            <p class="px-3 py-2 rounded-lg text-center w-full font-semibold md:text-xl">Soon</p>
        @endforelse
    </div>
@endsection
