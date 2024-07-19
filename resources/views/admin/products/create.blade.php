@extends('layouts.app')
@section('title', 'Mihardja Farma | Create Product')
@section('content')
@include('layouts.newNavigation')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm p-5 sm:rounded-lg">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')"  autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                {{-- Price --}}

                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                        :value="old('price')"  autofocus autocomplete="price" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                {{-- Stock --}}

                <div class="mt-4">
                    <x-input-label for="stock" :value="__('Stock')" />
                    <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock"
                        :value="old('stock')"  autofocus autocomplete="stock" />
                    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                </div>

                 {{-- Product Code --}}

                 <div class="mt-4">
                    <x-input-label for="code_product" :value="__('Product Code')" />
                    <x-text-input id="code_product" class="block mt-1 w-full" type="text" name="code_product"
                        :value="old('code_product')"  autofocus autocomplete="code_product" />
                    <x-input-error :messages="$errors->get('code_product')" class="mt-2" />
                </div>


                {{-- Category --}}

                <div class="mt-4">
                    <x-input-label for="category_id" :value="__('Category')" />
                    <select name="category_id" id="category_id"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">Choose product category</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                        @empty
                            <option value="">No Category Found</option>
                        @endforelse
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                 {{-- About --}}

                 <div class="mt-4">
                    <x-input-label for="about" :value="__('About')" />
                    <textarea id="about" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" cols="35" rows="5" type="text" name="about"
                        :value="old('about')"  autofocus autocomplete="about" >{{ old('about') }}</textarea>
                    <x-input-error :messages="$errors->get('about')" class="mt-2" />
                </div>

                <!-- Photo -->
                <div class="mt-4">
                    <x-input-label for="photo" :value="__('Photo')" />
                    <x-text-input id="photo" class="block mt-1 w-full border p-1" name="photo" type="file"
                        :value="old('photo')"  autofocus autocomplete="photo" accept="image/*" />
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Add Product') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


