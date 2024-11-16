<div  id="day_{{$id}}" class="overflow-hidden transition-all ease-linear duration-500  max-h-12">
<div class="flex justify-between items-center bg-gray-200 hover:bg-gray-300 cursor-pointer
transition-all rounded-lg">
<button
class="py-2 px-4  transition-all duration-300  text-gray-900 font-semibold md:text-lg">
{{$text}}</button>

<svg id="plusSign_{{$id}}" class="h-6 w-6 md:h-8  md:w-8 text-gray-900"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
  </svg>

  <svg id="MinusSign_{{$id}}" class="h-6 w-6 md:h-8  md:w-8 text-gray-900 hidden"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
  stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="5" y1="12" x2="19" y2="12" /></svg>
</div>
<div class="border shadow-inner md:mt-1 bg-slate-50">
    <article>
        <h1 class="font-semibold text-center  pt-2 md:text-lg  md:font-bold">Title Of The Place</h1>
        <p class="text-xs font-semibold pl-3 md:text-base ">
            {{$itenary}}
        </p>    </article>
</div>
</div>
