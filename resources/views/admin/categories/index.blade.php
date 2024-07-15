@extends('layouts.app')
@section('title', 'Mihardja Farma | Categories')
@section('content')
@include('layouts.newNavigation')


<div class="relative overflow-x-auto py-10 max-w-screen-xl mx-auto">
    <div class="flex justify-end py-2">
        <a href="{{ route('admin.categories.create') }}" class="py-3 px-5 rounded-full text-white bg-indigo-700">Add New
            Category</a>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   #
                </th>
                <th scope="col" class="px-6 py-3">
                    Categories Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="text-center font-extrabold">
                        {{ $loop->iteration }}
                    </td>
                    <td class="flex items-center lg:w-1/2 md:mx-auto overflow-auto">
                        <div class="flex items-center gap-x-3">
                            <img src="{{ Storage::url($category->icon) }}" alt="{{ $category->name }}"
                                class="w-[50px] h-[50px]">
                            <div>
                                <h3 class="text-xl font-bold text-indigo-950">
                                    {{ $category->name }}
                                </h3>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-x-3">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                                class="py-3 px-5 rounded-full text-white bg-indigo-700">Edit</a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
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
                    <td colspan="3" class="text-xl text-center">No Categories Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
