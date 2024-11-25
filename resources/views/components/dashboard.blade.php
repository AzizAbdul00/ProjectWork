<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.css"
        integrity="sha512-6p+GTq7fjTHD/sdFPWHaFoALKeWOU9f9MPBoPnvJEWBkGS4PKVVbCpMps6IXnTiXghFbxlgDE8QRHc3MU91lJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Dashboard {{ $title }}</title>
</head>

<body class="bg-white">

    <div class="flex min-h-full">
        <!-- Sidebar -->
        <div class="max-w-64 w-64 border-e bg-white">
            <div class="flex h-full flex-col justify-between">
                <div class="px-4 py-6">
                    <a href="{{ route('home') }}">
                        <span class="h-10 w-32 place-content-center rounded-lg flex">
                            <img src="{{ asset('image/logo.png') }}" alt="" width="80">
                            <img src="{{ asset('image/logotext2.png') }}" alt="" width="150">
                        </span>
                    </a>
                    <ul class="mt-6 space-y-1">
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="{{ request()->is('dashboard') ? 'text-gray-700 bg-gray-100' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }} block rounded-lg px-4 py-2 text-sm font-medium">
                                <i class="ri-home-9-line"></i> Dashboard
                            </a>
                        </li>
                        {{-- <li>
                            <details class="group [&_summary::-webkit-details-marker]:hidden">
                                <summary
                                    class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                    <span class="text-sm font-medium"> Teams </span>

                                    <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </summary>

                                <ul class="mt-2 space-y-1 px-4">
                                    <li>
                                        <a href="#"
                                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                            Banned Users
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#"
                                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                            Calendar
                                        </a>
                                    </li>
                                </ul>
                            </details>
                        </li> --}}
                        <li>
                            <a href="{{ route('dashboard-products') }}"
                                class="{{ request()->is('dashboard/products*') ? 'text-gray-700 bg-gray-100' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }} block rounded-lg px-4 py-2 text-sm font-medium">
                                <i class="ri-box-1-line"></i> Products
                            </a>
                        </li>

                        <li class="border-t border-gray-300 mx-4"></li>

                        <li>
                            <details class="group [&_summary::-webkit-details-marker]:hidden">
                                <summary
                                    class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                    <span class="text-sm font-medium"> <i class="ri-user-6-line"></i> Account </span>

                                    <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </summary>

                                <ul class="mt-2 space-y-1 px-4">
                                    <li>
                                        <a href="#"
                                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                            Details
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#"
                                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                            Security
                                        </a>
                                    </li>

                                    <li>
                                        <form action="#">
                                            <button type="submit"
                                                class="w-full rounded-lg px-4 py-2 text-sm font-medium text-gray-500 [text-align:_inherit] hover:bg-gray-100 hover:text-gray-700">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </details>
                        </li>
                    </ul>
                </div>
                <div class="inset-x-0 bottom-0 border-t border-gray-100 sticky">
                    <a href="#" class="flex items-center gap-2 bg-white p-4 hover:bg-gray-50">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                            class="size-10 rounded-full object-cover" />

                        <div>
                            <p class="text-xs">
                                <strong class="block font-medium">Eric Frusciante</strong>

                                <span> eric@frusciante.com </span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        {{ $slot }}
    </div>

    <script>
        function fileUploader(initialImage = null) {
            return {
                imagePreview: initialImage, // Mengatur gambar awal jika ada
                fileChosen(event) {
                    const file = event.target.files[0];
                    if (file && file.size <= 10 * 1024 * 1024) { // Maks 10MB
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.imagePreview = e.target.result; // Menampilkan preview
                        };
                        reader.readAsDataURL(file);
                    } else {
                        alert('Ukuran file terlalu besar atau tidak valid.');
                        this.imagePreview = null;
                    }
                },
            };
        }
    </script>


    </script>


</body>

</html>
