@extends('layouts')
@section('title')
    Best Luxor Attractions | Must-See Ancient Egyptian Sites
@endsection
@section('description')
    Discover the best attractions in Luxor with Desert Storm Egypt Tours. Explore iconic landmarks like the Valley of the Kings, Karnak Temple, and Luxor Temple
@endsection
@section('content')

    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ asset('Images/Blog/Luxor/Luxor Attraction/6.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            @component('components.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="Category_title">
                        Best Luxor attraction
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="parent_container max-w-7xl mx-auto py-6">
        <div class="flex flex-col justify-center items-center     overflow-hidden w-full">
            <p class="destination_p">Luxor is a city located on the eastern bank of the Nile River in southern Egypt. It is
                the ancient capital of the Pharaohs during the sixteenth and eleventh centuries BC. There are two huge
                monuments in it: the magnificent Luxor Temple and the Karnak Temple. The royal tombs are located in the
                Valley of the Kings and the Valley of the Queens on the west bank of the river.Luxor is distinguished as the
                city that has most of its effects in the open air, where you can see it while you are touring the great city
                With EgyptTravel Packages to Luxor You will see all the landmarks of Aswan
            </p>


            <header class="destination_header ">Top Luxor Attractions</header>
            <img src="{{ asset('Images/Blog/Luxor/Luxor Attraction/1.webp') }}" class="md:w-[45rem] mb-4">
            <p class="destination_p">
                Temple of Karnak:It is important to Egypt's cultural history because it was a place of worship and provides
                clues about ancient Egyptian religion.It was built as a temple dedicated to worshiping the gods. Being the
                largest building for religious purposes ever constructed, it is the most chosen and privileged place by the
                ancient Egyptians.
            </p>

            <header class="destination_header ">Tomb of Ramses</header>
            <img src="{{ asset('Images/Blog/Luxor/Luxor Attraction/2.webp') }}" class="md:w-[45rem] mb-4">
            <p class="destination_p">
                Ramesses II, better known as Ramesses the Great, was an ancient Egyptian pharaoh who was the third ruler of
                the Nineteenth Dynasty. This temple was built and contains the tomb of King Ramesses.The temple's interior
                is decorated with engravings showing Ramesses and Nefertari paying homage to the gods and bas-reliefs
                depicting the Battle of Kadesh in which the Egyptian king fought against the Hittites.
            </p>


            <header class="destination_header">Luxor Temple
            </header>
            <img src="{{ asset('Images/Blog/Luxor/Luxor Attraction/3.jpg') }}" class="md:w-[45rem] mb-4">

            <p class="destination_p">
                Luxor Temple is a large ancient Egyptian temple complex located on the eastern bank of the Nile River in the
                city of Luxor and was built around 1400 BC.It is a sacred temple for the ancient Egyptians
                It was built to celebrate the Opet Festival.
                The temple served as a burial site for the royal family.
                Therefore, it is one of the most distinguished temples in Luxor </p>

            <header class="destination_header">Valley of the Kings </header>
            <img src="{{ asset('Images/Blog/Luxor/Luxor Attraction/4.webp') }}" class="md:w-[45rem] mb-4">

            <p class="destination_p">
                The valley became a royal cemetery for the great pharaohs such as Tutankhamun, Seti I and Ramesses II, in
                addition to queens and high priests. The temple is considered a unique tourist attraction in terms of luxury
                and greatness of the building and construction in the ancient era and its distinction in that it includes
                many tombs of kings and queens.
            </p>

            <header class="destination_header">Hatshepsut Temple</header>
            <img src="{{ asset('Images/Blog/Luxor/Luxor Attraction/5.webp') }}" class="md:w-[45rem] mb-4">

            <p class="destination_p">
                it is the temple built during the reign of Pharaoh Hatshepsut of the Eighteenth Dynasty in Egypt. It is
                located opposite the city of Luxor, and is considered one of the masterpieces of ancient architecture. It
                has a sloping facade and has a series of ancient terraces. Its walls are decorated with carvings depicting
                scenes from the life and rule of Queen Hatshepsut, and it contains images of God at that time.</p>


        </div>
    </div>
@endsection
