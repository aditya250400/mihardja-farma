@extends('layouts.app')
@section('title', 'Sign In | Mihardja Farma')
@section('content')
<div class="flex flex-col items-center px-6 py-10 min-h-dvh">
    <div class="flex justify-center">
        <div class="flex items-center gap-3">
          <img src="{{ asset('svgs/logo-mark.svg') }}" class="" alt="">
        <h1 class="text-xl md:text-2xl font-extrabold">Mihardja Farma</h1>
        </div>
    </div>
    <form action="{{ route('login') }}" method="POST" class="mx-auto max-w-[345px] w-full p-6 bg-white rounded-3xl mt-auto" id="deliveryForm">
      @csrf
      <div class="flex flex-col gap-5">
        <p class="text-[22px] font-bold">
          Sign In
        </p>
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
        <button type="submit" class="inline-flex text-white font-bold text-base bg-primary rounded-full whitespace-nowrap px-[30px] py-3 justify-center items-center">
          Sign In
        </button>
      </div>
    </form>
    <a href="{{ route('register') }}" class="font-semibold text-base mt-[30px] underline">
      Create New Account
    </a>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endsection
