@extends('layout.layouts')
@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="p-6  md:mx-auto">
            <div class="w-12 h-12 rounded-full text-red-600 p-2 flex items-center justify-center mx-auto mb-3.5">
                <svg class="h-8 w-8" viewBox="0 0 48 48" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title></title>
                        <circle class="cls-1" cx="24" cy="24" r="23"></circle>
                        <line class="cls-1" x1="12" x2="36" y1="12" y2="36"></line>
                        <line class="cls-1" x1="12" x2="36" y1="36" y2="12"></line>
                    </g>
                </svg>
                <span class="sr-only">Failed</span>
            </div>

            <div class="text-center px-20">
                <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">We couldn’t complete your payment.
                    No worries—please try again or contact support if the issue continues</h3>
                <p class="text-gray-600 my-2 font-semibold">Thanks</p>
            </div>
        </div>
    </div>
@endsection
<script>
    setTimeout(() => {
        window.location.href = '/'
    }, 5000)
</script>
