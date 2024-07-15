@extends('layouts.app')
@section('title', 'Mihardja Farma | Transactions')
@section('content')
@include('layouts.newNavigation')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white flex flex-col gap-y-5 overflow-hidden shadow-sm p-5  sm:rounded-lg">
           @forelse ($product_transactions as $transaction )
           <div class="item-card flex flex-row items-center justify-between">
            <div class="flex flex-row items-center gap-x-3">
                <div>
                    <h3 class="text-xl font-bold text-indigo-950">
                        Total Transaksi
                    </h3>
                    <p class="text-base text-slate-500">RP. {{ $transaction->total_amount }}</p>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-bold text-indigo-950">
                    Date
                </h3>
                <p class="text-base text-slate-500">{{ $transaction->created_at }}</p>
            </div>
            @if ($transaction->is_paid)

            <span class="rounded-full py-1 px-5 bg-green-600">
                <p class="text-base text-white">SUCCESS</p>
            </span>
            @else

            <span class="rounded-full py-1 px-5 bg-orange-500">
                <p class="text-base text-white">PENDING</p>
            </span>
            @endif
            <div class="flex items-center gap-x-3">
                <a href="{{ route('product_transactions.show', $transaction) }}" class="py-3 px-5 rounded-full text-white bg-indigo-700">View Detail</a>
            </div>
        </div>
        <hr class="my-3">
           @empty
               <p class="text-xl text-center font-bold">No Transaction Found</p>
           @endforelse
        </div>
    </div>
</div>
@endsection


