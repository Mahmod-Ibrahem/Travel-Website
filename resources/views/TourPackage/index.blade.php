@extends('layouts')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ asset('Images/TourPackagesBg.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            @component('components.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full
                  ">

                <div class=" h-fit overflow-hidden  box-border text-center ">
                    <h1 id="home_title"
                        class="text-[26px] font-bold md:text-[40px] select-none animate-ToDown  text-white leading-tight">
                            Exclusive Egypt Travel Packages for Unforgettable Adventures <Await></Await>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    @component('components.Sections.TourPackagesCategory')@endcomponent
@endsection


