<div class="bg-white p-3 rounded-lg border-black/65">
    <div class="main_container overflow-hidden">
    @if(isset($tour)&&$tour->url()) <!-- To make sure that variable defined first and has image-->
    <div class="div flex flex-col md:flex-row justify-between items-center">
    <div class="py-3 md:py-0 mx-auto md:w-[49%]  md:order-1">
        <img src="{{asset($tour->url())}}">
    </div>
    @endif
    <div class="flex flex-col p-5 space-y-5">
        <!-- Offer Type-->
        <div class="relative bg-white">

            <select id="OfferType" name="OfferType" class="peer input_style
            " placeholder="Offer_type" >
            <option value='normal' selected>Normal Offer</option>
            <option value="hot">Hot Offer</option>
            </select>
            <label for="OfferType" class="input_label_style">
                Offer Type</label>
        </div>
        <!-- Popular Type-->
        <div class="relative bg-white">

            <select id="Popular" name="Popular" class="peer input_style
            " placeholder="Popular" >
            <option value='True' selected>Popular</option>
            <option value="flase">Normal</option>
            </select>
            <label for="Popular" class="input_label_style">
                Popularity</label>
        </div>
                <!-- Tour Type-->
                <div class="relative bg-white">

                    <select id="Tourtype" name="Tourtype" class="peer input_style
                    " placeholder="Tourtype" >
                    <option value='daytour' selected>Daytour</option>
                    <option value="packagetour">Tour Package</option>
                    </select>
                    <label for="Tourtype" class="input_label_style">
                        Tourtype </label>
                </div>
                <!--city input-->
    <div class="relative bg-white">

        <input type="text" id="city" name="city" class="peer input_style
        " placeholder="city" value="{{old('city',$Dtour->city ?? null)}}" />

        <label for="city" class="input_label_style">
            city</label>
    </div>

    <!-- Duration -->
    <div class="relative bg-white">

        <input type="text" id="Duration" name="Duration" class="peer input_style
        " placeholder="Duration" value="{{old('Duration',$Dtour->city ?? null)}}" />

        <label for="Duration" class="input_label_style">
            Duration</label>
    </div>
        <!-- Duration -->
        <div class="relative bg-white">

            <input type="text" id="MaxPeople" name="MaxPeople" class="peer input_style
            " placeholder="MaxPeople" value="{{old('MaxPeople',$Dtour->city ?? null)}}" />

            <label for="MaxPeople" class="input_label_style">
                MaxPeople</label>
        </div>
    <!--title input-->
    <div class="relative bg-white">

        <input type="text" id="title" name="title" class="peer input_style
        " placeholder="title" value="{{old('title',$Dtour->title ?? null)}}"/>

        <label for="fullname" class="input_label_style">
            title</label>
    </div>
            <!--PLaces To See input-->
            <div class="relative bg-white">

                <input type="text" id="places" name="places" class="peer input_style
                " placeholder="places" value="{{old('places',$Dtour->places ?? null)}}"/>

                <label for="places" class="input_label_style">
                    places</label>
            </div>
    <!--Price Input-->
    <div class="relative bg-white">

        <input type="text" id="price" name="price" class="peer input_style
        " placeholder="price" value="{{old('price',$Dtour->price ?? null)}}"/>

        <label for="price" class="input_label_style">
             price</label>
    </div>
        <!--Itenary Title Input-->
        <div class="relative bg-white">

 <textarea type="text" id="itenary_title" name="itenary_title" class="peer input_style" placeholder="itenary_title">{{ old('itenary_title', $Dtour->itenary_title ?? null) }}</textarea>

            <label for="itenary_title" class="input_label_style">
                 Itenary title</label>
        </div>
                <!--Itenary Section Input-->
                <div class="relative bg-white">

                    <textarea type="text" id="itenary_section" name="itenary_section" class="peer input_style
                    " placeholder="itenary_title">{{old('itenary_section',$Dtour->itenary_section ?? null)}}</textarea>

                    <label for="itenary_section" class="input_label_style">
                         Itenary section</label>
                </div>
                <!-- included Input-->
                <div class="relative bg-white">

                    <input type="text" id="included" name="included" class="peer input_style
                    " placeholder="itenary_title" value="{{old('included',$Dtour->included ?? null)}}"/>

                    <label for="included" class="input_label_style">
                        included</label>
                </div>
                                <!-- Excluded Input-->
                                <div class="relative bg-white">

                                    <input type="text" id="excluded" name="excluded" class="peer input_style
                                    " placeholder="excluded" value="{{old('excluded',$Dtour->excluded ?? null)}}"/>

                                    <label for="excluded" class="input_label_style">
                                        Excluded</label>
                                </div>
            <!--Image Input-->
            <div class="relative bg-white">

                <input type="file" id="path" name="path" class="peer
                " placeholder="path"/>

                <label for="path" class="input_label_style" >
                    Image</label>
            </div>
    <!--Submit button-->
    <div class="mb-12 pb-1 pt-1 text-center">
      <button
        class="mb-3 w-full border-2 md:text-2xl border-gray-500 hover:bg-black/65 hover:text-white
        transition-all hover:border-gray-200 text-black/70"
        type="submit"
        data-te-ripple-init
        data-te-ripple-color="light"
        >
        Confirm
      </button>
    </div>
    </div>
    </div>
</div>
</div>
