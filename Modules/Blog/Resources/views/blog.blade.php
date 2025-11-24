@extends('layout.layouts')
@section('title')
    Mr Egypt Tours | Explore {{ $blog->title }} In Egypt
@endsection
@section('description')
    Discover the best attractions, dining, and experiences in {{ $blog->title }}. Plan your perfect trip with top things to
    do and must-visit spots!
@endsection
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div class="md:bg-fixed h-full w-full"
            style="background-image: url('{{ $blog->image ?? asset('Images/Soon.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title" class="backgroundImageHeader">
                        {{ $blog->title }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="parent_container max-w-7xl mx-auto">
        <div
            class="flex flex-col justify-center items-center text-start overflow-hidden w-full prose max-w-none prose-a:no-underline prose-a:!text-main prose-p:my-1
         prose-h2:m-0 prose-img:my-1 px-2 prose-p:w-full prose-img:mx-auto md:prose-img:w-1/2 md:prose-img:h-1/2">
            {!! $blog->blog !!}
        </div>
    </div>
@endsection
