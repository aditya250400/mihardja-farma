@extends('layouts.app')
@section('title', 'Mihardja Farma')
@section('content')
<section class="relative flex items-center justify-between gap-5 wrapper">
    <a href="{{ route('front.index') }}" class="p-2 bg-white rounded-full">
      <img src="{{ asset('svgs/ic-arrow-left.svg') }}" class="size-5" alt="">
    </a>
    <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
      All Categories
    </p>
    <button type="button" class="p-2 bg-white rounded-full">
      <img src="{{ asset('svgs/ic-triple-dots.svg') }}" class="size-5" alt="">
    </button>
  </section>

  <!-- Search Results -->
  <section class="wrapper flex flex-col gap-2.5">
    <p class="text-base font-bold">
      Results
    </p>
    <div class="flex flex-wrap justify-center items-center gap-2">
      <!-- Softovac Rami -->
      @forelse ($categories as $category)
      <div class="w-[90px] overflow-auto flex flex-col gap-2 justify-center items-center">
        <a href="{{ route('front.product.category', $category) }}" class=" rounded-xl w-full flex flex-col justify-center">
        <div class="overflow-auto">
            <div class=" w-fit md:w-full md:flex md:flex-col md:justify-center bg-white md:gap-2 md:items-center mx-auto p-2 rounded-xl">
                <img src="{{ Storage::url($category->icon) }}" class="size-10" alt="">
            </div>
        </div>
        <div class="flex justify-center">
        <p class="block w-fit mx-2 text-center font-bold">{{ $category->name }}</p>

        </div>
    </a>
      </div>

      @empty
          <div class="text-center text-xl font-bold">No Product Found</div>
      @endforelse
    </div>

  </section>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

@endsection
