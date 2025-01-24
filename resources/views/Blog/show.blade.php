@extends('layout.layouts')
@section('title')
    {{$about}} | Best Things to Do in {{$city}}
@endsection
@section('description')
    Discover top activities and attractions in {{$city}}. From sightseeing to dining, find the best experiences to make your visit unforgettable!
@endsection
@section('content')
    @php
        $componentName='components.Blog.'.$about
    @endphp

    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ asset('Images/Blog.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="Category_title">
                        {{$about}} | Best Things to Do in {{$city == 'Hidden' ?  'Hidden Gems In Egypt' : $city}}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    @component($componentName)
    @endcomponent
@endsection
