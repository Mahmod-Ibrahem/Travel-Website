@extends('layouts')
@section('content')
@component('components.navbar',['home'=>false])
@endcomponent
<section id="intro">
<div class="md:w-[94rem] bg-slate-100/80">
<header>
    <pre class="p-6 text-5xl font-bold font-Logo text-gray-950 text-center select-none"><span class="text-orange-500">H   Day Tours</span></pre>
</header>
</div>
</section>
<section id="Tours-Separation" class="mx-auto w-fit md:w-[85rem]">
    <div class="parent_container">
        <header>
            <h1
            id="DayTourSeparation"
             class="homeSecHeader md:text-[2.5rem] ">
             Check Your H Day Tour & Excursion By Your Destination
            </h1>
            </header>
        <div
         class="child_container">
            @component('components.DestinationCard',
            ['route'=>route('Daytours.show',['Daytour'=>'Cairo']),'url'=>asset('Images/TourPackage.avif'),
            'city'=>'Cairo Day Tours'
            ,'descr'=>'Cairo Day Tours & ExcursionsAllow Cairo Day Tours to immerse you into the pulsating centers of Egypt, and be rewarded with an unending curiosity that arises with each passing moment.'])
            @endcomponent
            @component('components.DestinationCard',
            ['route'=>route('Daytours.show',['Daytour'=>'Luxor']),'url'=>asset('Images/TourPackage.avif'),
            'city'=>'Luxor Day Tours'
            ,'descr'=>'your gateway to enchanting Luxor Day Tours that promise to transport you through the annals of history.H Day Tour is dedicated to curating exceptional Luxor Tours that seamlessly blend cultural richness and awe-inspiring landscapes'])
            @endcomponent
            @component('components.DestinationCard',
            ['route'=>route('Daytours.show',['Daytour'=>'SharmElSheikh']),'url'=>asset('Images/TourPackage.avif'),
            'city'=>'Sharm El Sheikh Day Tours'
            ,'descr'=>'Cairo Day Tours & ExcursionsAllow Cairo Day Tours to immerse you into the pulsating centers of Egypt, and be rewarded with an unending curiosity that arises with each passing moment.'])
            @endcomponent
            @component('components.DestinationCard',
            ['route'=>route('Daytours.show',['Daytour'=>'Aswan']),'url'=>asset('Images/TourPackage.avif'),
            'city'=>'Aswan Day Tours'
            ,'descr'=>'Cairo Day Tours & ExcursionsAllow Cairo Day Tours to immerse you into the pulsating centers of Egypt, and be rewarded with an unending curiosity that arises with each passing moment.'])
            @endcomponent
            @component('components.DestinationCard',
            ['route'=>route('Daytours.show',['Daytour'=>'Hurghada']),'url'=>asset('Images/TourPackage.avif'),
            'city'=>'Hurghada Day Tours'
            ,'descr'=>'Cairo Day Tours & ExcursionsAllow Cairo Day Tours to immerse you into the pulsating centers of Egypt, and be rewarded with an unending curiosity that arises with each passing moment.'])
            @endcomponent
            </div>
        </div>
</section>
@endsection
