@extends('layouts')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
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
        <div class="flex flex-col md:flex-row
             md:p-1  space-y-3 md:space-y-0  w-full mx-auto ">
            <div class="flex flex-col w-[25rem] md:w-[45rem]">
                <div
                    class="flex flex-col relative
                      md:border md:rounded-xl overflow-hidden  shadow-md shadow-blue-200 rounded-r-lg  rounded-l-lg border-red-100">
                    @forelse ($tour->images as $index=>$img)
                        <div class="mySlides animate-fade relative ">
                            <div class="numberText">{{ $index + 1 }} / {{ count($tour->Images) }}</div>
                            <img id="img_{{ $index + 1 }}"
                                 class="cursor-pointer object-fill  w-full h-[30rem] md:h-[35rem]"
                                 src="{{$img->image_url}}" alt="{{$tour->title}}">
                            <div class="text">Caption Two</div>
                        </div>
                    @empty
                        No Images Yet
                    @endforelse

                    <a id="prev" class="previous">❮</a>
                    <a id="next" class="next">❯</a>

                    <div id="Image_bar"
                         class="flex justify-start items-start cursor-pointer overflow-auto hide-scrollbar">

                        @forelse ($tour->images as $index=>$img)
                            <img id="dot{{ $index }}" class="image-gallery" src="{{$img->image_url}}"
                                 alt="{{$tour->title}}">
                        @empty
                            No Images Yet
                        @endforelse
                    </div>

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

            <div class="mx-auto border h-fit text-gray-800 rounded-3xl shadow-md shadow-blue-200 ">
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

