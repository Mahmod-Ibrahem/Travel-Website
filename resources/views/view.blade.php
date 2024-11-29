@extends('layouts')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full"
            style="background-image: url('{{ $tours[0]['category']['image'] ?? asset('Images/Soon.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">

        @component('components.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="text-[20px] font-bold md:text-[40px] select-none animate-ToDown  text-white tracking-wide md:tracking-wide">
                        {{$tours[0]['category']['bg_header'] ?? 'Soon'}}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    @component('ToursCategory',['tours'=>$tours])@endcomponent
@endsection


