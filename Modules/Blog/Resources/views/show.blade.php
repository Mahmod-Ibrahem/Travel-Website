@extends('layout.layouts')
@section('title')
    Mr Egypt Tours | Explore {{ $city }} In Egypt
@endsection
@section('description')
    Discover the best attractions, dining, and experiences in {{ $city }}. Plan your perfect trip with top things to
    do and must-visit spots!
@endsection
@section('content')

    <div class="h-[20rem] md:h-screen w-full ">
        <div class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ asset('Images/Blog.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">
                <div class="Category_titleContainer">
                    <h1 id="home_title" class="Category_title">
                        Explore the Wonders of Top {{ $city->name }} in Egypt

                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="child_container py-6 md:py-12">
        @forelse($cityAttractions as $attraction)
            @component('blog::components.BlogCard', ['attraction' => $attraction])
            @endcomponent
        @empty
            Soon
        @endforelse
    </div>
@endsection
