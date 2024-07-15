@extends('layouts.app')
@section('title', 'Mihardja Farma | All Products')
@section('content')
    <!-- Topbar -->
    <section class="relative flex items-center justify-between gap-5 wrapper">
        <a href="{{ route('front.index') }}" class="p-2 bg-white rounded-full">
            <img src="{{ asset('svgs/ic-arrow-left.svg') }}" class="size-5" alt="">
        </a>
        <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
            All Products
        </p>
        <button type="button" class="p-2 bg-white rounded-full">
            <img src="{{ asset('svgs/ic-triple-dots.svg') }}" class="size-5" alt="">
        </button>
    </section>

    <!-- Form Search -->
    <section class="wrapper">
        <form action="{{ route('front.search') }}" method="GET" id="searchForm" class="w-full">
            <input type="text" name="keyword" id="searchProduct"
                class="block w-full py-3.5 pl-4 pr-10 rounded-[50px] font-semibold placeholder:text-grey placeholder:font-normal text-black text-base bg-no-repeat bg-[calc(100%-16px)] bg-[url('{{ asset('svgs/ic-search.svg') }}')] focus:ring-2 focus:ring-primary focus:outline-none focus:border-none transition-all"
                placeholder="Search by product name">
        </form>
    </section>

    <!-- Search Results -->
    <section class="wrapper  flex flex-col gap-2.5">
        <p class="text-base font-bold">
            Results
        </p>
        <div class="flex flex-wrap justify-center gap-2">
            <!-- Softovac Rami -->
            @forelse ($products as $product)
                <div
                    class="rounded-2xl bg-white py-3.5 pl-4 pr-[22px] inline-flex flex-col gap-4 items-start mr-4 relative w-[158px]">
                    <img src="{{ Storage::url($product->photo) }}" class="h-[100px] w-full object-contain" alt="">
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
                <div class="text-center text-xl font-bold">No Product Found</div>
            @endforelse
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

@endsection
