<div
    class="bg-gradient-to-br from-white to-gray-50 rounded-2xl pt-8 px-8 pb-6 h-fit md:w-96 border-[3px] border-main/80 shadow-xl shadow-main/10">
    <h1 class="text-2xl md:text-3xl font-bold text-main pb-4 mb-8 text-center border-b-2 border-main/30 relative">
        <span class="relative z-10 bg-gradient-to-r from-main to-blue-600 bg-clip-text text-transparent">
            Booking Form
        </span>
    </h1>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <form method="POST" action="{{ route('booking.checkout', ['tour' => $tour]) }}">
        @csrf
        <div class="flex flex-col items-center gap-6">
            <input type="hidden" name="tour_id" value="{{ $tour->id }}">

            <div class="relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">

                <input id='name' name="name" value="{{ old('name') }}" required
                    class="peer input_style focus:ring-2 focus:ring-main/20 focus:shadow-lg transition-all duration-300"
                    placeholder="FullName" autocomplete="off">
                <label for="name" class="input_label_style">
                    FullName</label>
                @error('name')
                    <span class="text-red-500 text-sm block mt-1  px-4 pb-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">

                <input id='email' name="email" value="{{ old('email') }}" required
                    class="peer input_style focus:ring-2 focus:ring-main/20 focus:shadow-lg transition-all duration-300"
                    placeholder="email" autocomplete="off">

                <label for="email" class="input_label_style">
                    E-mail</label>
                @error('email')
                    <span class="text-red-500 text-sm block mt-1  px-4 pb-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex gap-2">

                <div class="relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                    <input id='phone' name="phone" value="{{ old('phone') }}" required
                        class="peer input_style focus:ring-2 focus:ring-main/20 focus:shadow-lg transition-all duration-300"
                        placeholder="phone" autocomplete="off">
                    <label for="phone" class="input_label_style">Phone</label>
                    @error('phone')
                        <span class="text-red-500 text-sm block mt-1  px-4 pb-2">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">

                <input id='country' name="country" value="{{ old('country') }}" required
                    class="peer input_style focus:ring-2 focus:ring-main/20 focus:shadow-lg transition-all duration-300"
                    placeholder="Country" autocomplete="off">

                <label for="country" class="input_label_style">
                    Country</label>
                @error('country')
                    <span class="text-red-500 text-sm block mt-1 px-4 pb-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">

                <input id='hotel' name="hotel" value="{{ old('hotel') }}" required
                    class="peer input_style focus:ring-2 focus:ring-main/20 focus:shadow-lg transition-all duration-300"
                    placeholder="Pickup Location" autocomplete="off">

                <label for="hotel" class="input_label_style">
                    Pickup Location</label>
                @error('hotel')
                    <span class="text-red-500 text-sm block mt-1  px-4 pb-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">

                <input id='adult' type="number" name="adult" value="{{ old('adult') }}" required
                    class="peer input_style focus:ring-2 focus:ring-main/20 focus:shadow-lg transition-all duration-300"
                    min="1" placeholder="Adult" autocomplete="off">

                <label for="adult" class="input_label_style">
                    Adult</label>
                @error('adult')
                    <span class="text-red-500 text-sm block mt-1  px-4 pb-2">{{ $message }}</span>
                @enderror
            </div>


            <div class="relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">

                <input id='children' type="number" name="children" value="{{ old('children', 0) }}"
                    class="peer input_style focus:ring-2 focus:ring-main/20 focus:shadow-lg transition-all duration-300"
                    placeholder="Children" autocomplete="off" min="0">

                <label for="children" class="input_label_style">
                    Children</label>
                @error('children')
                    <span class="text-red-500 text-sm block mt-1  px-4 pb-2">{{ $message }}</span>
                @enderror
            </div>


            <div class="relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">

                <input id='students' type="number" name="students" value="{{ old('students', 0) }}"
                    class="peer input_style focus:ring-2 focus:ring-main/20 focus:shadow-lg transition-all duration-300"
                    placeholder="Students" min="0" autocomplete="off">

                <label for="students" class="input_label_style">
                    Students</label>
                @error('students')
                    <span class="text-red-500 text-sm block mt-1  px-4 pb-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">

                <input id='date' type="date" name="date" value="{{ old('date') }}" required
                    min="{{ now()->toDateString() }}"
                    class="peer input_style focus:ring-2 focus:ring-main/20 focus:shadow-lg transition-all duration-300"
                    placeholder="Date" autocomplete="off">

                <label for="date" class="input_label_style">
                    Date</label>
                @error('date')
                    <span class="text-red-500 text-sm block mt-1  px-4 pb-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative bg-white group">
                <select id='payment_method' name="payment_method" required
                    class="peer input_style appearance-none cursor-pointer bg-white pr-12 transition-all duration-300 
                    focus:ring-2 focus:ring-main/20 focus:shadow-lg focus:shadow-main/10 hover:border-main/60">
                    <option value="" disabled selected hidden>Select Payment Method</option>
                    <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>💵 Cash Payment
                    </option>
                    <option value="paypal" {{ old('payment_method') == 'paypal' ? 'selected' : '' }}>💳 PayPal Payment
                    </option>
                </select>

                <label for="payment_method" class="input_label_style">
                    Payment Method
                </label>

                <!-- Custom dropdown arrow with animation -->
                <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none transition-all duration-300">
                    <svg class="w-5 h-5 text-main transition-all duration-300 peer-focus:rotate-180 peer-focus:text-blue-600 group-hover:scale-110"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>

                @error('payment_method')
                    <span class="text-red-500 text-sm block mt-1 ">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                {{-- <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div> --}}
                @error('g-recaptcha-response')
                    <span class="text-red-500 text-sm block mt-2">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="main_button w-full py-4 uppercase shadow-[0px_5px_0px_0px_rgba(0,0,0,0.25)] shadow-blue-800 
                hover:shadow-none hover:translate-y-[5px] transition-all duration-300 bg-gradient-to-r from-main to-blue-600 
                font-bold text-lg hover:from-blue-600 hover:to-main relative overflow-hidden group">
                <span class="relative z-10">Confirm Booking</span>
                <div
                    class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                </div>
            </button>
        </div>
    </form>
</div>
