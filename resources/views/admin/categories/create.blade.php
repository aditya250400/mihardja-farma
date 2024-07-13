@extends('layouts.app')
@section('title', 'Mihardja Farma | Create Category')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-5 sm:rounded-lg">
                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl text-white bg-slate-800">
                           {{ $error }}
                        </div>
                    @endforeach
                @endif --}}

                <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Icon -->
                    <div class="mt-4">
                        <x-input-label for="Icon" :value="__('Icon')" />
                        <x-text-input id="Icon" class="block mt-1 w-full border p-1" name="icon" type="file" :value="old('icon')" required autofocus autocomplete="icon" accept="image/*" />
                        <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Add Category') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
