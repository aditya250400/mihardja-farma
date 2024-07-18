@extends('layouts.app')
@section('title', 'Mihardja Farma | Transactions')
@section('content')
    @include('layouts.newNavigation')
    <div class="relative overflow-x-auto py-10 max-w-screen-xl mx-auto">
        <div class="flex justify-end pb-5">
            <div class="flex items-center gap-2">
                <p>Filter By Date : </p>
                <form action="{{ route('product_transactions.index') }}" method="GET" class="flex gap-2">
                    <select name="date" id="date" class="rounded-xl" required>
                        <option value="">Choose Date</option>
                        @forelse ($dates as $date)
                            <option value="{{ $date->date }}" {{ request('date') == $date->date ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::parse($date->date)->isoFormat('DD MMMM YYYY') }}
                            </option>
                        @empty
                            <option value="No Data">No Data</option>
                        @endforelse
                    </select>
                    <button type="submit" class="p-2 bg-blue-500 rounded-full text-white text-center">Search</button>
                    <a href="{{ route('product_transactions.index') }}" class="p-2 bg-red-500 rounded-full text-white text-center">Reset</a>
                </form>

            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Transaction
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product_transactions as $transaction)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="text-center font-extrabold">
                            {{ $loop->iteration }}
                        </td>
                        <td class="">
                            <p class="text-base text-slate-500 text-center">RP. {{ number_format($transaction->total_amount,2,',','.') }}</p>
                        </td>
                        <td class="overflow-auto">
                            <p class="text-base text-slate-500 text-center">{{ $transaction->created_at->isoFormat('DD MMMM YYYY HH:mm') }}</p>

                        </td>
                        <td class="text-center ">
                            @if ($transaction->is_paid)
                                <p class="rounded-full bg-green-600 text-sm md:text-base text-white">SUCCESS</p>
                            @else
                                <p class="rounded-full  bg-orange-500 text-sm md:text-base text-white">PENDING</p>
                            @endif

                        </td>
                        <td class="flex justify-center">
                            <div class="flex items-center">
                                <a href="{{ route('product_transactions.show', $transaction) }}"
                                    class="py-1 px-2 md:py-2 md:px-4 rounded-full text-white bg-indigo-700 text-center">View Detail</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-xl text-center">No Transaction Found</td>
                    </tr>
                @endforelse
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="font-bold text-xl p-2" colspan="5">Total Transaksi : RP. {{ number_format($totalTransaction,2,',','.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
