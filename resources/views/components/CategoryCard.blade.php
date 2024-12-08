<div class="flex-shrink-0 group  w-[380px] h-[280px]  overflow-hidden relative rounded-2xl  transition-all duration-200 cursor-pointer border border-white">
    <a href="{{ route($Category['type'].'.view', $Category['slug']) }}">
        <img class="group-hover:scale-110 transition-all duration-300 w-full h-full object-cover" src="{{$url}}" alt="{{$Category['name']}}">
             alt="Product Image">
    </a>
    <div class="absolute bottom-0  rounded-b-xl h-16 bg-black/20 w-full
             transition-all duration-200">
        <h3 class="text-[1.5rem] text-white font-semibold mb-2  pl-6">{{$Category['name']}}</h3>
    </div>
    <p
        class="text-sm font-semibold absolute top-0 right-0 bg-[#ff6700] px-4 py-2 text-white mt-3 mr-3 hover:bg-white
        hover:text-red-500 transition duration-500 ease-in-out">
        {{$Category['tours_count'] ?? 0}}
    </p>
</div>




