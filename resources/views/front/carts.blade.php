@extends('layouts.app')
@section('title', 'Mihardja Farma')
@section('content')
  <!-- Topbar -->
  <section class="relative flex items-center justify-between w-full gap-5 wrapper">
    <a href="/" class="p-2 bg-white rounded-full">
      <img src="{{ asset('svgs/ic-arrow-left.svg') }}" class="size-5" alt="">
    </a>
    <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
      Shopping Carts
    </p>
  </section>

  <!-- Items -->
  <section class="wrapper flex flex-col gap-2.5">
    <div class="flex items-center justify-between">
      <p class="text-base font-bold">
        Items
      </p>

    </div>
    <div class="flex flex-col gap-4">

     @forelse ($myCarts as $cart)
     <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-2 items-center relative">
      <img src="{{ Storage::url($cart->product->photo) }}" class="w-full max-w-[70px] max-h-[70px] object-contain"
        alt="">
      <div class="flex flex-wrap items-center justify-between w-full gap-1">
        <div class="flex flex-col gap-1">
          <p
            class="text-base font-semibold whitespace-nowrap w-[150px] truncate">
            {{ $cart->product->name }}
          </p>
          <p class="text-sm text-grey product-price" data-price="{{ $cart->product->price }}">
          </p>
        </div>
        <form action="{{ route('carts.destroy', $cart) }}" method="POST">
            @csrf
            @method('DELETE')
          <button type="submit">
              <img src="{{ asset('svgs/ic-trash-can-filled.svg') }}" class="size-[30px]" alt="">
          </button>
      </form>
      </div>
    </div>
     @empty
      <h1 class="text-xl font-bold text-center">No Carts Found</h1>
     @endforelse

    </div>
  </section>

  <!-- Details Payment -->
  <section class="wrapper flex flex-col gap-2.5">
    <div class="flex items-center justify-between">
      <p class="text-base font-bold">
        Details Payment
      </p>

    </div>
    <div class="p-6 bg-white rounded-3xl" >
      <ul class="flex flex-col gap-5">
        <li class="flex items-center justify-between">
          <p class="text-base font-semibold first:font-normal">
            Sub Total
          </p>
          <p class="text-base font-semibold first:font-normal" id="checkout-sub-total">
          </p>
        </li>


        <li class="flex items-center justify-between">
          <p class="text-base font-semibold first:font-normal">
            Delivery Fee
          </p>
          <p class="text-base font-semibold first:font-normal" id="checkout-delivery-fee">
          </p>
        </li>
        <li class="flex items-center justify-between">
          <p class="text-base font-bold first:font-normal">
            Grand Total
          </p>
          <p class="text-base font-bold first:font-normal text-primary" id="checkout-grand-total">
          </p>
        </li>
      </ul>
    </div>
  </section>

  <!-- Payment Method -->
  <section class="wrapper flex flex-col gap-2.5">
    <div class="flex items-center justify-between">
      <p class="text-base font-bold">
        Send Payment to
      </p>
    </div>
    {{-- <div class="grid items-center grid-cols-2 gap-4">
      <label
        class="relative rounded-2xl bg-white flex gap-2.5 px-3.5 py-3 items-center justify-start has-[:checked]:ring-2 has-[:checked]:ring-primary transition-all">
        <input type="radio" name="payment_method" id="manualMethod" class="absolute opacity-0">
        <img src="{{ asset('svgs/ic-receipt-text-filled.svg') }}" alt="">
        <p class="text-base font-semibold">
          Manual
        </p>
      </label>
      <label
        class="relative rounded-2xl bg-white flex gap-2.5 px-3.5 py-3 items-center justify-start has-[:checked]:ring-2 has-[:checked]:ring-primary transition-all">
        <input type="radio" name="payment_method" id="creditMethod" class="absolute opacity-0">
        <img src="{{ asset('svgs/ic-card-filled.svg') }}" alt="">
        <p class="text-base font-semibold">
          Credits
        </p>
        </label>
    </div> --}}
    <div class="p-4 mt-0.5 bg-white rounded-3xl">
      <div class="flex flex-col gap-5">
        <div class="inline-flex items-center gap-2.5">
          <img src="{{ asset('svgs/ic-bank.svg') }}" class="size-5" alt="">
          <p class="text-base font-semibold">
            2389203890
          </p>
        </div>
        <div class="inline-flex items-center gap-2.5">
          <img src="{{ asset('svgs/ic-security-card.svg') }}" class="size-5" alt="">
          <p class="text-base font-semibold">
            083902093092
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Delivery to -->
  <section class="wrapper flex flex-col gap-2.5 pb-40">
    <div class="flex items-center justify-between">
      <p class="text-base font-bold">
        Delivery to
      </p>

    </div>
    <form action="{{ route('product_transactions.store') }}" method="POST" class="p-6 bg-white rounded-3xl" enctype="multipart/form-data">
      @csrf
      <div class="flex flex-col gap-5">
        <!-- Address -->
        <div class="flex flex-col gap-2.5">
          <div class="flex gap-1 items-center">
            <label for="address" class="text-base font-semibold">Address</label>
          <img src="{{ asset('svgs/ic-location.svg') }}" class="size-5" alt="">
          </div>
          <input type="text" name="address" id="address__"
            class="form-input" value="Tedjamudita 3">
        </div>
        <!-- City -->
        <div class="flex flex-col gap-2.5">
          <div class="flex items-center gap-1">
            <label for="city" class="text-base font-semibold">City</label>
            <img src="{{ asset('svgs/ic-map.svg') }}" class="size-5" alt="">
          </div>
          <input type="text" name="city" id="city__"
            value="Bolavia">
        </div>
        <!-- Post Code -->
        <div class="flex flex-col gap-2.5">
            <div class="flex items-center gap-1">
                <label for="post_code" class="text-base font-semibold">Post Code</label>
                <img src="{{ asset('svgs/ic-house.svg') }}" class="size-5" alt="">
              </div>
          <input type="number" name="post_code" id="postcode__"
            class="form-input" value="22081882">
        </div>
        <!-- Phone Number -->
        <div class="flex flex-col gap-2.5">
            <div class="flex items-center gap-1">
                <label for="phone_number" class="text-base font-semibold">Phone Number</label>
                <img src="{{ asset('svgs/ic-phone.svg') }}" class="size-5" alt="">
              </div>
          <input type="number" name="phone_number" id="phonenumber__"
            class="form-input" value="602192301923">
        </div>
        <!-- Add. Notes -->
        <div class="flex flex-col gap-2.5">
            <div class="flex items-center gap-1">

                <label for="notes" class="text-base font-semibold">Add. Notes</label>
                <img src="{{ asset('svgs/ic-edit.svg') }}" class="size-5 " alt="">
            </div>
            <textarea name="notes" id="notes__"
              class="form-input !rounded-2xl w-full min-h-[150px]">nearby with local shops that close with the big river next to aftermarket place.</textarea>
        </div>
        <!-- Proof of Payment -->
        <div class="flex flex-col gap-2.5">
            <div class="flex items-center gap-1">
                <label for="proof" class="text-base font-semibold">Proof of Payment</label>
                <img src="{{ asset('svgs/ic-folder-add.svg') }}" class="size-5 " alt="">
            </div>
          <input type="file" name="proof" id="proof_of_payment__"
            class="">
        </div>
      </div>
      </div>
  </section>

  <!-- Floating grand total -->
  <div class="fixed z-50 bottom-[30px] bg-black rounded-3xl p-5 left-1/2 -translate-x-1/2 w-[calc(100dvw-32px)] max-w-[425px]">
    <section class="flex items-center justify-between gap-5">
      <div>
        <p class="text-sm text-grey mb-0.5">
          Grand Total
        </p>
        <p class="text-lg min-[350px]:text-2xl font-bold text-white" id="checkout-grand-total-price">
        </p>
      </div>
      <button type="submit" class="inline-flex items-center justify-center px-5 py-3 text-base font-bold text-white rounded-full w-max bg-primary whitespace-nowrap">
        Confirm
      </button>
    </section>
  </form>

  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{ asset('scripts/global.js') }}"></script>
  <script>
      function calculatePrice() {
          let subTotal = 0;
          let deliveryFee = 10000;
          let productPrice = document.querySelectorAll('.product-price')
          productPrice.forEach((item) => {
              const price = parseFloat(item.getAttribute('data-price'));
              subTotal += price;
              item.textContent = 'Rp ' + price.toLocaleString('id', {minimumFractionDigits: 2, maximumFractionDigits: 2});

          });

          document.getElementById('checkout-delivery-fee').textContent = 'Rp ' + deliveryFee.toLocaleString('id', {minimumFractionDigits: 2, maximumFractionDigits: 2});

          document.getElementById('checkout-sub-total').textContent = 'Rp ' + subTotal.toLocaleString('id', {minimumFractionDigits: 2, maximumFractionDigits: 2});


          const grandTotalPrice = subTotal + deliveryFee;
          document.getElementById('checkout-grand-total').textContent = 'Rp ' + grandTotalPrice.toLocaleString('id', {minimumFractionDigits: 2, maximumFractionDigits: 2});

          document.getElementById('checkout-grand-total-price').textContent = 'Rp ' + grandTotalPrice.toLocaleString('id', {minimumFractionDigits: 2, maximumFractionDigits: 2});

      }

      document.addEventListener('DOMContentLoaded', () => calculatePrice());
  </script>

@endsection
