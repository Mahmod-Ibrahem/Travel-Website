@extends('layout.layouts')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ $tours[0]['tour_cover'] ?? asset('Images/BestDestination.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title" class="Category_title">
                        Best {{ $location->name }} Tours With Endless Experiences
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="parent_container gap-8 py-6">

        <div class="child_container gap-4 mx-auto">
            @forelse($tours as $tour)
                @include('tour::components.tour-card', ['tour' => $tour])
            @empty
                We Will Add It Soon !
            @endforelse

        </div>
    </div>
@endsection
