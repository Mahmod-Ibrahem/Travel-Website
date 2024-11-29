<article
    class="TourCard relative select-none">
    <a href="{{ route($tour["group"].'.Tour', ['Category' => $tour['category']['slug'],'Tour' => $tour['slug']]) }}" class="h-72 overflow-hidden cursor-pointer">
        <img src="{{asset($image)}}"
             class="h-full w-full object-cover hover:scale-110 transition-all duration-300" alt=""/>
    </a>
    <div class="flex flex-col p-4 md:px-3 md:py-4 gap-2">
        @if($offer ?? false)
            <a>

                <div
                    class="absolute left-[-40px] top-[30px] bg-[#a30e0e] rotate-[310deg] h-[30px] w-[150px] text-[12px] text-center pt-[6px] font-medium text-white m-0">
                    {{$offer}}
                </div>
            </a>
        @endif
        <a>
            <a href="{{ route($tour["group"].'.Tour', ['Category' => $tour['category']['slug'],'Tour' => $tour['slug']]) }}"
               class="text-[#ff6700] md:text-[19px] font-semibold whitespace-normal line-clamp-2 min-h-[50px] hover:text-red-700 transition-all">
                {{$tour['title']}}
            </a>

        </a>
        <p class="text-[14px] font-medium text-Primary w-full whitespace-normal line-clamp-3 leading-6 min-h-[72px]  ">
            {{$tour['description']}}
        </p>
        <div class="flex md:flex-row items-center  justify-between">
            <div class="flex md:flex-row  items-center gap-1  pb-2">
                <svg height="26px" width="26px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M12 17V12L13.5 9.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                            stroke="#ff6700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
                <p class="font-semibold text-sm">{{$tour['duration']}}</p>
            </div>

            <div class="flex md:flex-row justify-start items-center gap-1 mb-1">
                <svg height="24px" width="24px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 235.517 235.517" fill="#ff6700" stroke="#ff6700">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <path style="fill:#ff6700;"
                                  d="M118.1,235.517c7.898,0,14.31-6.032,14.31-13.483c0-7.441,0-13.473,0-13.473 c39.069-3.579,64.932-24.215,64.932-57.785v-0.549c0-34.119-22.012-49.8-65.758-59.977V58.334c6.298,1.539,12.82,3.72,19.194,6.549 c10.258,4.547,22.724,1.697,28.952-8.485c6.233-10.176,2.866-24.47-8.681-29.654c-11.498-5.156-24.117-8.708-38.095-10.236V8.251 c0-4.552-6.402-8.251-14.305-8.251c-7.903,0-14.31,3.514-14.31,7.832c0,4.335,0,7.843,0,7.843 c-42.104,3.03-65.764,25.591-65.764,58.057v0.555c0,34.114,22.561,49.256,66.862,59.427v33.021 c-10.628-1.713-21.033-5.243-31.623-10.65c-11.281-5.755-25.101-3.72-31.938,6.385c-6.842,10.1-4.079,24.449,7.294,30.029 c16.709,8.208,35.593,13.57,54.614,15.518v13.755C103.79,229.36,110.197,235.517,118.1,235.517z M131.301,138.12 c14.316,4.123,18.438,8.257,18.438,15.681v0.555c0,7.979-5.776,12.651-18.438,14.033V138.12z M86.999,70.153v-0.549 c0-7.152,5.232-12.657,18.71-13.755v29.719C90.856,81.439,86.999,77.305,86.999,70.153z"></path>
                        </g>
                    </g>
                </svg>
                <p class="font-medium text-sm">{{$tour['price_per_person']}}/Pax</p>
            </div>

            <div class="flex md:flex-row justify-start items-center gap-1 mb-1">
                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9ZM11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12Z"
                              fill="#ff6700"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M21.83 11.2807C19.542 7.15186 15.8122 5 12 5C8.18777 5 4.45796 7.15186 2.17003 11.2807C1.94637 11.6844 1.94361 12.1821 2.16029 12.5876C4.41183 16.8013 8.1628 19 12 19C15.8372 19 19.5882 16.8013 21.8397 12.5876C22.0564 12.1821 22.0536 11.6844 21.83 11.2807ZM12 17C9.06097 17 6.04052 15.3724 4.09173 11.9487C6.06862 8.59614 9.07319 7 12 7C14.9268 7 17.9314 8.59614 19.9083 11.9487C17.9595 15.3724 14.939 17 12 17Z"
                              fill="#ff6700"></path>
                    </g>
                </svg>
                <p class="font-medium text-sm">{{$tour['visit_count']}}</p>
            </div>
        </div>
        <a class="flex items-center justify-center">
            <button class="font-medium text-Primary text-[16px] tracking-widest rounded-full transition-all duration-500
                          bg-[#f9f9f9]  border-2 border-[#ff6700] shadow-md hover:bg-orange-600 hover:text-white px-14 py-2">
                Explore
            </button>
        </a>
    </div>
</article>
