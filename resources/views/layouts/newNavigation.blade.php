<nav
    class="hidden md:block bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 md:sticky md:top-0 md:z-[9999]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('front.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('svgs/logo-mark.svg') }}" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Mihardja Farma</span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                        </ul>
                        <div class="py-1">
                           <form action="{{ route('logout') }}" method="post">
                            <button type="submit"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                            out</button>
                           </form>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                </li>
            </ul>
        </div>
       @auth
       <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button"
            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="size-[50px] rounded-full" src="{{ asset('svgs/avatar.svg') }}" alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
            id="user-dropdown">
            <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white"> {{ Auth::user()->name }}</span>
                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"> {{ Auth::user()->email }}</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                        out</button>
                       </form>
                </li>
            </ul>
        </div>
        <button data-collapse-toggle="navbar-user" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
         </div>
       @endauth
       @if (!Auth::user())
           <a href="{{ route('login') }}" class="bg-white border text-sm border-gray-900 rounded-full p-2 text-center">Log In</a>
       @endif
    </div>
    <!-- Floating navigation -->
</nav>

<section
    class="block md:hidden fixed z-50 bottom-[30px] bg-black rounded-[50px] pt-[18px] px-10 left-1/2 -translate-x-1/2 w-80">
    <div class="flex items-center justify-center gap-5 flex-nowrap">
        <a href="#" class="flex flex-col items-center justify-center gap-1 px-1 group is-active">
            <img src="{{ asset('svgs/ic-grid.svg') }}" class="filter-to-grey group-[.is-active]:filter-to-primary"
                alt="">
            <p
                class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                Home
            </p>
        </a>
        <a href="#" class="flex flex-col items-center justify-center gap-1 px-1 group">
            <img src="{{ asset('svgs/ic-location.svg') }}" class="filter-to-grey group-[.is-active]:filter-to-primary"
                alt="">
            <p
                class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                Stores
            </p>
        </a>
        <a href="#" class="flex flex-col items-center justify-center gap-1 px-1 group">
            <img src="{{ asset('svgs/ic-note.svg') }}" class="filter-to-grey group-[.is-active]:filter-to-primary"
                alt="">
            <p
                class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                Orders
            </p>
        </a>
        <a href="#" class="flex flex-col items-center justify-center gap-1 px-1 group">
            <img src="{{ asset('svgs/ic-profile.svg') }}" class="filter-to-grey group-[.is-active]:filter-to-primary"
                alt="">
            <p
                class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                Profile
            </p>
        </a>
    </div>
</section>
