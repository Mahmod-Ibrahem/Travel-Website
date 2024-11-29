@extends('layouts')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full "
            style="background-image: url('{{ asset('Images/DayToyrBg.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            @component('components.navbar')
            @endcomponent

                <div
                    class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                    <div class="Category_titleContainer">
                        <h1 id="home_title"
                            class="Category_title">
                            Exploring Egypt Day Tours With Comfort
                        </h1>
                    </div>
                </div>
        </div>
    </div>

    @component('components.Sections.DayToursCategory',['categories'=>$category])@endcomponent

    @endsection


