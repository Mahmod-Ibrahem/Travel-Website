<article
class="TourCard {{ $home ?? true ? 'md:hidden md:animate-P_ToUp' : ''}}  relative"
id="{{$id}}">
   <a href="{{route('Tour',['tour'=>$tour->title])}}">
    <img src={{asset($image)}}
    class="h-56 w-full object-cover" alt="" />
</a>
   <div class="flex flex-col px-2 md:px-5 ">
    @if($Offer=='hot')
    <a href="{{route('Tour',['Daytour'=>'Cairo','tour'=>'asd'])}}">
        <div
            class="text-xs absolute top-0 right-0 bg-gray-800 px-4 py-2 text-white font-bold mt-3 mr-3 hover:bg-gray-950
            transition duration-500 ease-in-out">
            Limited
        </div>
    </a>
    @endif
     <span class="my-1 flex items-center text-sm font-semibold opacity-70">
         <img class="w-[1rem]" src="{{asset('Images/icons/location.png')}}" alt="Clock">
         {{$city}}
     </span>
     <a href="{{route('Tour',['Daytour'=>'Cairo','tour'=>'asd'])}}"><h3 class="mb-2 text-md font-semibold ">Private experience to Giza pyramids  Saqqara and Memphis
     </h3>
     </a>
     <div class="flex md:flex-row justify-start items-center space-x-3 border-b-2 pb-2 mb-2" >
         <img class="w-[1.2rem]" src="{{asset('Images/icons/clock.png')}}" alt="Clock">
         <p class="font-medium text-sm">{{$Duration}}</p>
     </div>
     <div class="flex md:flex-row justify-start items-center space-x-3 border-b-2 pb-1 mb-1" >
        <svg class="h-6 w-6 text-gray-800"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>
        <circle cx="9" cy="7" r="4" />  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                <p class="font-medium text-sm">
             {{$MaxPeople}} Max People
            </p>
     </div>
     <div class="flex md:flex-row justify-start items-center space-x-3 mb-1" >
         <img class="w-[1.3rem]" src="{{asset('Images/icons/dollar.png')}}" alt="Price">
         <p class="font-medium text-sm">{{$price}}/Pax</p>
     </div>
     @php
     $Places=explode('/',$places)
     @endphp
     <div class="flex justify-start items-start mt-1">
        @forelse ($Places as $place )
        @component('components.ProductBadge',['cardtext'=>$place])
        @endcomponent
        @empty
        Non Mentioned Yet !
        @endforelse
     </div>
   </div>
</article>
