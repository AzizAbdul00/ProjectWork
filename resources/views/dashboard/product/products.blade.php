<x-dashboard>
    <x-slot:title>Products</x-slot:title>
    <div class="flex-1 p-10 w-full">
        <div class="mb-4">
            <h1 class="text-3xl font-semibold">Selamat Datang Admin</h1>
            <div class="flex justify-between items-center">
                <p class="text-sm font-light">Mau menambahkan product? atau mengedit? Boleh ajaa.</p>
                <a href="{{ route('dashboard-products-create') }}"
                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                    <i class="ri-add-line"></i>
                </a>
            </div>
        </div>

        @if (Session()->has('success'))
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-[-10px]"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-[-10px]" x-init="setTimeout(() => show = false, 5000)"
                class="fixed top-4 right-4 z-50 rounded-xl border border-gray-100 bg-white p-4 shadow-lg">
                <div class="flex items-start gap-4">
                    <span class="text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    <div class="flex-1">
                        <strong class="block font-medium text-gray-900"> Success </strong>
                        <p class="mt-1 text-sm text-gray-700">{{ Session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-gray-500 transition hover:text-gray-600">
                        <span class="sr-only">Dismiss popup</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif


        <div class="w-full mt-10">
            <div class="rounded-lg">
                <div class="overflow-x-auto rounded-t-lg">
                    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                        {{-- ltr:text-left rtl:text-right --}}
                        <thead class="text-left">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Category</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Price</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Image</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        {{ $product->name }}</td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        {{ $product->category->name }}</td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $product->price }}</td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt=""
                                            width="15">
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-2">
                                        <a href="{{ route('dashboard-products-edit', $product->id) }}"
                                            class="inline-block rounded bg-green-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                            <i class="ri-edit-box-line"></i>
                                        </a>
                                        <a href="{{ route('dashboard-products-destroy', $product->id) }}"
                                            onclick="return confirm('Apakah anda yakin menghapus product?')"
                                            class="inline-block rounded bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                            <i class="ri-delete-bin-6-line"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
                    <div class="flex justify-center gap-1 text-xs font-medium">
                        <div class="inline-flex justify-center gap-1">
                            <a href="#"
                                class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                                <span class="sr-only">Prev Page</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <div>
                                <label for="PaginationPage" class="sr-only">Page</label>

                                <input type="number"
                                    class="h-8 w-12 rounded border border-gray-100 bg-white p-0 text-center text-xs font-medium text-gray-900 [-moz-appearance:_textfield] [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none"
                                    min="1" value="2" id="PaginationPage" />
                            </div>

                            <a href="#"
                                class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                                <span class="sr-only">Next Page</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-dashboard>
