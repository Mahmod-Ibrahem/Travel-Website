@extends('layouts')
@section('title')
    Tailor Made
@endsection
@section('content')

    @section('robots', 'index, follow')
    @section('description')
        Discover the enchanting allure of Egypt with our curated tours. Experience Easter joy in Egypt. We offer hotels,
        vacation packages,
        flights, cruises, and car rentals. Enjoy amazing tours with our specialized team in the tourism field.
    @endsection

    <div> <!-- Single root element -->
        <div class="h-[20rem] md:h-screen w-full ">
            <div
                class="md:bg-fixed h-full w-full"
                style="background-image: url('{{ asset('Images/Transfer/Main.webp') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">

                @component('components.navbar')
                @endcomponent

                <div
                    class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                    <div class="Category_titleContainer">
                        <h1 id="home_title"
                            class="Category_title">
                            Timeless Egypt Rides
                        </h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="parent_container  mb-4 py-6 bg-[#f9f9f9] ">
            <h1
                class="text-[#333333] font-bold text-xl md:text-3xl mb-6 md:mb-8 md:mt-6">
                Private Limousine Vehicles Egypt Transportation Services
            </h1>
            <p>

            </p>
            <form method="POST" action="{{route('Transfer.post')}}">
                @csrf
                <div class="flex flex-col items-center">
                    <div class="flex flex-col mb-5  md:flex-row md:gap-10   ">

                        <div class="flex flex-col  md:justify-between">

                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem]">
                                <input id='name' name="name" value="{{ old('name') }}" required
                                       class="peer input_style bg-white"
                                       placeholder="FullName" autocomplete="off">

                                <label for="name" class="input_label_style">FullName</label>

                            </div>

                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem]">
                                <input id='email' name="email" type="email"
                                       value="{{ old('email') }}" required
                                       class="peer input_style bg-white" placeholder="email" autocomplete="off">

                                <label for="email" class="input_label_style">E-mail</label>
                            </div>

                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[3.5rem]">
                                <input id='phone' name="phone" type="tel"
                                       value="{{ old('phone') }}" required
                                       class="peer input_style bg-white" placeholder="phone" autocomplete="off">

                                <label for="phone" class="input_label_style">Phone</label>
                            </div>
                        </div>

                        <div class="flex flex-col ">
                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem]">
                                <input id='nationality' name="nationality" type="text"
                                       value="{{ old('nationality') }}" required
                                       class="peer input_style bg-white" placeholder="Nationality" autocomplete="off">

                                <label for="nationality" class="input_label_style">Nationality</label>
                            </div>
                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem]">
                                <input id='pickup' name="pickup" type="text"
                                       value="{{ old('pickup') }}" required
                                       class="peer input_style bg-white" placeholder="Pickup" autocomplete="off">
                                <label for="pickup" class="input_label_style">Pick Up </label>
                            </div>
                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[3.5rem]">
                                <input id='dropoff' name="dropoff" type="text"
                                       value="{{ old('dropoff') }}" required class="peer input_style bg-white"
                                       placeholder="Drop Off" autocomplete="off">

                                <label for="children" class="input_label_style">Drop Off</label>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2 md:gap-0 ">
                            <div class="relative  sm:w-[20rem] h-[4rem] md:h-[5.5rem] mt-2 md:mt-0">
                                <input id='Date' name="Date" type="Date"
                                       value="{{ old('Date') }}" required
                                       class="peer input_style bg-white" placeholder="Date" autocomplete="off">

                                <label for="Date" class="input_label_style">Date</label>
                            </div>
                        </div>
                    </div>
                    <textarea id="message" rows="5" name="thought"
                              class="p-2.5 text-sm w-full mx-[3.1rem] md:w-[75%]  md:mt-6
                        rounded-lg shadow  font-medium bg-white"
                              placeholder="Any Notes You Want To Add "></textarea>


                    <div class="flex flex-col md:flex-row items-center justify-center space-x-2 mt-2">
                        <button type="submit"
                                class="mb-3 px-20 md:text-2xl bg-[#ff6700] text-white
                 hover:text-white font-semibold tracking-wide rounded-xl text-center cursor-pointer
                    transition-all p-1">Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- Closing the single root element -->

@endsection
