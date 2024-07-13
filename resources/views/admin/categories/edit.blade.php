@extends('layouts.app')
@section('title', 'Mihardja Farma | Edit Categories')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm p-5 sm:rounded-lg">
            <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" value="{{ $category->name }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2"  />
                </div>

                <!-- Icon -->
                <div class="mt-4">
                    <x-input-label for="Icon" :value="__('Icon')" />
                    <img src="{{ Storage::url($category->icon) }}" alt="{{ $category->slug }}" class="w-[50px] h-[50px]">
                    <x-text-input id="Icon" class="block mt-1 w-full border p-1" name="icon" type="file" :value="old('icon')" autofocus autocomplete="icon" accept="image/*" />
                    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Update Category') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
