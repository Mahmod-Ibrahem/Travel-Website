@extends('layouts')
@section('content')
@vite('resources/js/Tour.js')
<div id="navbar">
@component('components.navbar',['home'=>false])
@endcomponent
</div>
<section id="intro">
@component('components.Intro',
['header'=>$currentTour->title,'route'=>'HomePage | DayTours | Cairo','TourType'=>'DayTours'])
@endcomponent
</section>

<section id="Tours" class="md:p-3 md:w-[94rem]">
    <div class="md:w-full flex flex-col md:flex-row md:justify-center md:px-6 md:space-x-32">
        <div class="flex flex-col">
        <div
        class="flex flex-col relative
          md:border md:rounded-xl overflow-hidden border-black/20 shadow-md md:w-[50rem]  ">
        <div class="mySlides animate-fade relative">
            <div class="numbertext"></div>
            <img id="img_1"  class="cursor-pointer object-fill  w-full md:w-[50rem] h-[30rem] md:h-auto  md:max-h-[35rem]" src="{{asset('Images/Test.jpg')}}">
            <div class="text">Caption Two</div>
            {{-- @can('update',$tour)
            <form method="POST"
            action="{{ route('Daytours.image.destroy', ['Daytour' => $tour->id, 'image' => $img->id]) }}"
            class="absolute bg-transparent top-0 right-0 p-3">
          @method('DELETE')
          @csrf

          <button class="border-2 editbtn p-1" type="submit">
              Delete
          </button>
      </form>
      @endcan
    @empty
        No Images Yet
    @endforelse --}}
    </div>

        <a id="prev" class="previous">❮</a>
        <a id="next" class="next">❯</a>

        <div class="flex w-full  cursor-pointer overflow-auto hide-scrollbar mt-[2px] md:space-x-[1px]">

            {{-- @forelse ($tour->Images as $index=>$img) --}}
                <img id="dot1"  class="image-gallery" src="{{asset('Images/Test.jpg')}}"></img>
            {{-- @empty --}}
                {{-- No Images Yet --}}
            {{-- @endforelse --}}
        </div>
    </div>
    <div
     class="flex justify-around mt-3 mb-2  md:space-x-12 md:mt-6  border-black/20   text-black shadow-lg md:mb-2
     bg-gray-500 rounded-lg py-2 px-2 md:h-14 ">
        @component('components.Tap_button', ['id' => '1', 'text' => 'Itinerary'])
        @endcomponent
        @component('components.Tap_button', ['id' => '2', 'text' => 'Places'])
        @endcomponent
        @component('components.Tap_button', ['id' => '3', 'text' => "Tour Include"])
        @endcomponent
        @component('components.Tap_button', ['id' => '4', 'text' => "Tour Excluded"])
        @endcomponent
        @component('components.Tap_button', ['id' => '5', 'text' => "Price Plane"])
        @endcomponent
    </div>
    @php
    $itenary_title = explode('/', $currentTour->itenary_title);
    $itenary_section = explode('/', $currentTour->itenary_section);
    $Places=explode('/',$currentTour->places);
    $Includes=explode('/',$currentTour->included);
    $Excludes=explode('/',$currentTour->excluded)
    @endphp
    <div id="tabContent_itenary"
    class="flex flex-col space-y-1 ">
    @forelse ($itenary_title as $itenary)
    @component('components.itenary_button', ['id' => '1', 'text' => 'Day 1','itenary'=>$itenary])
    @endcomponent
    @empty
    Coming Soon!
    @endforelse
   </div>

   <div id="tabContent_Places"
   class="flex flex-col space-y-1 ">
   @forelse ($Places as $place )
   @component('components.PIX',['text'=>$place])
   @endcomponent
   @empty
   Coming Soon
   @endforelse
  </div>

  <div id="tabContent_Include"
  class="flex flex-col space-y-1 ">
  @forelse ($Includes as $include )
  @component('components.PIX',['text'=>$include])
  @endcomponent
  @empty
  Coming SOON
  @endforelse

 </div>

 <div id="tabContent_Exclude"
 class="flex flex-col space-y-1 ">
 @forelse ($Excludes as $exclude )
 @component('components.exclude',['text'=>$exclude])
 @endcomponent
 @empty
 Coming Soon
 @endforelse
</div>
<div id="tabContent_PricePlane"
class="flex flex-col space-y-1 ">
@component('components.PricePlane',['text'=>'1 Person','price'=>600])
@endcomponent
@component('components.PricePlane',['text'=>'2-3 Person','price'=>400])
@endcomponent
@component('components.PricePlane',['text'=>'4-6 Person','price'=>400])
@endcomponent
<div class="border shadow-inner md:mt-1 bg-slate-50">
    <article>
        <h1 class="md:text-xl text-center font-bold pt-2 text-orange-600">Notes
             <svg class="h-4 w-4 md:h-8 md:w-8 text-orange-600 inline-block text-center"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"
             stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
             <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
             <line x1="12" y1="9" x2="12" y2="13" />  <line x1="12" y1="17" x2="12.01" y2="17" /></svg>

        </h1>
        <div class="text-sm space-y-1 md:text-base">

        <p class="font-semibold pl-3">Children from 1-5 years are free of charge </p>
        <p class=" font-semibold pl-3">Children between 6-11 years get 50% off</p>
        </div>
    </article>
</div>
</div>

</div>

            <div
             class="flex flex-col justify-center items-center md:justify-start md:items-start  md:space-y-8
             my-3 md:my-0">
                @component('components.Price_Form')
                @endcomponent
            </div>
    </div>
    </section>

    <section id="ImageLightbox">
        <div id="image_lbox" class="hidden w-screen h-screen overflow-auto">
            <h1 class="flex justify-center items-center text-3xl md:text-3xl bg-black text-white min-h-[10%] max-h-fit">
               {{$currentTour->title}}</h1>
            {{-- <p id="lbox_close" class="text-5xl cursor-pointer text-right mr-2 md:mr-10 leading-10 md:leading-[3rem] ">&times;</p> --}}
            <div class="item_container w-full relative">
                {{-- <div --}}
                    <div class="lightbox_image_display md:w-[96rem]">
                    {{-- @forelse ($tour->Images as $index=>$img) --}}
                        <div class="LightBox_Slides animate-fade  ">
                            <div class="numbertext"></div>
                            <img class="object-fill  md:w-[96rem] h-[35rem] md:h-[35rem]" src="{{asset('Images/Test.jpg')}}">

                            <div class="text">Caption One</div>
                        </div>
                        <div class="LightBox_Slides animate-fade  ">
                            <div class="numbertext"></div>
                            <img class="object-fill  md:w-[96rem] h-[35rem] md:h-[35rem]" src="{{asset('Images/Test.jpg')}}">

                            <div class="text">Caption One</div>
                        </div>
                    {{-- @empty --}}
                        {{-- No Image Yet! --}}
                    {{-- @endforelse --}}

                    <p id="LightBox_prev" class="previous">❮</p>
                    <a id="LightBox_next" class="next">❯</a>
                </div>
                <p id="lbox_close" class="absolute right-0 top-0 text-5xl cursor-pointer text-right mr-2 md:mr-10 leading-10 md:leading-[3rem]
                text-white ">&times;</p>
            </div>
            <div
                class="flex flex-wrap h-[20vh] overflow-y-auto cursor-pointer bg-white justify-center items-center
                md:overflow-y-auto md:h-20">
                {{-- @forelse ($tour->Images as $index=> $img) --}}
                    <img id="Lightbox_img1" class="LightBox_image-gallery" src="{{asset('Images/Test.jpg')}}"></img>
                    <img id="Lightbox_img1" class="LightBox_image-gallery" src="{{asset('Images/Test.jpg')}}"></img>
                    <img id="Lightbox_img1" class="LightBox_image-gallery" src="{{asset('Images/Test.jpg')}}"></img>
                    <img id="Lightbox_img1" class="LightBox_image-gallery" src="{{asset('Images/Test.jpg')}}"></img>
                    <img id="Lightbox_img1" class="LightBox_image-gallery" src="{{asset('Images/Test.jpg')}}"></img>
                {{-- @empty --}}
                    {{-- No Images Yet! --}}
                {{-- @endforelse --}}
            </div>
            <!--Tap Collapse (itenary..etc)-->

        </div>
    </section>
@endsection
