<div
 class="relative flex-col rounded-b-2xl flex-shrink-0">
    <div class="overflow-hidden group w-[17rem] h-[17rem] md:w-[16rem] md:h-[16rem] rounded-3xl ">
        <a  href="{{route('BestDestination.index',['location'=>$city])}}">
            <img src="{{$url}}"
            class="w-full h-full  object-cover group-hover:scale-110 transition-all duration-300">
            </a>
    </div>
    <h1
     class="absolute text-lg font-semibold text-center py-2 right-[22%] -bottom-4 rounded text-black bg-white md:w-52 w-40  md:right-[9%] md:-bottom-4
      select-none shadow-md md:text-base">{{$city}}</h1>
</div>
