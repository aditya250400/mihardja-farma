@extends('layouts.app')
@section('title', 'Sign Up | Mihardja Farma')
@section('content')
<div class="flex flex-col items-center px-6 py-10 min-h-dvh">
    <img src="{{ asset('svgs/logo.svg') }}" class="mb-[53px]" alt="">
    <form action="{{ route('register') }}" method="POST" class="mx-auto max-w-[345px] w-full p-6 bg-white rounded-3xl mt-auto" id="deliveryForm">
      @csrf
      <div class="flex flex-col gap-5">
        <p class="text-[22px] font-bold">
          New Account
        </p>
        <!-- Name -->
        <div class="flex flex-col gap-2.5">
          <label for="fullname" class="text-base font-semibold">Name</label>
          <input type="text" name="name" id="fullname__"
            class="form-input bg-[url({{ asset('svgs/ic-profile.svg') }})]" placeholder="Write your full name" value="{{ old('name') }}">
          <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 font-bold" />

        </div>
        <!-- Email Address -->
        <div class="flex flex-col gap-2.5">
          <label for="email" class="text-base font-semibold">Email Address</label>
          <input type="email" name="email" id="email__"
            class="form-input bg-[url({{ asset('svgs/ic-email.svg') }})]" placeholder="Your email address" value="{{ old('email') }}">
          <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 font-bold" />

        </div>
        <!-- Password -->
        <div class="flex flex-col gap-2.5">
          <label for="password" class="text-base font-semibold">Password</label>
          <input type="password" name="password" id="password__"
            class="form-input bg-[url({{ asset('svgs/ic-lock.svg') }})]" placeholder="Protect your password" value="{{ old('password') }}">
          <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 font-bold" />

        </div>
        <!-- Confirm Password -->
        <div class="flex flex-col gap-2.5">
          <label for="password_confirmation" class="text-base font-semibold">Confirm Password</label>
          <input type="password" name="password_confirmation" id="password_confirmation"
            class="form-input bg-[url({{ asset('svgs/ic-lock.svg') }})]" placeholder="Protect your Password" value="{{ old('password_confirmation') }}">

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 font-bold" />
        </div>


        <button type="submit" class="inline-flex text-white font-bold text-base bg-primary rounded-full whitespace-nowrap px-[30px] py-3 justify-center items-center">
          Create My Account
        </button>
      </div>
    </form>
    <a href="{{ route('login') }}" class="font-semibold text-base mt-[30px] underline">
      Sign In to My Account
    </a>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

@endsection
