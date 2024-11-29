@extends('nav')
@section('content')
    @component('component.navbar', ['home' => false])
    @endcomponent
    <header>
        <h1
            class="text-gray-800/90 text-3xl mt-3  font-bold leading-10 md:px-0   md:text-[2.5rem] md:font-extrabold text-center
    animate-HomeHeader_Up">
            Temple of Hatshepsut in Luxor
        </h1>
    </header>
    <div class="main_container">
        <div class="flex flex-col justify-center items-center     overflow-hidden w-full">
            <p class="destination_p">Hatshepsut Temple, located in Luxor, is a magnificent ancient Egyptian temple dedicated
                to Queen Hatshepsut. It's an architectural marvel with its terraced structure blending seamlessly with the
                surrounding cliffs. The temple showcases stunning reliefs and statues, depicting the life and achievements
                of Queen Hatshepsut. Explore the beautifully decorated colonnades and learn about the fascinating history of
                this powerful female pharaoh. Don't miss the chance to visit this iconic temple during your Luxor Tours.

                The Temple of Hatshepsut is one of the most important temples in Luxor, which you cannot miss the
                opportunity to visit during your Egypt trips. It is a temple full of antiquities and great Egyptian history.
            </p>
            <img src="{{ asset('Images/Blog/Luxor/Hatshebsut/1.webp') }}" class="md:w-[45rem] mb-4">


            <header class="destination_header ">Interesting facts about the Hatshepsut Temple in Luxor</header>
            <div class="items-start">
            <p class="destination_p">
                Unique Architecture: The temple is known for its unique design, featuring terraces, colonnades, and ramps
                that blend harmoniously with the natural surroundings.
            </p>
            <p class="destination_p">
                Mortuary Temple: Hatshepsut Temple was primarily built as a mortuary temple, dedicated to the worship of the
                pharaoh and to honor the gods </p>
            <p class="destination_p">
                Queen Hatshepsut: The temple was commissioned by Queen Hatshepsut, one of the few female pharaohs in ancient
                Egypt. It showcases her achievements and reign. </p>
            <p class="destination_p">
                Deir el-Bahari: The temple is also referred to as the Temple of Deir el-Bahari, named after the nearby
                village. </p>
            <p class="destination_p">
                Reliefs and Statues: The temple is adorned with intricate reliefs and statues depicting scenes from Queen
                Hatshepsut's life, including her famous expedition to the Land of Punt. </p>
            <p class="destination_p">
                Restoration Efforts: Over the years, the temple has undergone extensive restoration to preserve its beauty
                and historical significance. </p>
            </div>
            <img src="{{ asset('Images/Blog/Luxor/Hatshebsut/2.webp') }}" class="md:w-[45rem] mb-4">

            <header class="destination_header ">What about Queen Hatshepsut?</header>
            <p class="destination_p">
                Queen Hatshepsut was an influential pharaoh of ancient Egypt who reigned during the 15th century BCE. She is
                known for her successful reign, trade expeditions to the Land of Punt, and her unique status as a female
                pharaoh. Hatshepsut's temple in Luxor stands as a testament to her power and achievements, showcasing her
                impressive architectural vision and artistic legacy. Her reign is considered a prosperous and peaceful
                period in Egyptian history. Queen Hatshepsut is one of the greatest ancient kings. She had a reign full of
                prosperity and she possessed power. Through a classic trip to Egypt, you can visit the Temple of Hatshepsut
                and have Mr Egypt’s private tour guide inform you of all the information about the temple.
            </p>
            <img src="{{ asset('Images/Blog/Luxor/Hatshebsut/3.webp') }}" class="md:w-[45rem] mb-4">
            <div class="items-start">

            <p class="destination_p">
                Female Pharaoh: Hatshepsut was one of the few female pharaohs in ancient Egypt. She ruled as a pharaoh and
                held the title of "Maatkare" during the 15th century BCE </p>
            <p class="destination_p">
                Reign and Achievements: Hatshepsut's reign was marked by prosperity and stability. She focused on expanding
                trade, launching successful trade expeditions to the Land of Punt, and overseeing impressive building
                projects, including her iconic temple in Luxo </p>
            <p class="destination_p">
                Temple of Hatshepsut: The temple she built in Luxor, known as the Hatshepsut Temple or Temple of Deir
                el-Bahari, is a remarkable architectural masterpiece that showcases her reign and accomplishments. It's
                definitely worth a visit! </p>
            <p class="destination_p">
                Legacy: Despite attempts to erase her from history after her death, Hatshepsut's legacy endured. She was a
                powerful and influential ruler who left a lasting impact on ancient Egypt. </p>
            </div>
            </div>
    </div>
    @component('component.footer')
    @endcomponent
@endsection
