@extends('layouts')
@section('content')
    <div class="h-[20rem] md:h-auto  w-full">
        <div
            class="md:bg-fixed md:h-[75%]  w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ $tour->tour_cover }}');">
            @component('components.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center h-full bg-[#33333382]
                  ">

                <div class=" Category_titleContainer">
                    <h1 id="home_title"
                        class="text-[16px] font-bold md:text-[20px] select-none animate-ToDown  text-white tracking-wide">
                        {{$tour->title}}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" class="bg-[#f2f2f2] py-10 " action="{{ route('booking.confirm',['tour'=>$tour,'userData'=>$userData]) }}">

                @csrf
                <h1 class="text-center  text-[1.4rem] font-bold md:text-4xl mb-6  select-none text-[#ff6700]">Tour Confirmation</h1>
                    <div class="flex flex-col p-5 bg-white border-2 shadow
                   rounded mx-auto w-fit">
                    <div class="flex flex-col">
                        <div class="flex flex-col space-y-2">
                        <p class="booking_p">Name: {{ $userData['name'] }}</p>
                        <p class="booking_p">E-Mail: {{ $userData['email'] }}</p>
                        <p class="booking_p">Phone: {{ $userData['phone'] }}</p>
                        <p class="booking_p">Country: {{ $userData['nationality'] }}</p>
                        <p class="booking_p">Adult: {{ $userData['Adult'] }}</p>
                        </div>
                        <div class="flex flex-col space-y-2 mt-2">
                            <p class="booking_p">Children: {{ $userData['Children'] }}</p>
                            <p class="booking_p">Tour Name: {{ $tour->title}}</p>
                            <p class="booking_p">Date: {{ $userData['Date'] }}</p>
{{--                            <p class="booking_p">Price: {{ $tour->price }} U.S.D/Pax and half price for Childeren</p>--}}
                            <p class="booking_p border-0">Total price: {{ $userData['totalPrice'] }} U.S.D</p>
                            </div>
                    </div>
                    <button type="submit" class="font-medium text-Primary text-[16px] tracking-widest rounded-full transition-all duration-500
                          bg-[#f9f9f9]  border-2 border-[#ff6700] shadow-md hover:bg-orange-600 hover:text-white px-14 py-2 my-6">Confirm</button>
                    </div>
            </form>




    <!--end Of tap-->
@endsection('content')






    <!--end Of tap-->
{{--@endsection('content')--}}

{{--        <form method="POST">--}}
{{--            action="{{ route('Daytours.Booking.store', [--}}
{{--            'Name'=>$Fullname,--}}
{{--            'Phone'=>$Phone,--}}
{{--                'Email'=>$Mail,--}}
{{--                'Country'=>$Country,--}}
{{--                'Daytour' => $TourTitle,--}}
{{--                'Date' => $Date,--}}
{{--                'Adult' => $Adult,--}}
{{--                'Childeren' => $Childeren,--}}
{{--                'Price'=>$Price,--}}
{{--                'TotalPrice'=>$totalprice--}}
{{--            ]) }}">--}}
{{--            @csrf--}}
{{--                <div class="flex flex-col p-5 border-2 shadow-md my-6--}}
{{--                rounded-xl mx-auto w-fit shadow-blue-200 ">--}}
{{--                <div class="flex flex-col">--}}
{{--                    <div class="flex flex-col space-y-2">--}}
{{--                    <p class="booking_p">Name: {{ $userData['name'] }}</p>--}}
{{--                    <p class="booking_p">E-Mail: {{ $userData['email'] }}</p>--}}
{{--                    <p class="booking_p">Phone: {{ $userData['phone'] }}</p>--}}
{{--                    <p class="booking_p">Country: {{ $userData['nationality'] }}</p>--}}
{{--                    <p class="booking_p">Adult: {{ $userData['Adult'] }}</p>--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-col space-y-2 mt-2">--}}
{{--                        <p class="booking_p">Children: {{ $userData['Children'] }}</p>--}}
{{--                        <p class="booking_p">Tour Name: {{ $tour->title}}</p>--}}
{{--                        <p class="booking_p">Date: {{ $userData['Date'] }}</p>--}}
{{--                        <p class="booking_p">Price: {{ $tour->price }} U.S.D/Pax and half price for Childeren</p>--}}
{{--                        <p class="booking_p">Total price: {{ $userData['totalPrice'] }} U.S.D</p>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--                <button type="submit" class="editbtn  mx-auto mt-6">Confirm</button>--}}
{{--                </div>--}}
{{--        </form>--}}

<script>
//

</script>
