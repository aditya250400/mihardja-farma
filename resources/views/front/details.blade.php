@extends('layouts.app')
@section('title', $product->name. ' | Mihardja Farma')
@section('content')
<section class="relative flex items-center justify-between gap-5 wrapper">
    <a href="/" class="p-2 bg-white rounded-full">
        <img src="{{ asset('svgs/ic-arrow-left.svg') }}" class="size-5" alt="">
    </a>
    <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
        Details
    </p>
    <button type="button" class="p-2 bg-white rounded-full">
        <img src="{{ asset('svgs/ic-triple-dots.svg') }}" class="size-5" alt="">
    </button>
</section>

<img src="{{ Storage::url($product->photo) }}" class="rounded-xl h-[220px] w-auto mx-auto relative z-10" alt="">
<section class="bg-white rounded-t-[60px] pt-[60px] px-6 pb-5 -mt-9 flex flex-col gap-5 max-w-[425px] mx-auto">
    <div>
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-1">
                <p class="font-bold text-[22px]">
                    {{ $product->name }}
                </p>
                <div class="flex items-center gap-1.5">
                    <img src="{{ Storage::url($product->category->icon) }}" class="size-[30px]" alt="">
                    <p class="font-semibold text-balance">
                        {{ $product->category->name }}
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-1">
                <img src="{{ asset('svgs/star.svg') }}" class="size-6" alt="">
                <p class="font-semibold text-balance">
                    4.5/5
                </p>
            </div>
        </div>
        <p class="mt-3.5 text-base leading-7">
            {{ $product->about }}
        </p>
    </div>

    <div id="featureSlider" class="-mx-6">
        <!-- Popular -->
        <div
            class="w-[98px] border border-[#f1f1fa] rounded-2xl p-3.5 flex flex-col gap-2.5 items-center justify-center mr-4">
            <img src="{{ asset('svgs/ic-cup-filled.svg') }}" class="size-10" alt="">
            <p class="text-sm font-semibold">
                Popular
            </p>
        </div>
        <!-- Grade A -->
        <div
            class="w-[98px] border border-[#f1f1fa] rounded-2xl p-3.5 flex flex-col gap-2.5 items-center justify-center mr-4">
            <img src="{{ asset('svgs/ic-thumb-shape-filled.svg') }}" class="size-10" alt="">
            <p class="text-sm font-semibold">
                Grade A
            </p>
        </div>
        <!-- Healthy -->
        <div
            class="w-[98px] border border-[#f1f1fa] rounded-2xl p-3.5 flex flex-col gap-2.5 items-center justify-center mr-4">
            <img src="{{ asset('svgs/ic-clipboard-tick-filled.svg') }}" class="size-10" alt="">
            <p class="text-sm font-semibold">
                Healthy
            </p>
        </div>
        <!-- Official -->
        <div
            class="w-[98px] border border-[#f1f1fa] rounded-2xl p-3.5 flex flex-col gap-2.5 items-center justify-center mr-4">
            <img src="{{ asset('svgs/ic-shiled-tick-filled.svg') }}" class="size-10" alt="">
            <p class="text-sm font-semibold">
                Official
            </p>
        </div>
    </div>

    <!-- Price and Add to cart -->
    <div class="flex items-center justify-between">
        <div class="flex flex-col gap-0.5">
            <p class="text-lg min-[350px]:text-2xl font-bold">
                Rp {{ number_format($product->price,2,',','.') }}
            </p>
            <p class="text-sm text-grey">
                /quantity
            </p>
        </div>
        <form action="{{ route('carts.store', $product->id) }}" method="POST">
            @csrf
            <button type="submit"
                class="inline-flex w-max text-white font-bold text-base bg-primary rounded-full px-[30px] py-3 justify-center items-center whitespace-nowrap">
                Add to Cart
            </button>
        </form>
    </div>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="py-3 w-full rounded-3xl text-white bg-slate-800">
           {{ $error }}
        </div>
    @endforeach
@endif
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<script src="{{ asset('scripts/sliderConfig.js') }}" type="module"></script>

@endsection
