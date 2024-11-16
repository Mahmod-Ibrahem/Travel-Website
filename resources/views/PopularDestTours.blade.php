@extends('layouts')
@section('content')
@component('components.navbar',['home'=>false])
@endcomponent
@component('components.Intro',
['header'=>$city.' Tours & Excursions','route'=>'HomePage | Poular Destination | '.$city,'TourType'=>'Popular Tours'])
@endcomponent
    <secion id="Tours" class="p-3 md:w-screen">
        <div class="md:w-full flex flex-col md:flex-row px-6 md:space-x-4">

            <div class="flex flex-col w-[101%] md:space-y-8">
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:mr-5 justify-around  font-semibold md:text-lg  text-gray-900 ">
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
                <div class="flex flex-col justify-center items-center   mb-5 space-y-2 md:flex-row md:space-y-0 flex-wrap md:animate-P_ToUp ">
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
                </div>
            </div>
        </div>
    </secion>
@endsection
