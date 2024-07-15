@extends('layouts.app')
@section('title', 'Mihardja Farma | Detail Transactions')
@section('content')
    @include('layouts.newNavigation')

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden shadow-sm p-5  sm:rounded-lg">
                <div class="item-card flex flex-col md:flex-row md:items-center md:justify-between gap-3 md:gap-0">
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
                        <p class="text-base text-slate-500">
                            {{ $productTransaction->created_at->isoFormat(' DD MMMM YYYY HH:mm') }}</p>
                    </div>
                    @if ($productTransaction->is_paid)
                        <div>
                            <h3 class="block md:hidden text-xl font-bold text-indigo-950">
                                Status
                            </h3>
                            <p class="rounded-full w-fit mt-2 p-2 bg-green-600 text-base text-white">SUCCESS</p>
                        </div>
                    @else
                        <div>
                            <h3 class="block md:hidden text-xl font-bold text-indigo-950">
                                Status
                            </h3>
                            <p class="rounded-full w-fit mt-2 p-2 bg-orange-500 text-base text-white">PENDING</p>

                        </div>
                    @endif
                </div>
                <hr class="my-3">

                <h3 class="text-xl font-bold text-indigo-950">
                    List of Items
                </h3>

                <div class="flex flex-col gap-2  md:grid md:grid-cols-4 md:gap-x-10">
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
                                        <p class="block md:hidden text-base text-slate-500">
                                            {{ $detail->product->category->name }}

                                        <p class="text-base text-slate-500">Rp {{ $detail->price }}</p>
                                    </div>
                                </div>
                                <p class="hidden md:block text-base text-slate-500"> {{ $detail->product->category->name }}
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
                            <h3 class="text-lg font-bold text-indigo-950 whitespace-pre-wrap">
                                {{ $productTransaction->notes }}
                            </h3>
                        </div>
                    </div>
                    <div class="hidden md:flex md:flex-col md:gap-y-5 md:col-span-2">
                        <h3 class="text-lg font-bold text-indigo-950">
                            Proof of Payment :
                        </h3>
                        <img src="{{ Storage::url($productTransaction->proof) }}" alt="sad"
                            class="w-[300px] h-[300px]">

                    </div>

                </div>
                <div class="flex md:hidden flex-col gap-y-2">
                    <h3 class="text-xl font-bold text-indigo-950">
                        Proof of Payment :
                    </h3>
                    <img src="{{ Storage::url($productTransaction->proof) }}" alt="sad"
                        class="w-[300px] h-[300px]">

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
