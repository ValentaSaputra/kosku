@extends('layouts.app')

@section('content')
    <div id="Background"
        class="absolute top-0 w-full h-[280px] rounded-bl-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]">
    </div>

    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
            <div class="flex flex-col gap-1">
                <p>Good day,</p>
                <h1 class="font-bold text-xl leading-[30px]">Explore Cozy Home</h1>
            </div>
            <a href="#" class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
                <img src="assets/images/icons/notification.svg" class="w-[28px] h-[28px]" alt="icon">
            </a>
        </div>

        <div id="Categories" class="swiper w-full overflow-x-hidden mt-[30px]">
            <div class="swiper-wrapper">

            @foreach($categories as $category)
            <div class="swiper-slide !w-fit pb-[30px]">
                    <a href="categories.html" class="card">
                        <div
                            class="flex flex-col items-center w-[120px] shrink-0 rounded-[40px] p-4 pb-5 gap-3 bg-white shadow-[0px_12px_30px_0px_#0000000D] text-center">
                            <div class="w-[70px] h-[70px] rounded-full flex shrink-0 overflow-hidden">
                                <img src="{{ asset('storage/' . $category->image) }}" class="w-full h-full object-cover"
                                    alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <h3 class="font-semibold">{{ $category->name }}</h3>
                                <p class="text-sm text-ngekos-grey">1,304 Kos</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>

        
@endsection
