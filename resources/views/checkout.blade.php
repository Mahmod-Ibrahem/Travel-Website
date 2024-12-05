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
                                <div class="flex flex-col md:flex-row md:justify-between md:gap-12">
                                    <div class="flex flex-col gap-2">
                                    <p class="booking_p">Name: {{ $userData['name'] }}</p>
                                    <p class="booking_p">E-Mail: {{ $userData['email'] }}</p>
                                    <p class="booking_p">Phone: {{ $userData['phone'] }}</p>
                                    <p class="booking_p">Country: {{ $userData['nationality'] }}</p>
                                        <p class="booking_p">Tour Name: {{ $tour->title}}</p>
                                        <p class="booking_p">Date: {{ $userData['Date'] }}</p>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <p class="booking_p">Adult: {{ $userData['Adult'] * $userData['price']  }} USD</p>
                                        <p class="booking_p">Children Under Twelve:  {{ $userData['Children_under_12'] * $userData['price'] *0.5 }} USD</p>
                                        <p class="booking_p">Students Price:  {{ $userData['students'] * $userData['price'] *0.5}} USD</p>
                                        <p class="booking_p">Children Under Six:  Zero</p>
                                        <p class="booking_p border-0">Total price: {{ $userData['totalPrice'] }} USD</p>
                                        </div>
                                </div>
                                <button type="submit" class="font-medium text-Primary text-[16px] tracking-widest rounded-full transition-all duration-500
                                      bg-[#f9f9f9]  border-2 border-[#ff6700] shadow-md hover:bg-orange-600 hover:text-white px-14 py-2 my-6">Confirm</button>
                                </div>
                        </form>



@endsection('content')
<script>
</script>

