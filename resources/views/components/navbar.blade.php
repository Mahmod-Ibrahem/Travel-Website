<div id='navbar' class="absolute top-0 z-20 w-full">
<div class="mx-auto flex justify-between items-center p-1 md:py-3 md:mx-6 px-1   ">
    <!-- Start Of NavBar For Both-->
    <!--Language icon-->

        <div class="md:hidden z-20 ">
            <img src="{{asset('/Images/logo.png')}}" class="w-[6rem] h-[5rem]">
        </div>

    <div class="md:order-2 relative  z-20">
        <a href="{{route('TailorMade.index')}}"
           class="font-medium text-[16px] tracking-widest rounded-full transition-all duration-500
                           border-2 border-[#ff6700]  bg-orange-600 text-white px-10 py-2 cursor-pointer hover:border-white">
            Tailor
        </a>
    </div>

    <div class="hidden md:block">
        <img src="{{asset('/Images/logo.png')}}"
             alt="logo"
             width="140" height="72"
             class="w-[7rem] md:w-[8rem] h-18 object-cover">
    </div>

    <!--PC NavBar Or Menu-->
    <div class="hidden md:flex items-center gap-7  font-medium mt-3 text-lg {{ $home ?? true ? 'animate-ToDown' : ''}} ">
        <div class="group hover:-translate-y-2 transition-all duration-200 hover:scale-105 ">
            <a href="{{route('home')}}" class="nav_anch_p "><p >Homepage</p></a>
        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('DayTours.index')}}" class="nav_anch_p"><p >Day Tours</p></a>
        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('TourPackages.index')}}" class="nav_anch_p "><p >Tour Packages</p></a>

        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('SeaShoreTours.index')}}" class="nav_anch_p "><p >Sea Shore Tours </p></a>

        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('SafariAdventures.index')}}" class="nav_anch_p "><p >Safari  adventures</p></a>
        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('Transfer.index')}}" class="nav_anch_p "><p >Transfers Service</p></a>
        </div>
        {{--        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">--}}
{{--            <a href="#" class="nav_anch_p"><p >Gallery</p></a>--}}

{{--        </div>--}}
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('Blog.index')}}" class="nav_anch_p"><p >Blog</p></a>
        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('Contact.index')}}" class="nav_anch_p"><p >Contact</p></a>
        </div>  <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('about')}}" class="nav_anch_p"><p >About</p></a>
        </div>
        {{-- <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="#" class="text-white text- hover:text-black/90 duration-300 tracking-widest">Contact Us</a>
        </div> --}}
    </div>
    <!--End of PC NavBar Or Menu-->
      <!-- Mobile Menu -->
    <!--hamburger button-->
    <div class="md:hidden z-20">
      <button id="menu-btn" type="button" class="hamburger md:hidden focus:outline-none">
          <span class="hamburger-top"></span>
          <span class="hamburger-middle"></span>
          <span class="hamburger-bottom"></span>
      </button>
  </div>
</div>
<div id="menu" class="hidden z-10  top-0 right-0  text-white w-screen h-screen bg-[#323232] animate-MenuToRight">
<!-- Text overlay -->
<ul id="menu_list"
    class="flex flex-col justify-start items-start font-medium tracking-wide text-base
      gap-10  mt-36 ml-4">
    <li><a href="{{route('home')}}" class=" py-1 hover:text-orange-500  border-b-2 border-[#ff6000] pb-3  ">Homepage</a></li>

    <li><a href="{{route('DayTours.index')}}" class="py-1 hover:text-orange-500 border-b-2 border-[#ff6000] pb-30 ">Day Tours</a></li>
    <li><a href="{{route('TourPackages.index')}}" class="py-1 hover:text-orange-500 border-b-2 border-[#ff6000] pb-3 ">Tour Packages</a></li>
    <li><a href="{{route('SeaShoreTours.index')}}" class="py-1 hover:text-orange-500 border-b-2 border-[#ff6000] pb-3 ">Sea Shore Tours</a></li>
    <li><a href="{{route('SafariAdventures.index')}}" class="py-1 hover:text-orange-500 border-b-2 border-[#ff6000] pb-3 ">Safari Adventures</a></li>
    <li><a href="{{route('Transfer.index')}}" class="py-1 hover:text-orange-500 border-b-2 border-[#ff6000] pb-3 ">Transfers Service</a></li>
    <li><a href="{{route('Blog.index')}}" class="py-1 hover:text-orange-500 border-b-2 border-[#ff6000] pb-3">Blog</a></li>
    <li><a href="{{route('Contact.index')}}" class="py-1 hover:text-orange-500 border-b-2 border-[#ff6000] pb-3">Contact Us</a></li>
    <li><a href="{{route('about')}}" class="py-1 hover:text-orange-500 border-b-2 border-[#ff6000] pb-3">About Us</a></li>
    {{-- <li><a href="#" class="py-1 hover:text-black/90">Transfer Services</a></li> --}}
</ul>
</div>
</div>
