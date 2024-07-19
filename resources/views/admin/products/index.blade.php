@extends('layouts.app')
@section('title', 'Mihardja Farma | Products')
@section('content')
    @include('layouts.newNavigation')


    <div class="relative overflow-x-auto py-10 max-w-screen-xl mx-auto">
        <div class="flex justify-end py-2">
            <a href="{{ route('admin.products.create') }}" class="py-3 px-5 rounded-full text-white bg-indigo-700">Add New
                Product</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="text-center font-extrabold">
                            {{ $loop->iteration }}
                        </td>
                        <td class="flex items-center lg:w-1/2 md:mx-auto overflow-auto">
                            <div class="flex items-center gap-x-3">
                                <img src="{{ Storage::url($product->photo) }}" alt="{{ $product->slug }}"
                                    class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-xl font-bold text-indigo-950">
                                        {{ $product->name }}
                                    </h3>
                                    <p class="text-base text-slate-500">RP. {{ $product->price }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-base text-center text-slate-500">{{ $product->code_product }}</p>

                        </td>
                        <td class="px-6 py-4">
                            <p class="text-base text-center text-slate-500">{{ $product->stock }}</p>

                        </td>
                        <td class="px-6 py-4">
                            <p class="text-base text-center text-slate-500">{{ $product->category->name }}</p>

                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-x-3">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="py-3 px-5 rounded-full text-white bg-indigo-700">Edit</a>
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="py-3 px-5 rounded-full text-white bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-xl text-center">No Products Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


@endsection
