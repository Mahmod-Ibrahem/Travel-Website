@extends('layouts')
@section('content')

    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full"
            style="background-image: url('{{ asset('Images/About.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">

            @component('components.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="Category_title">
                        We are Desert Storm Egypt Tours
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <main class="parent_container py-10 bg-[#f2f2f2] ">
        <div class="child_container">
            <div class="flex flex-col-reverse md:flex-row  justify-between items-center md:space-x-14 mx-auto ">
                <div
                    class="shadow   rounded-xl overflow-hidden w-[25rem] md:w-[38rem] h-[20rem]  md:h-[30rem]">
                    <img class="w-full h-full object-cover bg-center bg-cover" src="{{asset('Images/About/Welcome to family.jpg')}}">
                </div>

                <div
                    class="flex flex-col md:max-w-[550px]  space-y-3   md:border-gray-100 rounded-md bg-white md:shadow p-4   ">
                    <h1 class="md:text-2xl font-semibold text-[#333333]">Welcome to the Family
                    </h1>
                    <p class="text-Primary font-semibold ">Me, my sister, and my dad founded this family travel business
                        in 2009. All of us have been working in the tourism industry as Egyptologist tour guides and
                        hold master's degrees in Egyptology.

                        We grew up in the shadow of the Sphinx, our homeland and birthplace. This unique upbringing
                        inspired us to become Egyptologists, passionate about showcasing the real Egypt and revealing
                        the hidden secrets of ancient Egyptian civilization.</p>
                </div>
            </div>

            <div class="flex flex-col md:flex-row  justify-between items-center md:space-x-14 mx-auto ">


                <div
                    class="flex flex-col md:max-w-[550px]  space-y-3   md:border-gray-100 rounded-md bg-white md:shadow p-4   ">
                    <h1 class="md:text-2xl font-semibold text-[#333333]">A Legacy of Storytelling

                    </h1>
                    <p class="text-Primary font-semibold ">Living near the Giza archaeological site, we’ve heard
                        countless tales of the Sphinx and the pyramids from our neighbors and great-grandfathers. These
                        stories, passed down through generations, recount secrets of ancient Egypt uncovered by
                        archaeologists during the time of the French expedition and British occupation.

                        These experts, alongside local missions and excavations, revealed much about Egypt's ancient
                        civilization. Growing up amidst this rich heritage, we felt motivated to channel our passion
                        into understanding ancient Egyptian culture and sharing it with the world.</p>
                </div>
                <div
                    class="shadow rounded-xl overflow-hidden w-[25rem] md:w-[38rem] h-[20rem]  md:h-[30rem]">
                    <img class="w-full h-full object-cover bg-cover bg-center"
                         src="{{asset('Images/About/Legacyjpg.jpg')}}">
                </div>
            </div>

            <div class="flex flex-col-reverse md:flex-row  justify-between items-center md:space-x-14 mx-auto  ">

                <div
                    class="shadow-md  rounded-xl overflow-hidden w-[25rem] md:w-[38rem] h-[20rem]  md:h-[30rem]">
                    <img class="w-full h-full object-cover bg-cover bg-center"
                         src="{{asset('Images/About/MISSION.jpg')}}">
                </div>

                <div
                    class="flex flex-col md:max-w-[550px]  space-y-3   md:border-gray-100 rounded-md bg-white md:shadow p-4   ">
                    <h1 class="md:text-2xl font-semibold text-[#333333]">Our Mission and Passion
                    </h1>
                    <p class="text-Primary font-semibold ">This legacy, inherited from generation to generation, drives
                        our dedication to exploring Egypt's wonders, especially in the Lower Kingdom. We focus on
                        creating unique and memorable experiences for our guests, highlighting hidden gems like Giza and
                        Saqqara—Egypt's oldest and largest archaeological sites.

                        When you choose to travel with us, you're not just a guest; you become a part of our extended
                        family. We promise that you’ll leave with unforgettable memories and, more importantly, as great
                        friends.</p>
                </div>

            </div>


        </div>
    </main>
@endsection('content')
