@extends('layouts')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ asset('Images/Blog/Cairo/salah4.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            @component('components.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="Category_title">
                        Salah El-Din Citadel History
                    </h1>
                </div>
            </div>
        </div>
    </div>

<div class="parent_container max-w-7xl mx-auto">
        <div class="flex flex-col justify-center items-center     overflow-hidden w-full">
            <p class="destination_p"> Located on a notable hill in Cairo, Egypt, the Salah El-Din Citadel is a massive fortress with a rich history spanning over eight
                centuries. Constructed by the renowned Muslim leader Salah El-Din Al-Ayyubi, often known as Saladin, it has endured as a
                representation of strength, tenacity, and architectural magnificence. You can know more about the Citadel during your Cairo tours.</p>
            <header class="destination_header "> Establishment and Building</header>

            <p class="destination_p">
                Salah El-Din Al-Ayyubi, the famed military leader and founder of the Ayyubid dynasty, built the Citadel in the twelfth century.
                The Citadel was constructed by Salah El-Din as a fortification against possible Crusader attacks and as a location
                for military and administrative leadership.
                 You can enter it while you are in Egypt on a day tour in Egypt
                </p>
                <p class="destination_p">
                    Strategic Point: The Citadel's strategic location atop the Muqattam Hills gave defenders a clear view of Cairo and the
                    surroundings, allowing them to identify and fend off any invading forces.
                    </p>

                    <p class="destination_p">
                        Marvelous Architecture: With its enormous walls, commanding gates, and exquisite minarets, the Citadel's
                         architecture is a combination of military fortifications and classical elegance.
                        The Muqattam Hills' limestone excavated for building gave the Citadel its characteristic golden color.
                        </p>
                        <img src="{{asset('Images/Blog/Cairo/Salah El Din.webp')}}" class="md:w-[40rem] mb-4">

            <header class="destination_header ">Historical Function of Military Stronghold</header>
            <p class="destination_p">
                The Citadel acted as a stronghold throughout its history, fending off multiple assaults and sieges.
                It was essential in protecting Egypt from outside threats like Crusader troops and those encroaching from nearby regions.
            </p>

            <p class="destination_p">
                Place of Power: The Ayyubids, Mamluks, Ottomans, and Khedives were among the dynasties and monarchs who used the Citadel as their capital.
                It contained government buildings, palaces, mosques, and barracks, all of which served as symbols
                of the ruling class's military might and political power. Egypt trips provide you with the opportunity
                to see this architectural greatness</p>

                <p class="destination_p">
                    Cultural Hub: Apart from its military and administrative roles, the Citadel served as a hub for intellectual and
                    cultural pursuits, promoting the sharing of ideas and expertise among academics, poets, and artists
                </p>
                <img src="{{asset('Images/Blog/Cairo/Salah2.jpg')}}" class="md:w-[40rem] mb-4">

            <header class="destination_header">Mosques and Palaces as Architectural Highlights </header>

            <p class="destination_p">
                The Mosque of Muhammad Ali, often called the Alabaster Mosque, is one of the many architectural wonders within the vast Citadel
                complex. In your classic tours in Egypt You will see an amazing architectural marvel if you are a fan of musical attractions was
                constructed in the 19th century in the Ottoman style.
                The Gawhara Palace and the Mosque of An-Nasir Muhammad are two other noteworthy buildings that include superb Islamic architectural
                and decorative aspects.</p>

                <p class="destination_p">
                    Installations by the Military:
                    The Citadel is fortified with a system of defensive ramparts, towers, and walls that are intended to repel attacks and give
                     the defenders tactical advantages.
                    Its well-preserved fortifications provide information on defensive tactics and military engineering from the
                    Middle Ages.</p>
                    <img src="{{asset('Images/Blog/Cairo/Salah3.jpg')}}" class="md:w-[40rem] mb-4">

            <header class="destination_header">UNESCO World Heritage Site of Cultural Significance</header>

            <p class="destination_p">
                In 1979, the Salah El-Din Citadel and the Old Cairo historic structures were recognized as UNESCO World Heritage structures, a testament to their exceptional global worth and cultural significance.
                It serves as evidence of both the lasting legacy of Islamic civilization and Egypt's rich past.</p>
                <p class="destination_p">
                    Travel Location:  Today, the Citadel is a well-liked tourist destination, drawing travelers
                    from all over the world who come to take in the breathtaking architecture, investigate the historical
                    sites, and take in the expansive views of Cairo from its high vantage point. You can take a full day in
                    Cairo with Happy Egypt to learn more...</p>
                    <img src="{{asset('Images/Blog/Cairo/Salah4.jpg')}}" class="md:w-[40rem] mb-4">

                    <header class="destination_header">Maintenance and Heritage</header>

                    <p class="destination_p">
                        Preserving Measures:To protect the architectural and cultural history of the Citadel, the Egyptian government has launched massive preservation
                         and restoration projects in collaboration with foreign groups.
                        The Citadel's conservation efforts are intended to preserve its historic monuments, keep it structurally sound,
                        and make sure that future generations can still visit it. you can take A tour to the Egyptian Museum, Salah al-Din
                        al-Ayyubi Citadel, and Khan al-Khalili its a nice tour to learn more.</p>
                        <p class="destination_p">
                            A Sign of Fortitude:

                            Withstanding the test of time and maintaining its beauty and magnificence for centuries, the Salah El-Din Citadel is a testament to Egypt's tenacity and enduring spirit.
                            It acts as a reminder of the country's significant contributions to civilization, rich history, and cultural legacy.</p>
        </div>
    </div>
@endsection
