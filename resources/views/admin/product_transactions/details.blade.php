@extends('layouts.app')
@section('title', 'Mihardja Farma | Detail Transactions')
@section('content')
@include('layouts.newNavigation')

<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white flex flex-col gap-y-5 overflow-hidden shadow-sm p-5  sm:rounded-lg">
            <div class="item-card flex flex-row items-center justify-between">
                <div class="flex flex-row items-center gap-x-3">
                    <div>
                        <h3 class="text-xl font-bold text-indigo-950">
                            Total Transaksi
                        </h3>
                        <p class="text-base text-slate-500">RP. {{ $productTransaction->total_amount }}</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-indigo-950">
                        Date
                    </h3>
                    <p class="text-base text-slate-500">{{ $productTransaction->created_at }}</p>
                </div>
                @if ($productTransaction->is_paid)
                    <span class="rounded-full py-1 px-5 bg-green-600">
                        <p class="text-base text-white">SUCCESS</p>
                    </span>
                @else
                    <span class="rounded-full py-1 px-5 bg-orange-500">
                        <p class="text-base text-white">PENDING</p>
                    </span>
                @endif
            </div>
            <hr class="my-3">

            <h3 class="text-xl font-bold text-indigo-950">
                List of Items
            </h3>

            <div class="grid grid-cols-4 gap-x-10">
                <div class="flex flex-col gap-y-5 col-span-2">
                    @forelse ($productTransaction->transactiondetails as $detail)
                        <div class="item-card flex flex-row items-center justify-between">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="{{ Storage::url($detail->product->photo) }}"
                                    alt="{{ $detail->product->name }}" class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-xl font-bold text-indigo-950">
                                        {{ $detail->product->name }}
                                    </h3>
                                    <p class="text-base text-slate-500">{{ $detail->price }}</p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500"> {{ $detail->product->category->name }}
                            </p>
                        </div>
                    @empty
                        <p class="text-center font-bold text-xl">No Transaction Detail Found</p>
                    @endforelse

                    <h3 class="text-xl font-bold text-indigo-950 mt-2">
                        Details of Delivery
                    </h3>
                    <div class="item-card flex flex-row items-center justify-between">
                        <p class="text-base text-slate-500">Address</p>
                        <h3 class="text-lg font-bold text-indigo-950">
                            {{ $productTransaction->address }}
                        </h3>
                    </div>
                    <div class="item-card flex flex-row items-center justify-between">
                        <p class="text-base text-slate-500">City</p>
                        <h3 class="text-lg font-bold text-indigo-950">
                            {{ $productTransaction->city }}
                        </h3>
                    </div>
                    <div class="item-card flex flex-row items-center justify-between">
                        <p class="text-base text-slate-500">Post Code</p>
                        <h3 class="text-lg font-bold text-indigo-950">
                            {{ $productTransaction->post_code }}
                        </h3>
                    </div>
                    <div class="item-card flex flex-row items-center justify-between">
                        <p class="text-base text-slate-500">Phone Number</p>
                        <h3 class="text-lg font-bold text-indigo-950">
                            {{ $productTransaction->phone_number }}
                        </h3>
                    </div>
                    <div class="item-card flex flex-col items-start">
                        <p class="text-base text-slate-500">Notes</p>
                        <h3 class="text-lg font-bold text-indigo-950">
                            {{ $productTransaction->notes }}
                        </h3>
                    </div>
                </div>
                <div class="flex flex-col gap-y-5 col-span-2">
                    <h3 class="text-lg font-bold text-indigo-950">
                        Proof of Payment :
                    </h3>
                    <img src="{{ Storage::url($productTransaction->proof) }}" alt="sad"
                        class="w-[300px] h-[300px]">

                </div>

            </div>
            <hr class="my-3">

            @role('owner')
                @if (!$productTransaction->is_paid)
                    <form method="POST" action="{{ route('product_transactions.update', $productTransaction) }}">
                        @csrf
                        @method('PUT')
                        <button class="py-3 px-5 rounded-full text-white bg-indigo-600">
                            Approve Order
                        </button>
                    </form>
                @else
                <a class="py-3 px-5 rounded-full w-fit text-white bg-indigo-600">
                    Whatsapp Costumer
                </a>
                @endif
            @endrole

            @role('buyer')
                <a class="py-3 px-5 rounded-full w-fit text-white bg-indigo-600">
                    Contact Admin
                </a>
            @endrole
        </div>
    </div>
</div>
@endsection

