@extends('layouts.app')
@section('title', 'Mihardja Farma')
@section('content')

<div class="lg:max-w-screen-md mx-auto flex flex-col gap-10">
    <!-- Topbar -->
    @auth
        <section class=" flex items-center justify-between gap-5 wrapper md:hidden">
            <div class="flex items-center gap-3">
                <div class="bg-white rounded-full p-[5px] flex justify-center items-center">
                    <img src="{{ asset('svgs/avatar.svg') }}" class="size-[50px] rounded-full" alt="">
                </div>
                <div class="">
                    <p class="text-base font-semibold capitalize text-primary">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-sm">
                        {{ Auth::user()->hasRole('owner') ? 'Owner' : 'Customer' }}
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-[10px]">
                <button type="button" class="p-2 bg-white rounded-full">
                    <span class="relative">
                        <!-- notification -->
                        <img src="{{ asset('svgs/ic-notification.svg') }}" class="size-5" alt="">
                        <!-- notification dot -->
                        <span class="block rounded-full size-1.5 bg-primary absolute top-0 right-0 -translate-x-1/2"></span>
                    </span>
                </button>
                <button type="button" class="p-2 bg-white rounded-full">
                    <img src="{{ asset('svgs/ic-shopping-bag.svg') }}" class="size-5" alt="">
                </button>
            </div>
        </section>
    @endauth

    <!-- Header -->
    <section class="flex flex-col gap-2.5 items-center justify-center pt-0 lg:pt-10">
        <p class="text-4xl font-extrabold text-center">
            We Provide Best Medicines
        </p>
        <form action="{{ route('front.search') }}" method="GET" id="searchForm"
            class="w-full flex items-center gap-2 overflow-hidden">
            <input type="text" name="keyword" id="searchProduct"
                class="block w-full py-3.5 pl-4 pr-10 rounded-s-[50px] font-semibold placeholder:text-grey placeholder:font-normal text-black text-base bg-[calc(100%-16px)] focus:outline-none focus:border-none transition-all"
                placeholder="Search by product name">
            <button type="submit" class="bg-white h-full rounded-e-[50px]">Search</button>
        </form>
    </section>

    <!-- Explore -->
    <section class="py-2">
        <div
            class="flex justify-between gap-5 items-center bg-lilac py-3.5 px-4 rounded-2xl relative bg-left bg-no-repeat bg-cover bg-[url({{ asset('svgs/pipeline.svg') }})]">
            <div class="flex flex-col gap-2">
                <p class="text-base font-bold">
                    Explore the  <br>
                    best of our products
                </p>
                <a href="#"
                class="rounded-full bg-white text-primary flex w-max gap-2.5 px-6 py-2 justify-center items-center text-base font-bold">
                Explore
            </a>
            </div>
            <img src="{{ asset('svgs/nekodicine.svg') }}" class="w-[90px] h-[70px]" alt="">
        </div>
    </section>

    <!-- Categories -->
    <section class=" !px-0 flex flex-col gap-2.5 ">
       <div class="flex justify-between items-center gap-2">
        <p class="text-base font-bold">
            Categories
        </p>
        <a href="#" class="text-blue-500 font-bold">See All</a>
       </div>
        <div class="flex px-4 w-full ">
            @forelse ($categories as $category)
                <a href="{{ route('front.product.category', $category) }}" class="w-full flex justify-center">
                <div class="overflow-auto">
                    <div class="bg-white w-fit md:w-full md:flex md:justify-center md:gap-2 md:items-center mx-auto rounded-xl p-2">
                        <img src="{{ Storage::url($category->icon) }}" class="size-10" alt="">
                        <p class="w-fit mx-2 text-center font-bold hidden md:block">{{ $category->name }}</p>
                    </div>
                    <p class="block w-fit mx-2 text-center font-bold md:hidden">{{ $category->name }}</p>
                </div>
            </a>
            @empty
                <h1 class="text-xl font-bold text-center">No Categories Found</h1>
            @endforelse

        </div>
    </section>

    <!-- Latest Products -->
    <section class=" !px-0 flex flex-col gap-2.5">
        <div class="flex justify-between items-center gap-2">
            <p class="text-base font-bold">
                Our New Products
            </p>
            <a href="#" class="text-blue-500 font-bold">See All</a>
           </div>
        <div class="flex gap-2">
            @forelse ($products as $product)
                <div
                    class="rounded-2xl bg-white py-3.5 pl-4 pr-[22px] inline-flex flex-col gap-4 items-start mr-4 relative w-[158px]">
                    <img src="{{ Storage::url($product->photo) }}" class="h-[100px] w-full object-contain"
                        alt="">
                    <div>
                        <a href="{{ route('front.product.details', ['product' => $product->slug]) }}"
                            class="text-base font-semibold w-[120px] truncate stretched-link block">
                            {{ $product->name }}
                        </a>
                        <p class="text-sm truncate text-grey">
                            Rp. {{ $product->price }} /pcs
                        </p>
                    </div>
                </div>
            @empty
                <h1 class="text-xl font-bold text-center">No Products Found</h1>
            @endforelse
        </div>
    </section>

    <!-- Most Purchased -->
    <section class=" flex flex-col gap-2.5 pb-40">
        <p class="text-base font-bold">
            Most Purchased
        </p>
        <div class="flex flex-col gap-4">
            <!-- Softovac Rami -->
            <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                <img src="{{ asset('images/product-2.webp') }}"
                    class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                <div class="flex flex-wrap items-center justify-between w-full gap-1">
                    <div class="flex flex-col gap-1">
                        <a href="details.html"
                            class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                            Softovac Rami
                        </a>
                        <p class="text-sm text-grey">
                            Rp 290.000
                        </p>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                    </div>
                </div>
            </div>
            <!-- Enoki Pro -->
            <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                <img src="{{ asset('images/product-1.webp') }}"
                    class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                <div class="flex flex-wrap items-center justify-between w-full gap-1">
                    <div class="flex flex-col gap-1">
                        <a href="details.html"
                            class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                            Enoki Softovac
                        </a>
                        <p class="text-sm text-grey">
                            Rp 34.500.000
                        </p>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                    </div>
                </div>
            </div>
            <!-- Veetax Bora -->
            <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                <img src="{{ asset('images/product-4.webp') }}"
                    class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                <div class="flex flex-wrap items-center justify-between w-full gap-1">
                    <div class="flex flex-col gap-1">
                        <a href="details.html"
                            class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                            Veetax Bora
                        </a>
                        <p class="text-sm text-grey">
                            Rp 899.000
                        </p>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="{{ asset('scripts/sliderConfig.js') }}" type="module"></script>
</body>

@endsection
