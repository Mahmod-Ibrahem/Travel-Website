<div id="title_{{$id}}" class="flex justify-between items-center cursor-pointer transition-all rounded-lg h-fit shadow-md border-l-[3px] border-l-[#ff6700] border-b
 mx-auto mb-3">
    <button
        class="py-2 px-4 text-[0.75rem] transition-all duration-300  text-gray-800 font-semibold md:text-base">
        {{$text}}
    </button>

    <svg id="plus_{{$id}}" class="h-6 w-6 md:h-8  md:w-8 text-gray-800"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>

    <svg id="Minus_{{$id}}" class="h-6 w-6 md:h-8  md:w-8 text-gray-800 hidden"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="5" y1="12" x2="19" y2="12" /></svg>
</div>

<div  id="descr_{{$id}}" class="flex flex-col  space-y-3 w-full overflow-hidden max-h-0 transition-all">
    <div  class=" rounded-lg  shadow-md border-2 py-1 border-[#ff6700]  mx-auto w-full break-words ">
            <p class="text-xs font-semibold pl-3 md:text-[0.90rem] tracking-wide leading-5 whitespace-normal max-h">
                {{$itenary}}
            </p>
    </div>
</div>


