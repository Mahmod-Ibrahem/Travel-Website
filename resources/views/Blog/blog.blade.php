@extends('layout.layouts')
@section('content')
    <div class="h-[20rem] md:h-screen w-full ">
        <div
            class="md:bg-fixed h-full w-full"
            style="background-image: url('{{ $blog->image ?? asset('Images/Soon.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">

            <div
                class="flex flex-col items-center justify-center md:items-center   h-full bg-[#33333382]
                  ">

                <div class="Category_titleContainer">
                    <h1 id="home_title"
                        class="backgroundImageHeader">
                        {{$blog->title}}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="parent_container max-w-7xl mx-auto">
        <div class="flex flex-col justify-center items-center overflow-hidden w-full prose max-w-none prose-a:no-underline prose-a:!text-[#ff6700] prose-p:my-1
         prose-h2:m-0 prose-img:my-1">
            {!! $blog->blog !!}
        </div>
    </div>
@endsection


