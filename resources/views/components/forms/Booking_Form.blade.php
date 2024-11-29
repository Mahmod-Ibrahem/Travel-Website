<div class="bg-white  rounded-xl pt-6 px-6 h-fit md:w-96 border-[3px]">
    <h1
     class="text-xl md:text-3xl font-medium text-[#ff6700] pb-3 mb-6  text-center border-b-2 border-Primary/20">
     Booking Form</h1>

    <form method="POST" action="{{route('booking.checkout',['tour'=>$tour])}}">
       @csrf
        <div class="flex flex-col items-center gap-7">

            <div class="relative bg-white">

                <input id='name' name="name" value="{{ old('name') }}" required
                class="peer input_style" placeholder="FullName" autocomplete="off">
                <label for="name" class="input_label_style">
                     FullName</label>
            </div>

            <div class="relative bg-white">

                <input id='email' name="email" value="{{ old('email') }}" required
                class="peer input_style" placeholder="email" autocomplete="off">

                <label for="email" class="input_label_style">
                     E-mail</label>

            </div>

            <div class="relative bg-white">

                <input id='phone' name="phone" value="{{ old('phone') }}" required
                class="peer input_style" placeholder="phone" autocomplete="off">

                <label for="email" class="input_label_style">
                     Phone</label>
            </div>

            <div class="relative bg-white">

                <input id='nationality' name="nationality" value="{{ old('nationality') }}" required
                class="peer input_style" placeholder="Country" autocomplete="off">

                <label for="nationality" class="input_label_style">
                    Nationality</label>
            </div>

            <div class="relative bg-white">

                <input id='Adult' type="number" name="Adult" value="{{ old('Adult') }}" required
                class="peer input_style" placeholder="Adult" autocomplete="off">

                <label for="Adult" class="input_label_style">
                     Adult</label>
            </div>

            <div class="relative bg-white">

                <input id='Children' type="number" name="Children" value="{{ old('Children') }}" required
                class="peer input_style" placeholder="Children" autocomplete="off">

                <label for="Children" class="input_label_style">
                     Childeren</label>
                     @if ($errors->has('Address'))
                     <p class="text-sm text-red-500">{{ $errors->first('Address') }}</p>
                 @endif
            </div>

            <div class="relative bg-white">

                <input id='Date' type="date" name="Date" value="{{ old('Date') }}" required
                class="peer input_style" placeholder="Date" autocomplete="off">

                <label for="Date" class="input_label_style">
                     Date</label>

            </div>
      <button type="submit"
            class="font-medium text-Primary text-[16px] tracking-widest rounded-full transition-all duration-500
                          bg-[#f9f9f9]  border-2 border-[#ff6700] shadow-md hover:bg-orange-600 hover:text-white px-14 py-2">
          Confirm
        </button>
       </div>
    </form>
</div>
