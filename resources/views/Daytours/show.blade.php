@extends('layouts')
@section('content')
@component('components.navbar',['home'=>false])
@endcomponent
@component('components.Intro',
['header'=>'Cairo DayTours & Excursions','route'=>'HomePage | DayTours | Cairo','TourType'=>'Day Tours'])
@endcomponent
    <secion id="Tours" class="p-3 md:w-screen">
        <div class="md:w-full flex flex-col md:flex-row md:justify-between px-6 md:space-x-4">

            <div class="md:flex flex-col justify-start items-start  md:w-[20%] md:space-y-4 md:mt-[75px] md:p-6 text-gray-800 shadow-md  border border-gray-300 rounded-xl
            md:h-[16rem] hidden">
                <h1 class="font-bold text-2xl border-b-2 border-black/10 md:pb-1 text-orange-500">Select Category</h1>
                <nav class="leading-7 text-lg font-semibold text-gray-800 md:space-y-2">
                    @component('components.Arrow-right',['Dest'=>'Luxor Day'])
                    @endcomponent
                    @component('components.Arrow-right',['Dest'=>'Aswan Day'])
                    @endcomponent
                    @component('components.Arrow-right',['Dest'=>'Sharm Elsheikh'])
                    @endcomponent
                    @component('components.Arrow-right',['Dest'=>'Hurghada'])
                    @endcomponent
                </nav>
            </div>

            <div class="flex flex-col w-[101%] md:space-y-8">
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:mr-5 justify-between  font-semibold md:text-lg  text-gray-900 ">
                    <p class="select-none text-center md:text-start ">Showing Results 10 items</p>
                    <div class="flex justify-between md:justify-center items-center space-x-4">
                    <label for="countries" class="mb-2  ">Select an option</label>
                    <select id="countries" class="bg-gray-50 border border-gray-300  md:text-base rounded-lg focus:ring-blue-500 focus:border-blue-500  p-2">
                      <option selected>Choose a country</option>
                      <option value="US">Newest On Top</option>
                      <option value="CA">Oldest On Top</option>
                      <option value="FR">Price Low To High</option>
                      <option value="DE">Price High To Low</option>
                    </select>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center md:justify-start md:items-start mb-5 space-y-2 md:flex-row md:space-y-0 flex-wrap md:animate-P_ToUp ">
                    @for($i=0; $i<4; $i++)
                    @forelse ($tours as $Dtour )
                    @component('components.TourCard',
                    ['tour'=>$Dtour,'date'=>$Dtour->created_at,'id'=>'TourCard_'.$Dtour->id,'home'=>false])
                    @slot('Offer')
                    {{$Dtour->OffetType}}
                    @endslot
                    @slot('city')
                    {{$Dtour->city}}
                    @endslot
                    @slot('image')
                    {{$Dtour->url()}}
                    @endslot
                    @slot('title')
                    {{$Dtour->title}}
                    @endslot
                    @slot('places')
                    {{$Dtour->places}}
                    @endslot
                    @slot('price')
                    {{$Dtour->price}}
                    @endslot
                    @slot('Duration')
                    {{$Dtour->Duration}}
                    @endslot
                    @slot('MaxPeople')
                    {{$Dtour->MaxPeople}}
                    @endslot
                    @endcomponent
                    @empty
                    Coming Soon
                        @endforelse
                        @endfor
                </div>
            </div>
        </div>
    </secion>
@endsection
