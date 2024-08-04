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
                                    <div id="popup-modal-{{ $product->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full bg-slate-700 bg-opacity-50">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal-{{ $product->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Apakah yakin ingin menghapus produk <span
                                                            class="font-bold">{{ $product->name }}</span>?</h3>
                                                    <button data-modal-hide="popup-modal-{{ $product->id }}"
                                                        type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Oke
                                                    </button>
                                                    <button data-modal-hide="popup-modal-{{ $product->id }}"
                                                        type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button data-modal-target="popup-modal-{{ $product->id }}"
                                        data-modal-toggle="popup-modal-{{ $product->id }}" type="button"
                                        class="py-3 px-5 rounded-full text-white bg-red-600">
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
