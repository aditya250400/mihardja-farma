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
                    <img src="{{ Storage::url($cart->product->photo) }}"
                        class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                    <div class="flex flex-wrap items-center justify-between w-full gap-1">
                        <div class="flex flex-col gap-1">
                            <p class="text-base font-semibold whitespace-nowrap w-[150px] truncate">
                                {{ $cart->product->name }}
                            </p>
                            <p class="text-sm text-grey product-price" data-price="{{ $cart->product->price }}">
                            </p>
                            {{-- quantity --}}
                            {{-- <div class="flex items-center gap-3 p-2">
            <button type="button" class="text-lg w-[30px] rounded-full bg-red-600 text-white text-center" id="decreaseQuantity">-</button>
            <div id="quantityValue">1</div>
            <button type="button" class="text-lg w-[30px] rounded-full bg-blue-600 text-white text-center" id="increaseQuantity">+</button>
          </div> --}}
                        </div>
                        <form action="{{ route('carts.destroy', $cart) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <div id="popup-modal-{{ $cart->id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full bg-slate-700 bg-opacity-50">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal-{{ $cart->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Apakah yakin ingin menghapus produk <span
                                                    class="font-bold">{{ $cart->product->name }}</span> dari keranjang?</h3>
                                            <button data-modal-hide="popup-modal-{{ $cart->id }}" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Oke
                                            </button>
                                            <button data-modal-hide="popup-modal-{{ $cart->id }}" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" data-modal-target="popup-modal-{{ $cart->id }}"
                                data-modal-toggle="popup-modal-{{ $cart->id }}">
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

    @if ($myCarts->count() > 0)
        <!-- Details Payment -->
        <section class="wrapper flex flex-col gap-2.5">
            <div class="flex items-center justify-between">
                <p class="text-base font-bold">
                    Details Payment
                </p>

            </div>
            <div class="p-6 bg-white rounded-3xl">
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
            <form action="{{ route('product_transactions.store') }}" method="POST" class="p-6 bg-white rounded-3xl"
                enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-5">
                    <!-- Address -->
                    <div class="flex flex-col gap-2.5">
                        <div class="flex gap-1 items-center">
                            <label for="address" class="text-base font-semibold">Address</label>
                            <img src="{{ asset('svgs/ic-location.svg') }}" class="size-5" alt="">
                        </div>
                        <input type="text" name="address" id="address__" class="form-input" value="Tedjamudita 3">
                    </div>
                    <!-- City -->
                    <div class="flex flex-col gap-2.5">
                        <div class="flex items-center gap-1">
                            <label for="city" class="text-base font-semibold">City</label>
                            <img src="{{ asset('svgs/ic-map.svg') }}" class="size-5" alt="">
                        </div>
                        <input type="text" name="city" id="city__" value="Bolavia">
                    </div>
                    <!-- Post Code -->
                    <div class="flex flex-col gap-2.5">
                        <div class="flex items-center gap-1">
                            <label for="post_code" class="text-base font-semibold">Post Code</label>
                            <img src="{{ asset('svgs/ic-house.svg') }}" class="size-5" alt="">
                        </div>
                        <input type="number" name="post_code" id="postcode__" class="form-input" value="22081882">
                    </div>
                    <!-- Phone Number -->
                    <div class="flex flex-col gap-2.5">
                        <div class="flex items-center gap-1">
                            <label for="phone_number" class="text-base font-semibold">Phone Number</label>
                            <img src="{{ asset('svgs/ic-phone.svg') }}" class="size-5" alt="">
                        </div>
                        <input type="number" name="phone_number" id="phonenumber__" class="form-input"
                            value="602192301923">
                    </div>
                    <!-- Add. Notes -->
                    <div class="flex flex-col gap-2.5">
                        <div class="flex items-center gap-1">

                            <label for="notes" class="text-base font-semibold">Add. Notes</label>
                            <img src="{{ asset('svgs/ic-edit.svg') }}" class="size-5 " alt="">
                        </div>
                        <textarea name="notes" id="notes__" class="form-input !rounded-2xl w-full min-h-[150px]">nearby with local shops that close with the big river next to aftermarket place.</textarea>
                    </div>
                    <!-- Proof of Payment -->
                    <div class="flex flex-col gap-2.5">
                        <div class="flex items-center gap-1">
                            <label for="proof" class="text-base font-semibold">Proof of Payment</label>
                            <img src="{{ asset('svgs/ic-folder-add.svg') }}" class="size-5 " alt="">
                        </div>
                        <input type="file" name="proof" id="proof_of_payment__" class="">
                        <x-input-error :messages="$errors->get('proof')" class="mt-2 text-red-500 font-bold" />
                    </div>
                </div>
                </div>
        </section>

        <!-- Floating grand total -->
        <div
            class="fixed z-50 bottom-[30px] bg-black rounded-3xl p-5 left-1/2 -translate-x-1/2 w-[calc(100dvw-32px)] max-w-[425px]">
            <section class="flex items-center justify-between gap-5">
                <div>
                    <p class="text-sm text-grey mb-0.5">
                        Grand Total
                    </p>
                    <p class="text-lg min-[350px]:text-2xl font-bold text-white" id="checkout-grand-total-price">
                    </p>
                </div>
                <button type="submit"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-bold text-white rounded-full w-max bg-primary whitespace-nowrap">
                    Confirm
                </button>
            </section>
            </form>

        </div>
    @endif

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
                item.textContent = 'Rp ' + price.toLocaleString('id', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

            });

            document.getElementById('checkout-delivery-fee').textContent = 'Rp ' + deliveryFee.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            document.getElementById('checkout-sub-total').textContent = 'Rp ' + subTotal.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });


            const grandTotalPrice = subTotal + deliveryFee;
            document.getElementById('checkout-grand-total').textContent = 'Rp ' + grandTotalPrice.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            document.getElementById('checkout-grand-total-price').textContent = 'Rp ' + grandTotalPrice.toLocaleString(
                'id', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

        }

        document.addEventListener('DOMContentLoaded', () => calculatePrice());
    </script>

@endsection
