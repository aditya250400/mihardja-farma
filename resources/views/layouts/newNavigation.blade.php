@if (Auth::check() && Auth::user()->hasRole('owner'))

    <nav class=" bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 sticky top-0 z-[9999]">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('front.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('svgs/logo-mark.svg') }}" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Mihardja Farma</span>
            </a>

            @auth
                <div class="hidden md:flex md:gap-2">
                    @role('owner')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')">
                            {{ __('Manage Products') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.index')">
                            {{ __('Manage Categories') }}
                        </x-nav-link>
                    @endrole
                    <x-nav-link :href="route('product_transactions.index')" :active="request()->routeIs('product_transactions.index')">
                        {{ Auth::user()->hasRole('owner') ? __('Apotek orders') : __('My orders') }}
                    </x-nav-link>
                </div>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button"
                        class="flex text-sm md:bg-gray-800 md:rounded-full md:me-0 md:focus:ring-4 md:focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="size-[50px] hidden md:block rounded-full" src="{{ asset('svgs/avatar.svg') }}"
                            alt="user photo">
                            <div class="block md:hidden">
                                <svg class="w-5 h-5" class=" fill-current" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                            </div>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white"> {{ Auth::user()->name }}</span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">
                                {{ Auth::user()->email }}</span>
                        </div>
                        <div class="md:hidden  flex flex-col gap-2 px-4 ">
                            @role('owner')
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                                <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')">
                                    {{ __('Manage Products') }}
                                </x-nav-link>
                                <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.index')">
                                    {{ __('Manage Categories') }}
                                </x-nav-link>
                            @endrole
                            <x-nav-link :href="route('product_transactions.index')" :active="request()->routeIs('product_transactions.index')">
                                {{ Auth::user()->hasRole('owner') ? __('Apotek orders') : __('My orders') }}
                            </x-nav-link>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">

                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>

                            <li class="">
                                <form class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit">Sign
                                        out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div>

                    </div>
                </div>
            @endauth
            @if (!Auth::user())
                <a href="{{ route('login') }}"
                    class="bg-white border text-sm border-gray-900 rounded-full p-2 text-center">Log In</a>
            @endif
        </div>
    </nav>
@else
    <!-- Floating navigation -->
    <section class=" fixed z-50 bottom-[30px] bg-black rounded-[50px] pt-[18px] px-10 left-1/2 -translate-x-1/2 w-80">
        <div class="flex items-center justify-center gap-5 flex-nowrap">
            <a href="{{ route('front.index') }}"
                class="flex flex-col items-center justify-center gap-1 px-1 group is-active">
                <img src="{{ asset('svgs/ic-grid.svg') }}" class="filter-to-grey group-[.is-active]:filter-to-primary"
                    alt="">
                <p
                    class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                    Home
                </p>
            </a>
            <a href="{{ route('front.products') }}" class="flex flex-col items-center justify-center gap-1 px-1 group">
                <x-ri-medicine-bottle-line class="text-slate-400 w-[30px]" />
                <p
                    class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                    Products
                </p>
            </a>
            @if (Auth::check())
                <a href="{{ route('product_transactions.index') }}"
                    class="flex flex-col items-center justify-center gap-1 px-1 group">
                    <img src="{{ asset('svgs/ic-note.svg') }}"
                        class="filter-to-grey group-[.is-active]:filter-to-primary" alt="">
                    <p
                        class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                        Orders
                    </p>
                </a>
                <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="flex flex-col items-center justify-center gap-1 px-1 group">
                    <img src="{{ asset('svgs/ic-profile.svg') }}"
                        class="filter-to-grey group-[.is-active]:filter-to-primary" alt="">
                    <p
                        class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                        Profile
                    </p>

                </button>
                <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                      <div>{{ Auth::user()->name }}</div>
                      <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                      <li>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                      </li>
                      <li>
                        <form action="{{ route('logout') }}" class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" method="post">
                            @csrf
                        <button type="submit" class="">Sign out</button>
                        </form>
                      </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="flex flex-col items-center justify-center gap-1 px-1 group">
                    <x-uiw-login class="text-slate-400 w-[28px]" />
                    <p
                        class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                        Login
                    </p>
                </a>
            @endif
        </div>
    </section>

@endif
