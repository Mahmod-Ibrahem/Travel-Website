@extends('layouts')
@section('title')
    Desert Storm Egypt Tours | Explore Ancient Wonders & Hidden Gems
@endsection('title')
@section('description')
    Join us on a journey through Egypt’s rich history. Explore iconic landmarks like the Pyramids, temples, and more with expert guides. Start your adventure today!
@endsection('description')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full object-cover bg-center bg-cover"
            style="background-image: url('{{ asset('Images/Blog.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            @component('components.navbar')
            @endcomponent

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="Category_title">
                        Forget the Must-Sees, Live Egypt's Hidden Gems
                    </h1>
                </div>
            </div>
        </div>
    </div>

        <div class="parent_container py-6 bg-[#f9f9f9]">
            <div class="child_container ">
                @component('components.BlogCard',
                ['About'=>'Cairo-Attractions',
                'title'=>'Cairo Attractions',
                'route'=>'Blog.show',
                'url'=>asset('/Images/Blog/Cairo/Cairo Main.jpg'),'paramter'=>'Cairo-Attractions'])
                @endcomponent
                @component('components.BlogCard',
                ['About'=>'Luxor-Attractions',
                 'title'=>'Luxor-Attractions',
                'route'=>'Blog.show',
                'url'=>asset('Images/Blog/Luxor/Luxor Main.jpg'),'paramter'=>'Luxor-Attractions'])
                @endcomponent

                    @component('components.BlogCard',
    ['About'=>'Hidden-Gems',
     'title'=>'Hidden Gems In Egypt',
    'route'=>'Blog.show',
    'url'=>asset('Images/Blog/Hidden Gems/Main.jpg'),
    'paramter'=>'Hidden-Gems'])
                    @endcomponent
            </div>
        </div>
@endsection
