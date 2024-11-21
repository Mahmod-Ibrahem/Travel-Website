<div id='navbar' class="{{ $home ?? true ? 'bg-black/10' : 'bg-orange-800'}} absolute top-0 z-20 w-full">
<div class="mx-auto flex justify-between py-6 items-center md:ml-16 px-5  ">
    <!-- Start Of NavBar For Both-->
    <!--Language icon-->
    <div class="md:order-2 flex space-x-4  relative pt-2 {{ $home ?? true ? 'animate-ToDown' : ''}} z-20">

            <a href="#" class="">
                <i class="fa fa-facebook" style="color: white; font-size:1.2rem" onmouseover="this.style.color='orange'" onmouseout="this.style.color='white'" aria-hidden="true"></i>
            </a>
            <a href="#">
              <i class="fa fa-whatsapp" style="font-size: 1.25rem; color:white;" onmouseover="this.style.color='orange'" onmouseout="this.style.color='white'"></i>
               </a>
            <a href="https://www.instagram.com/hamadibrahim66?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                <i class="fa fa-instagram" style="color: white; font-size:1.25rem" aria-hidden="true" onmouseover="this.style.color='orange'" onmouseout="this.style.color='white'"></i>
            </a>
        </div>
        <div class="md:hidden z-20">
            <H1 class="text-orange-400 font-Logo text-2xl border-b border-double select-none animate-ToDown">Logo</H1>
        </div>
    <!--PC NavBar Or Menu-->
    <div class="hidden md:flex md:space-x-9 font-medium mt-3 text-lg {{ $home ?? true ? 'animate-ToDown' : ''}} ">
        <div>
            <H1 class="text-orange-400 font-Logo text-2xl border-b border-double select-none">Logo</H1>
        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 hover:scale-105 ">
            <a href="{{route('home')}}" class="nav_anch_p "><p >Homepage</p></a>
        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('Daytours.index')}}" class="nav_anch_p"><p >Day Tours</p></a>
        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('TourPackages.index')}}" class="nav_anch_p "><p >Tour Packages</p></a>

        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('SeaShore.index')}}" class="nav_anch_p "><p >Sea Shore Tours </p></a>

        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="{{route('SafariAdventures.index')}}" class="nav_anch_p "><p >Safari  adventures</p></a>
        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="#" class="nav_anch_p "><p >Transfers Service</p></a>
        </div>
        {{--        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">--}}
{{--            <a href="#" class="nav_anch_p"><p >Gallery</p></a>--}}

{{--        </div>--}}
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="#" class="nav_anch_p"><p >Blog</p></a>
        </div>
        <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="#" class="nav_anch_p"><p >Contact</p></a>
        </div>  <div class="group hover:-translate-y-2 transition-all duration-200 h-6 hover:scale-105">
            <a href="#" class="nav_anch_p"><p >About</p></a>
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
<div id="menu" class="hidden z-10  top-0 right-0  text-white w-screen h-screen bg-black/90 animate-MenuToRight">
<!-- Text overlay -->
<ul id="menu_list"
    class="flex flex-col justify-start items-start font-semibold tracking-widest
      space-y-12 text-2xl mt-36 ml-4">
    <li><a href="{{route('home')}}" class=" py-1 hover:text-orange-500 border-b-2 pb-3 border-orange-400 ">Homepage</a></li>
    <li><a href="{{route('Daytours.index')}}" class="py-1 hover:text-orange-500 border-b-2 pb-3 border-orange-400 ">Day Tours</a></li>
    <li><a href="{{route('TourPackages.index')}}" class="py-1 hover:text-orange-500 border-b-2 pb-3 border-orange-400 ">Tour Packages</a></li>
    <li><a href="{{route('SeaShore.index')}}" class="py-1 hover:text-orange-500 border-b-2 pb-3 border-orange-400 ">Sea Shore Tours</a></li>
    <li><a href="{{route('SafariAdventures.index')}}" class="py-1 hover:text-orange-500 border-b-2 pb-3 border-orange-400 ">Safari Adventures</a></li>
    <li><a href="#" class="py-1 hover:text-orange-500 border-b-2 pb-3 border-orange-400 ">Transfers Service</a></li>
    <li><a href="#" class="py-1 hover:text-orange-500 border-b-2 pb-3 border-orange-400">Blog</a></li>
    <li><a href="#" class="py-1 hover:text-orange-500 border-b-2 pb-3 border-orange-400">Contact Us</a></li>
    <li><a href="#" class="py-1 hover:text-orange-500 border-b-2 pb-3 border-orange-400">About Us</a></li>
    {{-- <li><a href="#" class="py-1 hover:text-black/90">Transfer Services</a></li> --}}
</ul>
</div>
</div>
