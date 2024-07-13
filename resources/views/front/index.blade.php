<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page | Mihardja Farma</title>
    <link rel="shortcut icon" href="{{ asset('svgs/logo-mark.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>


    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 sticky top-0 z-[9999]">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('svgs/logo-mark.svg') }}" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Mihardja Farma</span>
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
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
        </div>
    </nav>

    <!-- Topbar -->
    @auth
        <section class="flex items-center justify-between gap-5 wrapper">
            <div class="flex items-center gap-3">
                <div class="bg-white rounded-full p-[5px] flex justify-center items-center">
                    <img src="{{ asset('svgs/avatar.svg') }}" class="size-[50px] rounded-full" alt="">
                </div>
                <div class="">
                    <p class="text-base font-semibold capitalize text-primary">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-sm">
                        {{ Auth::user()->hasRole('owner') ? 'Owner' : 'Customer' }}
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-[10px]">
                <button type="button" class="p-2 bg-white rounded-full">
                    <span class="relative">
                        <!-- notification -->
                        <img src="{{ asset('svgs/ic-notification.svg') }}" class="size-5" alt="">
                        <!-- notification dot -->
                        <span class="block rounded-full size-1.5 bg-primary absolute top-0 right-0 -translate-x-1/2"></span>
                    </span>
                </button>
                <button type="button" class="p-2 bg-white rounded-full">
                    <img src="{{ asset('svgs/ic-shopping-bag.svg') }}" class="size-5" alt="">
                </button>
            </div>
        </section>
    @endauth


    <!-- Floating navigation -->
    <nav class="fixed z-50 bottom-[30px] bg-black rounded-[50px] pt-[18px] px-10 left-1/2 -translate-x-1/2 w-80">
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
                <img src="{{ asset('svgs/ic-location.svg') }}"
                    class="filter-to-grey group-[.is-active]:filter-to-primary" alt="">
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
                <img src="{{ asset('svgs/ic-profile.svg') }}"
                    class="filter-to-grey group-[.is-active]:filter-to-primary" alt="">
                <p
                    class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                    Profile
                </p>
            </a>
        </div>
    </nav>

    <!-- Header -->
    <section class="wrapper flex flex-col gap-2.5 items-center justify-center">
        <p class="text-4xl font-extrabold text-center">
            We Provide <br>
            Best Medicines
        </p>
        <form action="{{ route('front.search') }}" method="GET" id="searchForm"
            class="w-full flex items-center gap-2 overflow-hidden">
            <input type="text" name="keyword" id="searchProduct"
                class="block w-full py-3.5 pl-4 pr-10 rounded-s-[50px] font-semibold placeholder:text-grey placeholder:font-normal text-black text-base bg-[calc(100%-16px)] focus:outline-none focus:border-none transition-all"
                placeholder="Search by product name">
            <button type="submit" class="bg-white h-full rounded-e-[50px]">Search</button>
        </form>
    </section>

    <!-- Your last order -->
    <section class="wrapper">
        <div
            class="flex justify-between gap-5 items-center bg-lilac py-3.5 px-4 rounded-2xl relative bg-left bg-no-repeat bg-cover bg-[url({{ asset('svgs/pipeline.svg') }})]">
            <p class="text-base font-bold">
                Your last order has <br>
                been proceed
            </p>
            <img src="{{ asset('svgs/nekodicine.svg') }}" class="w-[90px] h-[70px]" alt="">
        </div>
    </section>

    <!-- Categories -->
    <section class="wrapper !px-0 flex flex-col gap-2.5">
        <p class="px-4 text-base font-bold">
            Categories
        </p>
        <div id="categoriesSlider" class="relative">
            @forelse ($categories as $category)
                <div class="inline-flex gap-2.5 items-center py-3 px-3.5 relative bg-white rounded-xl mr-4">
                    <img src="{{ Storage::url($category->icon) }}" class="size-10" alt="">
                    <a href="{{ route('front.product.category', $category) }}"
                        class="text-base font-semibold truncate stretched-link">
                        {{ $category->name }}
                    </a>
                </div>
            @empty
                <h1 class="text-xl font-bold text-center">No Categories Found</h1>
            @endforelse

        </div>
    </section>

    <!-- Latest Products -->
    <section class="wrapper !px-0 flex flex-col gap-2.5">
        <p class="px-4 text-base font-bold">
            Latest Products
        </p>
        <div id="proudctsSlider" class="relative">
            @forelse ($products as $product)
                <div
                    class="rounded-2xl bg-white py-3.5 pl-4 pr-[22px] inline-flex flex-col gap-4 items-start mr-4 relative w-[158px]">
                    <img src="{{ Storage::url($product->photo) }}" class="h-[100px] w-full object-contain"
                        alt="">
                    <div>
                        <a href="{{ route('front.product.details', ['product' => $product->slug]) }}"
                            class="text-base font-semibold w-[120px] truncate stretched-link block">
                            {{ $product->name }}
                        </a>
                        <p class="text-sm truncate text-grey">
                            Rp. {{ $product->price }}
                        </p>
                    </div>
                </div>
            @empty
                <h1 class="text-xl font-bold text-center">No Products Found</h1>
            @endforelse
        </div>
    </section>

    <!-- Explore -->
    <section class="wrapper">
        <div class="bg-lilac py-3.5 px-5 rounded-2xl relative bg-right-bottom bg-no-repeat bg-auto"
            style="background-image: url('{{ asset('svgs/doctor-help.svg') }}')">
            <img src="{{ asset('svgs/cloud.svg') }}" class="-ml-1.5 mb-1.5" alt="">
            <div class="flex flex-col gap-4 mb-[23px]">
                <p class="text-base font-bold">
                    Explore great doctors <br>
                    for your better life
                </p>
                <a href="#"
                    class="rounded-full bg-white text-primary flex w-max gap-2.5 px-6 py-2 justify-center items-center text-base font-bold">
                    Explore
                </a>
            </div>
        </div>
    </section>

    <!-- Most Purchased -->
    <section class="wrapper flex flex-col gap-2.5 pb-40">
        <p class="text-base font-bold">
            Most Purchased
        </p>
        <div class="flex flex-col gap-4">
            <!-- Softovac Rami -->
            <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                <img src="{{ asset('images/product-2.webp') }}"
                    class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                <div class="flex flex-wrap items-center justify-between w-full gap-1">
                    <div class="flex flex-col gap-1">
                        <a href="details.html"
                            class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                            Softovac Rami
                        </a>
                        <p class="text-sm text-grey">
                            Rp 290.000
                        </p>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                    </div>
                </div>
            </div>
            <!-- Enoki Pro -->
            <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                <img src="{{ asset('images/product-1.webp') }}"
                    class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                <div class="flex flex-wrap items-center justify-between w-full gap-1">
                    <div class="flex flex-col gap-1">
                        <a href="details.html"
                            class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                            Enoki Softovac
                        </a>
                        <p class="text-sm text-grey">
                            Rp 34.500.000
                        </p>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                    </div>
                </div>
            </div>
            <!-- Veetax Bora -->
            <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                <img src="{{ asset('images/product-4.webp') }}"
                    class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                <div class="flex flex-wrap items-center justify-between w-full gap-1">
                    <div class="flex flex-col gap-1">
                        <a href="details.html"
                            class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                            Veetax Bora
                        </a>
                        <p class="text-sm text-grey">
                            Rp 899.000
                        </p>
                    </div>
                    <div class="flex">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                        <img src="{{ asset('svgs/star.svg') }}" class="size-[18px]" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="{{ asset('scripts/sliderConfig.js') }}" type="module"></script>
</body>

</html>
