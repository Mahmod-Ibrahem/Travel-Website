<div class="h-fit md:h-[31rem] mb-1 md:w-[27rem] overflow-hidden bg-white rounded-lg shadow-md text-gray-800 md:mr-2 md:mb-2 animate-CategoryToRight md:animate-P_ToUp">
    <div class="relative overflow-hidden">
        <a href="{{$route}}"><img class="w-full h-[20rem] object-cover md:transition-all md:hover:scale-110 md:duration-[0.35s]  " src={{$url}} alt="Image"></a>
        <div class="absolute top-0 right-0">
            <div class="w-32 h-8 absolute top-4 -right-8">
                {{-- <div
                    class="h-full w-full bg-red-500 text-white text-center leading-8 font-semibold transform rotate-45">
                    SALE
                </div> --}}
            </div>
        </div>
    </div>
    <div class="p-4">
        <a href="#"><h3 class="text-xl font-bold mb-2 hover:text-red-600 hover:transition-all hover:duration-[0.35s]">{{$city}}</h3></a>
        <p class="text-base">
                {{$descr}}
        </p>
    </div>
</div>
