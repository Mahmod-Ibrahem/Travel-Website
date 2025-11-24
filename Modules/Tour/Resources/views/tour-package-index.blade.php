@extends('layout.layouts')
@section('title')
    Egypt Pyramids Tour Packages|Egypt Private Tours|Private Guided Tours of Egypt
@endsection
@section('description')
    We provide a wide variety of Egypt Pyramids tours packages, private guided tours of Egypt cover tours to the best
    destination of Egypt
@endsection
@section('content')
    <section class="relative md:bg-fixed md:h-screen h-[50vh]  w-full"
        style="background-image: url('{{ asset('Images/TourPackagesBg.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center px-2">
            <h1 class="backgroundImageHeader">
                {{ __('Discover Top Tour Packages with Infinite Adventures') }}
            </h1>
        </div>
    </section>
    <div class="child_container gap-4 mx-auto py-4">
        @forelse($tours as $tour)
            @include('tour::components.tour-card', ['tour' => $tour, 'image' => $tour['tour_cover']])
        @empty
            <p class="px-3 py-2 rounded-lg text-center font-semibold md:text-xl">Soon</p>
        @endforelse
    </div>
@endsection
