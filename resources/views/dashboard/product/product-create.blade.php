<x-dashboard>
    <x-slot:title>Dashboard Product Create</x-slot:title>
    <div class="flex-1 p-10 w-full">
        <form action="{{ route('dashboard-products-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-12">
                <div class="pb-1">
                    <h2 class="text-base/7 font-semibold text-gray-900">Create Product</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful
                        what
                        you share.</p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 sm:max-w-md">
                                    <input type="text" name="name" id="name" autocomplete="name"
                                        value="{{ old('name') }}"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                        placeholder="Merek-Tipe">
                                </div>
                                @error('name')
                                    <div class="text-sm font-light text-red-500">
                                        <p class="text-sm font-light">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="description"
                                class="block text-sm/6 font-medium text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm/6"
                                    value="{{ old('description') }}"></textarea>
                            </div>
                            <p class="text-sm/6 text-gray-600">Write a few sentences discription</p>
                            @error('description')
                                <div class="text-sm font-light text-red-500">
                                    <p class="text-sm font-light">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div class="sm:col-span-full">
                            <div class="flex">
                                {{-- Category --}}
                                <div class="w-2/6">
                                    <label for="category_id"
                                        class="block text-sm/6 font-medium text-gray-900">Category</label>
                                    <div class="mt-2">
                                        <select id="category_id" name="category_id" autocomplete="category_id"
                                            class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 sm:max-w-xs sm:text-sm/6">
                                            @foreach ($categories as $category)
                                                @if (old('category_id') == $category->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Price --}}
                                <div class="w-1/2">
                                    <label for="price"
                                        class="block text-sm/6 font-medium text-gray-900">Price</label>
                                    <div
                                        class="mt-2 flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300
                                        sm:max-w-md">
                                        <input type="text" name="price" id="price"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                            placeholder="1.000.000" value="{{ old('price') }}">
                                    </div>
                                    @error('price')
                                        <div class="text-sm font-light text-red-500">
                                            <p class="text-sm font-light">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-data="fileUploader()" class="col-span-full">
                        <label for="image" class="block text-sm/6 font-medium text-gray-900">
                            Photo product
                        </label>
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <!-- Preview Gambar -->
                                <template x-if="imagePreview">
                                    <img :src="imagePreview" class="mx-auto mt-4 max-h-32" alt="Preview Image" />
                                </template>

                                <!-- Placeholder jika tidak ada gambar -->
                                <template x-if="!imagePreview">
                                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1-2.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1-2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </template>

                                <!-- Input File -->
                                <div class="mt-4 flex text-sm/6 text-gray-600">
                                    <label for="image"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="image" name="image" type="file" class="sr-only"
                                            @change="fileChosen">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>

                                <!-- Error Message -->
                                @error('image')
                                    <div class="text-sm font-light text-red-500">
                                        <p class="text-sm font-light">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="mt-2 flex items-center justify-end gap-x-6 pb-10">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
    </div>

    </form>
    </div>

</x-dashboard>
