<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Category - String House</title>
</head>

<body class="bg-white">

    <header>
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex-1 md:flex md:items-center md:gap-12">
                    <a class="block text-teal-600" href="{{ route('home') }}">
                        <span class="sr-only">Home</span>
                        <img src="{{ asset('image/logo.png') }}" alt="" class="" width="60">
                    </a>
                </div>
                <div class="md:flex md:items-center md:gap-12">
                    <nav aria-label="Global" class="hidden md:block">
                        <ul class="flex items-center gap-6 text-sm">
                            <li x-data="{ isDrop: false }">
                                <div class="relative">
                                    <div class="inline-flex items-center overflow-hidden rounded-md bg-white">
                                        <button
                                            class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700 flex items-center"
                                            @click="isDrop = !isDrop">
                                            Category
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="absolute z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg"
                                        x-show="isDrop" @click.away="isDrop = false">
                                        <div class="p-2">
                                            @foreach ($categories as $cat)
                                                <a href="{{ route('product-category', $cat->id) }}"
                                                    class="{{ request()->routeIs('product-category') && request()->route('category')->id == $cat->id ? 'bg-blue-400 text-white font-bold hover:bg-blue-300' : 'text-gray-500 hover:bg-blue-300 hover:text-white' }} block rounded-lg px-4 py-2 text-sm"
                                                    role="menuitem">
                                                    {{ $cat->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Careers </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> History </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Services </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Projects </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Blog </a>
                            </li>
                            @guest
                                <li>
                                    <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('login') }}">
                                        Login </a>
                                </li>

                                <li>
                                    <a class="text-gray-500 transition hover:text-gray-500/75"
                                        href="{{ route('register') }}"> Register </a>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                    @auth
                        <div class="hidden md:relative md:block" x-data="{ isOpen: false }">
                            <button @click="isOpen = !isOpen" type="button"
                                class="overflow-hidden rounded-full shadow-inner items-center justify-center">
                                <span class="sr-only">Toggle dashboard menu</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-8">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="absolute end-0 z-10 mt-0.5 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
                                role="menu" x-show="isOpen" @click.away="isOpen = false"
                                x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95">
                                <div class="p-2">
                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                        role="menuitem">
                                        My profile
                                    </a>
                                    @if (Auth::user()->role == 'admin')
                                        <a href="{{ route('dashboard') }}"
                                            class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                            role="menuitem">
                                            Dashboard
                                        </a>
                                    @endif

                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                        role="menuitem">
                                        Settings
                                    </a>

                                    <div class="border-t w-44 items-center justify-end mx-auto"></div>

                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                        role="menuitem">
                                        Logout
                                    </a>
                                </div>

                                {{-- <div class="p-2">
                                <form method="POST" action="#">
                                    <button type="submit"
                                        class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
                                        role="menuitem">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                        </svg>
                                        Login
                                    </button>
                                </form>
                            </div> --}}
                            </div>
                        </div>
                        <div class="block md:hidden">
                            <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    <div>
        <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 sm:pb-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Gitar {{ $category->name }}</h2>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                    <div class="group relative">
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                alt="Front of men&#039;s Basic Tee in black."
                                class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="{{ route('product', $product->id) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                            </div>
                            <p class="text-sm font-medium text-gray-900">Rp. {{ $product->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div>
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:pt-5 sm:pb-8 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Gitar Travel / Mini</h2>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <div class="group relative">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="https://id.yamaha.com/id/files/Image-Index_CSF_1080x1080_4c57beedf48db954228205c6bdd60934.jpg?impolicy=resize&imwid=396&imhei=396"
                            alt="Front of men&#039;s Basic Tee in black."
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Yamaha - CSF
                                </a>
                            </h3>
                        </div>
                        <p class="text-sm font-medium text-gray-900">$35</p>
                    </div>
                </div>
                <div class="group relative">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="https://id.yamaha.com/id/files/Image-Index_APXT2_1080x1080_8aaf17813c2d6009b515d7d49849701f.jpg?impolicy=resize&imwid=396&imhei=396"
                            alt="Front of men&#039;s Basic Tee in black."
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Yamaha - Apxt2
                                </a>
                            </h3>
                        </div>
                        <p class="text-sm font-medium text-gray-900">$35</p>
                    </div>
                </div>
                <div class="group relative">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="https://id.yamaha.com/id/files/Image-Index_CG_CGX_1080x1080_1277c32991b22311018901515e468873.jpg?impolicy=resize&imwid=396&imhei=396"
                            alt="Front of men&#039;s Basic Tee in black."
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Yamaha - CG/CGX
                                </a>
                            </h3>
                        </div>
                        <p class="text-sm font-medium text-gray-900">$35</p>
                    </div>
                </div>
                <div class="group relative">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="https://id.yamaha.com/id/files/Image-Index_JR_1080x1080_d089b170aabee09fe948674b19e9e960.jpg?impolicy=resize&imwid=396&imhei=396"
                            alt="Front of men&#039;s Basic Tee in black."
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Yamaha - JR
                                </a>
                            </h3>
                        </div>
                        <p class="text-sm font-medium text-gray-900">$35</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <footer class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 pb-6 pt-16 sm:px-6 lg:px-8 lg:pt-24">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <div>
                    <div class="flex justify-center items-center text-teal-600 sm:justify-start">
                        <img src="{{ asset('image/logo.png') }}" alt="" width="80">
                        <img src="{{ asset('image/logotext2.png') }}" alt="" width="150">
                    </div>
                    <p class="mt-6 max-w-md text-center leading-relaxed text-gray-500 sm:max-w-xs sm:text-left">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt consequuntur amet culpa
                        cum itaque neque.
                    </p>
                    <ul class="mt-8 flex justify-center gap-6 sm:justify-start md:gap-8">
                        <li>
                            <a href="#" rel="noreferrer" target="_blank"
                                class="text-teal-700 transition hover:text-teal-700/75">
                                <span class="sr-only">Facebook</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" rel="noreferrer" target="_blank"
                                class="text-teal-700 transition hover:text-teal-700/75">
                                <span class="sr-only">Instagram</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" rel="noreferrer" target="_blank"
                                class="text-teal-700 transition hover:text-teal-700/75">
                                <span class="sr-only">Twitter</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" rel="noreferrer" target="_blank"
                                class="text-teal-700 transition hover:text-teal-700/75">
                                <span class="sr-only">GitHub</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" rel="noreferrer" target="_blank"
                                class="text-teal-700 transition hover:text-teal-700/75">
                                <span class="sr-only">Dribbble</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-4 lg:col-span-2">
                    <div class="text-center sm:text-left">
                        <p class="text-lg font-medium text-gray-900">About Us</p>
                        <ul class="mt-8 space-y-4 text-sm">
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                                    Company History
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                                    Meet the Team
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                                    Employee Handbook
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Careers
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-lg font-medium text-gray-900">Our Services</p>
                        <ul class="mt-8 space-y-4 text-sm">
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                                    Web Development
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Web Design
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Marketing
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Google Ads
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-lg font-medium text-gray-900">Helpful Links</p>
                        <ul class="mt-8 space-y-4 text-sm">
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> FAQs </a>
                            </li>
                            <li>
                                <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Support
                                </a>
                            </li>
                            <li>
                                <a class="group flex justify-center gap-1.5 ltr:sm:justify-start rtl:sm:justify-end"
                                    href="#">
                                    <span class="text-gray-700 transition group-hover:text-gray-700/75">
                                        Live Chat
                                    </span>
                                    <span class="relative flex size-2">
                                        <span
                                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-teal-400 opacity-75"></span>
                                        <span class="relative inline-flex size-2 rounded-full bg-teal-500"></span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-lg font-medium text-gray-900">Contact Us</p>
                        <ul class="mt-8 space-y-4 text-sm">
                            <li>
                                <a class="flex items-center justify-center gap-1.5 ltr:sm:justify-start rtl:sm:justify-end"
                                    href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 shrink-0 text-gray-900"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="flex-1 text-gray-700">john@doe.com</span>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center gap-1.5 ltr:sm:justify-start rtl:sm:justify-end"
                                    href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 shrink-0 text-gray-900"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span class="flex-1 text-gray-700">0123456789</span>
                                </a>
                            </li>
                            <li
                                class="flex items-start justify-center gap-1.5 ltr:sm:justify-start rtl:sm:justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 shrink-0 text-gray-900"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <address class="-mt-0.5 flex-1 not-italic text-gray-700">
                                    213 Lane, London, United Kingdom
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-100 pt-6">
                <div class="text-center sm:flex sm:justify-between sm:text-left">
                    <p class="text-sm text-gray-500">
                        <span class="block sm:inline">All rights reserved.</span>
                        <a class="inline-block text-teal-600 underline transition hover:text-teal-600/75"
                            href="#">
                            Terms & Conditions
                        </a>
                        <span>&middot;</span>
                        <a class="inline-block text-teal-600 underline transition hover:text-teal-600/75"
                            href="#">
                            Privacy Policy
                        </a>
                    </p>
                    <p class="mt-4 text-sm text-gray-500 sm:order-first sm:mt-0">&copy; 2022 Company Name</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
