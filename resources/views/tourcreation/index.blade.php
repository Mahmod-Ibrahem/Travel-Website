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
                        Plan Your Perfect Tour in Just a Few Clicks
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="parent_container  mx-auto bg-[#f9f9f9]">

        <h1
            class="text-Primary font-bold text-xl md:text-3xl my-8">
            Choose Your Perfect Tour Location and Let Us Create Your Dream Travel Experience!

        </h1>

        <form class="child_container gap-3 max-w-6xl" METHOD="POST" action={{route('TourCreation.show')}}>
            @csrf
            <label for="Giza"
                   class="checkbox_label">
                <span class="checkbox_span">Giza</span>
                <input id="Giza" name="Giza" type="checkbox" class="checkbox">
            </label>
            <label for="Cairo"
                   class="checkbox_label">
                <span class="checkbox_span">Cairo</span>
                <input id="Cairo" name="Cairo" type="checkbox" class="checkbox">
            </label>

            <label for="Luxor"
                   class="checkbox_label">
                <span class="checkbox_span">Luxor</span>
                <input id="Luxor" name="Luxor" type="checkbox" class="checkbox">
            </label>
            <label for="Aswan"
                   class="checkbox_label">
                <span class="checkbox_span">Aswan</span>
                <input id="Aswan" name="Aswan" type="checkbox" class="checkbox">
            </label>
            <label for="Alexandria"
                   class="checkbox_label">
                <span class="checkbox_span">Alexandria</span>
                <input id="Alexandria" name="Alexandria" type="checkbox" class="checkbox">
            </label>

            <label for="Al-Faiyum"
                   class="checkbox_label">
                <span class="checkbox_span">Al-Faiyum</span>
                <input id="Al-Faiyum" name="Al Faiyum" type="checkbox" class="checkbox">
            </label>
            <label for="Al-Minya"
                   class="checkbox_label">
                <span class="checkbox_span">Al-Minya</span>
                <input id="Al-Minya" name="Al Minya" type="checkbox" class="checkbox">
            </label>

            <label for="Hurghada"
                   class="checkbox_label">
                <span class="checkbox_span">Hurghada</span>
                <input id="Hurghada" name="Hurghada" type="checkbox" class="checkbox">
            </label>

            <label for="Sharm El-Sheikh"
                   class="checkbox_label">
                <span class="checkbox_span">Sharm El-Sheikh</span>
                <input id="Sharm El-Sheikh" name="Sharm El-Sheikh" type="checkbox" class="checkbox">
            </label>

            <label for="Siwa"
                   class="checkbox_label">
                <span class="checkbox_span">Siwa</span>
                    <input id="Siwa" name="siwa" type="checkbox" class="checkbox">
            </label>

            <label for="westernDesert"
                   class="checkbox_label">
                <span class="checkbox_span">Western Desert</span>
                <input id="westernDesert" name="Western Desert" type="checkbox" class="checkbox">
            </label>
            <label for="Bahariya Oasis"
                   class="checkbox_label">
                <span class="checkbox_span">Bahariya Oasis</span>
                <input id="Bahariya Oasis" name="Bahariya Oasis" type="checkbox" class="checkbox">
            </label>

            <div class="flex flex-col md:flex-row items-center justify-center  mt-2">
                <button type="submit"
                        class="mb-3 px-10 py-2 md:text-2xl bg-[#ff6700] text-white
                 hover:text-white font-medium tracking-wide rounded-xl text-center cursor-pointer
                    transition-all p-1">Create My Dream Trip
                </button>
            </div>

        </form>
    </div>

@endsection
