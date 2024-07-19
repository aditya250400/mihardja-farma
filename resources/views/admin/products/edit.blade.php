@extends('layouts.app')
@section('title', 'Mihardja Farma | Edit Product')
@section('content')
@include('layouts.newNavigation')


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm p-5 sm:rounded-lg">

            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" value="{{ $product->name }}" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                {{-- Price --}}

                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                        :value="old('price')"  value="{{ $product->price }}" required autofocus autocomplete="price" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                {{-- Stock --}}

                <div class="mt-4">
                    <x-input-label for="stock" :value="__('Stock')" />
                    <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock"
                        :value="old('stock')" value="{{ $product->stock }}"  autofocus autocomplete="stock" />
                    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                </div>

                 {{-- Product Code --}}

                 <div class="mt-4">
                    <x-input-label for="code_product" :value="__('Product Code')" />
                    <x-text-input id="code_product" class="block mt-1 w-full" type="text" name="code_product"
                        :value="old('code_product')"  autofocus autocomplete="code_product" value="{{ $product->code_product }}" />
                    <x-input-error :messages="$errors->get('code_product')" class="mt-2" />
                </div>

                {{-- Category --}}

                <div class="mt-4">
                    <x-input-label for="category_id" :value="__('Category')" />
                    <select name="category_id" id="category_id"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">No Category Found</option>
                        @endforelse
                    </select>
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>

                 {{-- About --}}

                 <div class="mt-4">
                    <x-input-label for="about" :value="__('About')" />
                    <textarea id="about" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" cols="35" rows="5" type="text" name="about"
                        :value="old('about')" required autofocus autocomplete="about" >{{ $product->about }}</textarea>
                    <x-input-error :messages="$errors->get('about')" class="mt-2" />
                </div>

                <!-- Photo -->
                <div class="mt-4">
                    <x-input-label for="photo" :value="__('Photo')" />
                    <img src="{{ Storage::url($product->photo) }}" alt="{{ $product->slug }}"
                    class="w-[50px] h-[50px] my-2">
                    <x-text-input id="photo" class="block mt-1 w-full border p-1" name="photo" type="file"
                        :value="old('photo')" autofocus autocomplete="photo" accept="image/*" />
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Update Product') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

