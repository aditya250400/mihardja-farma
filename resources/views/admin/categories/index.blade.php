<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between gap-2 items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
        <a href="{{ route('admin.categories.create') }}" class="py-3 px-5 rounded-full text-white bg-indigo-700">Add Category</a>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden shadow-sm p-5  sm:rounded-lg">
                <div class="flex items-center justify-between">
                    <h1 class="font-bold text-lg">Icon</h1>
                    <h1 class="font-bold text-lg">Name</h1>
                    <h1 class="font-bold text-lg">Action</h1>
                </div>
                <hr>
               @forelse ($categories as $category)
                   <div class="item-card flex flex-row items-center justify-between">
                        <img src="{{ Storage::url($category->icon) }}" alt="{{ $category->slug }}" class="w-[50px] h-[50px]">
                        <h3 class="text-xl font-bold text-indigo-950">
                            {{ $category->name }}
                        </h3>
                        <div class="flex items-center gap-x-3">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="py-3 px-5 rounded-full text-white bg-indigo-700">Edit</a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                                @csrf
                                @method('DELETE')
                                <button class="py-3 px-5 rounded-full text-white bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                   </div>
               @empty
                   <div>
                    <h1 class="text-2xl text-center">Tidak ada data</h1>
                   </div>
               @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
