<div
 class=" relative flex-col shadow-xl md:shadow-PouplarD md:hover:shadow-3xl md:transition-all md:duration-[0.3s] cursor-pointer rounded-b-3xl
  md:hover:-translate-y-2 md:hover:shadow-red-100">
    <div class="overflow-hidden ">
    {{-- <a href="{{route('PopularDest',['Dest'=>null])}}"> --}}
        <a href="{{route('PopularDest',['Dest'=>$city])}}" >
            <img src="{{asset('Images/game-1807.jpg')}}"
            class="w-[15rem] h-[15rem] md:w-[18rem] md:h-[18rem]  rounded-3xl">
            </a>
    {{-- </a> --}}
    </div>
    <h1
     class="absolute text-lg font-bold text-center py-2 right-[19%] -bottom-4 rounded-md text-black bg-white md:w-52 w-40  md:right-[18%] md:-bottom-4
      select-none">{{$city}}</h1>
</div>
