@extends('layout.layouts')
@section('title')
    Uncover the Secrets of Ancient Egypt and Tutankhamun's Mother with Desert Storm Egypt  Tours
@endsection
@section('description')
    Uncover the secrets of Tutankhamun and his mysterious mother with expertly curated Egypt tours. Explore ancient wonders, iconic pyramids, and hidden tombs with the leading Egypt travel agency. Plan your unforgettable journey today!
@endsection
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ asset('Images/Blog/Hidden Gems/cover.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            @component('layout.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="Category_title">
                        Tutankhamun's Mother (The Younger Lady)
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="parent_container max-w-7xl mx-auto">
        <div class="flex flex-col justify-center items-center     overflow-hidden w-full">
            <p class="destination_p"> The mummy known as “The Younger Lady”, formally identified as the mother of king
                Tutankhamun and full biological sister of the mummy known as KV55 <a
                    href="{{route('TourPackages.Tour',['Category' => 'egypt-nile-cruise','tour' => '4-days-3-nights-nile-cruise-from-cairo-by-flight'])}}"
                    class="text-[#ff6700]">Valley Of the Queens</a> (believed by some
                scholars to be that of Akhenaten but not officially certified), is a daughter of king Amenhotep III and
                his Great Royal Wife, Tiye.
            </p>

            <p class="destination_p">
                Modern analysis of “The Younger Lady” suggests she was between 25 and 35 when she died, and she measures
                at 158cm, making her approximately, 5ft2inches tall. Recent C.T. scans also showcased that “The Younger
                Lady”, like her son Tutankhamun has unerupted wisdom teeth, which is also another indicator of her dying
                as a young adult.

            </p>
            <p class="destination_p">
                The Younger Lady” is most notable for what appears to be a wound upon her jawline, as of yet, it has
                never been officially determined whether this injury was caused in life (a possible fatal blow) or
                during a tomb robbery
            </p>

            <p class="destination_p">
                She also has a large cavity upon her torso. However, the Egyptian Mummy Project seem fairly certain the
                wounds were made prior to death, and therefore her cause of death.
            </p>

            <p class="destination_p">
                The Younger Lady”, was found in tomb KV35 by archaeologist Victor Loret in 1898. She was laid out beside
                the mummy of her mother (Tiye) and the mummy of a young boy, possibly the young Prince Thutmose, a son
                of Amenhotep III and his Great Royal Wife Tiye.
            </p>
            <p class="destination_p">
                For a long while the mummy of Great Royal Wife Tiye simply went by “The Elder Lady”, until officially
                identified by a lock of hair buried within Tutankhamun’s tomb, labelled as the hair of his grandmother.
                This hair was a definite match for the natural hair upon Tiye’s mummy.

                Various scholars and Egyptology lovers have theories of the identity of “The Younger Lady”, identifying
                her as a secondary wife of Akhenaten, Kiya, and some even propose she is Nefertiti herself,
                however…these are simply theories.
            </p>

            <p class="destination_p">
                As of yet “The Younger Lady” has not been formally identified, other than her biological relation to the
                mummies of her mother (Tiye), father (Amenhotep III), brother (KV55) and son (Tutankhamun).

                Howard Carter’s 1922 discovery of the intact tomb of Tutankhamun is often hailed as the greatest of all
                Egyptian discoveries. But the complex, interlocking family relationships between the boy king and his
                ancestors was better understood thanks to the huge amount of information revealed by Loret’s find at
                KV35 and the discovery at Deir el-Bahri.
            </p>

            <p class="destination_p">
                Taken together, the successive discoveries in Egypt in the late 1800s and early 1900s helped flesh out
                the lives and relationships of the powerful royal protagonists of that distant time.

                In 2018, French paleoartist Élisabeth Daynès recreated The Younger Lady’s likeness for an episode
                entitled “Great Women of Ancient Egypt” for the television series Expedition Unknown.
            </p>

            <p class="destination_p">
                Daynès is an acclaimed paleoartist, who has previously won the John J. Lazendorf Paleoart prize, and she
                reconstructed Tutankhamun’s likeness in 2005 for the National Geographic.
            </p>

            <p class="destination_p">
                The work of a paleoartist consists of scientific evidence to produce the likeness of pre-historic
                animals, or historic man.

                It must be noted that the media did go wild in declaring the likeness to be that of Nefertiti.

                This was in part due to the way in which the television show decided to present the likeness, by
                dressing her up in the famous Nefertiti-esque regalia, and also in part due to the theory that The
                Younger Lady is in fact Nefertiti.

                For a long while some esteemed scholars, such as Joanne Fletcher truly believed with good intentions
                that The Younger Lady may have been Nefertiti herself, but as time rolls by, such a theory has never
                been proven and due to modern evidences, the likelihood of The Younger Lady being Nefertiti
                is extremely slim.</p>

        </div>
    </div>
@endsection
