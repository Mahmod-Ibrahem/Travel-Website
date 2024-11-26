@extends('layouts')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-[75%] w-full object-cover bg-top bg-cover"
            style="background-image: url('{{ $tour->tour_cover }}');">
            @component('components.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center h-full
                  ">

                <div class=" h-fit overflow-hidden  box-border text-center md:max-w-[75%]   ">
                    <h1 id="home_title"
                        class="text-[26px] font-bold md:text-[45px] select-none animate-ToDown  text-white">
                        {{$tour->title}}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="parent_container  text-gray-900 mb-4 md:mb-0">

        <div class="child_container">

            <h1 class="text-[1.1rem] md:text-[1.7rem] font-bold animate-HomeHeader_Up text-center">{{ $tour->title }}</h1>

            <div class="flex space-x-1 md:space-x-2 md:mt-4 animate-HomeHeader_Up items-center">
                <p class="text-lg md:text-2xl font-semibold text-gray-800/80">{{$tour->locations}}</p>
                <svg class="h-5 w-5 md:h-7 md:w-7 text-gray-800/80" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
        <div class="flex flex-col md:flex-row md:justify-around md:items-center
             md:p-1  space-y-3 md:space-y-0  w-full mx-auto ">

            <div class="flex flex-col w-[25rem] md:w-[55rem]">
                <div
                    class="flex flex-row  md:rounded-t-xl  rounded-l-lg
                    overflow-y-hidden overflow-x-auto scroll-smooth hide-scrollbar touch-none  w-full h-[35rem] relative">

                    @forelse ($tour->images as $index=>$img)
                        {{--                        <p class="numberText">{{ $index + 1 }} / {{ count($tour->Images) }}</p>--}}
                        <div class="w-full h-full flex-shrink-0">
                            <img id="img_{{ $index + 1 }}"
                                 class="cursor-pointer object-cover bg-center bg-cover w-full h-full"
                                 src="{{$img->image_url}}" alt="{{$tour->title}}">
                        </div>
                        {{--                        <p class="text">Caption Two</p>--}}
                    @empty
                        No Images Yet
                    @endforelse

                    <svg id="prev" class="text-[#ff6700] hover:text-white  previous w-9 h-9 text-center rounded-full"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline
                            points="12 8 8 12 12 16"/>
                        <line x1="16" y1="12" x2="8" y2="12"/>
                    </svg>

                    <svg d="next" class="next w-9 h-9 text-[#ff6700] hover:text-white text-center rounded-full"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline
                            points="12 16 16 12 12 8"/>
                        <line x1="8" y1="12" x2="16" y2="12"/>
                    </svg>
                </div>
                <div id="Image_bar"
                     class="flex justify-start items-start cursor-pointer  hide-scrollbar w-full flex-shrink-0 overflow-x-auto">

                    @forelse ($tour->images as $index=>$img)
                        <img id="dot{{ $index }}" class="image-gallery flex flex-shrink-0" src="{{$img->image_url}}"
                             alt="{{$tour->title}}">
                    @empty
                        No Images Yet
                    @endforelse
                </div>
                <!--Tap Collapse (itenary..etc)-->
                <div class="w-full p-1 font-Riot ">
                    <div id="tabContainer" class="w-full">
                        <div class="w-full">
                            <div
                                class="mb-4 flex space-x-1 p-1 md:p-2 border-2  rounded-lg shadow-md text-gray-800 border-gray-800 ">

                                @component('components.core.Tap_button', ['id' => '1', 'text' => 'Itinerary'])
                                @endcomponent
                                @component('components.core.Tap_button', ['id' => '2', 'text' => 'Places'])
                                @endcomponent
                                @component('components.core.Tap_button', ['id' => '3', 'text' => "Include"])
                                @endcomponent
                                @component('components.core.Tap_button', ['id' => '4', 'text' => "Excluded"])
                                @endcomponent
                                @component('components.core.Tap_button', ['id' => '5', 'text' => "Price Plane"])
                                @endcomponent
                            </div>

                            <div id="tabContent_itenary"
                                 class="transition-all duration-300 bg-white rounded-md  w-full gap-2 ">
                                @php
                                    $itenary_title = explode('/', $tour->itenary_title);
                                    $itenary_section = explode('/', $tour->itenary_section);
                                @endphp
                                @component('components.core.itenary_button',['id'=>1,'text'=>'Day One','itenary'=>'sdASSDAsdASAsdASSDAsdASSDAsdASSDAsdASSDAsdASSDAsdASSDA '])
                                @endcomponent

                            </div>


                            <div id="tabContent_Places"
                                 class="transition-all duration-300 bg-white p-4
                             rounded-lg  shadow-md border-l-[3px] border-l-gray-800">
                                <h2 class="tour_details_h">Places You'll Visit </h2>
                                @foreach (explode('/', $tour->places) as $places)
                                    <div class="flex justify-between space-x-4 h-fit">
                                        <svg class="h-6 w-6 text-gray-800" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <path d="M5 12l5 5l10 -10"/>
                                        </svg>
                                        <p class="tour_details_p">
                                            {{ $places }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>

                            <div id="tabContent_Include"
                                 class="transition-all duration-300 bg-white p-4
                             rounded-lg  shadow-md border-l-[3px] border-l-gray-800">
                                <h2 class="tour_details_h">What's Include</h2>
                                @foreach (explode('/', $tour->included) as $included)
                                    @component('components.core.include')
                                        @slot('text')
                                            {{ $included }}
                                        @endslot
                                    @endcomponent
                                @endforeach
                            </div>
                        </div>
                        <div id="tabContent_Exclude"
                             class="transition-all duration-300 bg-white p-4
                        rounded-lg  shadow-md border-l-[3px] border-l-gray-800">
                            <h2 class="tour_details_h">What's Excluded</h2>
                            @foreach (explode('/', $tour->excluded) as $excluded)
                                @component('components.core.include')
                                    @slot('text')
                                        {{ $excluded }}
                                    @endslot
                                @endcomponent
                            @endforeach
                        </div>

                        <div id="tabContent_PricePlane"
                             class="flex flex-col space-y-1 ">
                            @component('components.forms.PricePlane',['text'=>'1 Person','price'=>600])
                            @endcomponent
                        </div>
                    </div>

                </div>
            </div>

            <div class="border h-fit text-gray-800 rounded-3xl shadow-md shadow-blue-200 ">
                @component('components.forms.Booking_Form', ['price' => $tour->price,'tour'=>$tour])
                @endcomponent
            </div>

        </div>
    </div>
    <!--end Of tap-->
@endsection('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {

        let f_tap = 1;

        document.querySelectorAll('[id^="tab_"]').forEach(function (tab, index) {
            tab.addEventListener('click', function () {
                openTab(index + 1)
            })
        })


        openTab(f_tap)


        function openTab(tabIndex) {

            const tabContents = document.querySelectorAll('[id^="tabContent"]');

            const tabContentIds = Array.from(tabContents, tabContent => tabContent.id);


            tabContents.forEach(function (tabContent) {
                tabContent.style.display = "none";
            });

            // Remove 'text-white' class from all buttons
            document.querySelectorAll('[id^="tab_"]').forEach(function (button) {
                button.classList.remove("text-red-600");
            });

            // Show the selected tab content
            document.getElementById(tabContentIds[tabIndex - 1]).style.display = "inline-block";

            document.getElementById("tab_" + tabIndex).classList.add("text-red-600");
        }

        const itenaryTitle = document.querySelectorAll('[id^="title_"]')
        const itenaryDesc = document.querySelectorAll('[id^="descr_"]')
        const Plus = document.querySelectorAll('[id^="plus_"]');
        const Minus = document.querySelectorAll('[id^="Minus_"]');
        itenaryTitle.forEach(function (btn, index) {
            btn.addEventListener("click", function () {
                itenaryDesc[index].classList.toggle("max-h-0");// setTimeout(() => {
                Plus[index].classList.toggle("hidden");
                Minus[index].classList.toggle("hidden");
                // }, 150);
            });
        });
    })

</script>

