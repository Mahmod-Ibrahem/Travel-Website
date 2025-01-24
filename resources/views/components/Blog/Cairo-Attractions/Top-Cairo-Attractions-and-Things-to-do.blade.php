@extends('layout.layouts')
@section('title')
    Top Cairo Attractions | Must-See Landmarks and Historical Sites
@endsection
@section('description')
    Explore the top attractions in Cairo, from the Pyramids of Giza to Islamic Cairo’s treasures. Discover Egypt’s most iconic landmarks with Desert Storm Egypt Tours
@endsection
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ asset('Images/Blog/Cairo/Attraction/1.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">


            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="Category_title">
                        Cairo Attractions and Things to do </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="parent_container max-w-7xl mx-auto py-6">
        <div class="flex flex-col justify-center items-center     overflow-hidden w-full">
            <p class="destination_p">Cairo is distinguished by many historical tourist attractions. Cairo is the first
                capital of Egypt, and therefore it includes the greatest tourist attractions that everyone enjoys.
                The city of Cairo is famous for having one of the Seven Wonders of the World. enjoy it with Egypt
                Classic
                Tour
            </p>


            <header class="destination_header "> Great Pyramids and the Sphinx:</header>

            <p class="destination_p">
                which is considered one of the oldest historical monuments in the world and which was built by the
                ancient
                Egyptian,
                and in which his ingenuity in building and construction appears, as the pyramids include tombs of the
                ancient great kings,
                and they have remained to our time since the ancient Egyptian built them thousands of
                years ago with Cairo Day Tours You can enjoy watching it.
            </p>
            <img src="{{ asset('Images/Blog/Cairo/Pyramids.avif') }}" class="md:w-[45rem] mb-4">

            <header class="destination_header ">Museum of Egyptian Antiquities</header>
            <p class="destination_p">
                Which contains a lot of Egyptian antiquities that the ancient Egyptian created. And it also contains
                many
                mummies of the kings and queens of the ancient era, and it shows the ancient Egyptian creativity in the
                art
                of mummification. You can watch that and learn a lot about the great ancient Egyptians. Enjoy watching
                the
                Egyptian civilization with Happy Egypt Tour
            </p>
            <img src="{{ asset('Images/Blog/Cairo/Attraction/171322-004-928304FB.webp') }}" class="md:w-[45rem] mb-4">


            <header class="destination_header">The Nile River:
            </header>

            <p class="destination_p">
                Every aspect of life in Egypt depended on the Nile River, and it was crucial in materials for building
                projects and other large-scale endeavors.
                You can stroll through the Nile River and enjoy the stunning scenery and fresh air. A Nile River cruise
                is
                one of the most enjoyable ways to see the wealth of archaeological treasures and cultural attractions
                that
                Egypt has to offer. It's a cruise that brings to life Egypt's 5,000-year history, transporting you back
                to
                the time of the pharaohs, the towering pyramids, and the Egyptian gods.in Egypt Nile Cruise You can
                enjoy
                Egypt Nile cruises

                Nile River cruise is one of the most enjoyable ways to see the wealth of archaeological treasures and
                cultural attractions that Egypt has to offer. It's a cruise that brings to life Egypt's 5,000-year
                history,
                transporting you back to the time of the pharaohs, the towering pyramids, and the Egyptian gods</p>
            <img src="{{ asset('Images/Blog/Cairo/Attraction/1.jpg') }}" class="md:w-[45rem] mb-4">

            <header class="destination_header">Mosque of Muhammad Ali:</header>

            <p class="destination_p">
                The Great Mosque of Muhammad Ali Pasha or Alabaster Mosque is a mosque situated in the Citadel of Cairo
                in
                Egypt and was commissioned by Muhammad Ali Pasha between 1830 and 1848.

                And it has a religious reference to the era of Muhammad Ali, where he decided to build its iconic symbol
                as
                a mosque, and chose to follow the classic Ottoman style, and built it inside the castle
            </p>
            <img src="{{ asset('Images/Blog/Cairo/Mohamed Ali.webp') }}" class="md:w-[45rem] mb-4">

            <header class="destination_header">Coptic Cairo</header>

            <p class="destination_p">
                Coptic Cairo is a part of Old Cairo that includes the Babylon Citadel, the Coptic Museum, the Hanging
                Church, the Greek Church of St. George, and many other Coptic churches and historical sites. You can
                learn
                about the different religions in Egypt through your trip to Egypt, learn more through Egypt classic
                tours,
                and create a long-lasting memory</p>
            <img src="{{ asset('Images/Blog/Cairo/Attraction/coptic-cairo.jpg') }}" class="md:w-[45rem] mb-4">

            <header class="destination_header">Khan El-Khalili:</header>

            <p class="destination_p">
                is a famous bazaar and market in Cairo. The bazaar area was established as a center of trade in the
                Mamluk
                era and named after one of the many historical khans. Since then, the bazaar area has become one of
                Cairo's
                main attractions for tourists and Egyptians alike. You can enjoy witnessing the history of Egypt and
                create
                memories that last for years.
            </p>
            <img src="{{ asset('Images/Blog/Cairo/Attraction/Khan.jpg') }}" class="md:w-[45rem] mb-4">

            <header class="destination_header">Cairo Citadel:</header>

            <p class="destination_p">
                or Saladin Citadel is a fortress from Islamic times in Cairo that protects Egypt from any interference
                by
                enemies. It is a great building that protected Egypt since ancient times. It was built by Salah al-Din
                al-Ayyubi and developed by subsequent Egyptian rulers. It was the seat of government in Egypt and the
                residence of its rulers for nearly 700 years from the 13th century to the 19th century. </p>
            <img src="{{ asset('Images/Blog/Cairo/Attraction/Khan.jpg') }}" class="md:w-[45rem] mb-4">
        </div>
    </div>
@endsection
