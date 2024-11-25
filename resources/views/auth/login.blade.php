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
    <title>Login - Yamaha</title>
</head>

<body class="bg-white">

    <div class="mx-auto max-w-screen-xl px-4 py-28 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg text-center">
            <h1 class="text-2xl font-bold sm:text-3xl">Get started today!</h1>

            <p class="mt-4 text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et libero nulla eaque error neque
                ipsa culpa autem, at itaque nostrum!
            </p>

            <div class="mt-3 relative pt-1">
                <div class="absolute left-8">
                    @if ($message = Session::get('failed'))
                        <p class="text-red-500 text-sm font-light">{{ $message }}</p>
                    @endif
                </div>
            </div>

        </div>


        <form action="{{ route('auth-login') }}" class="mx-auto mb-0 mt-8 max-w-md space-y-4" method="POST">
            @csrf
            <div>
                <label for="email" class="sr-only">Email</label>
                <div class="relative">
                    <input type="email"
                        class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm border focus:border-gray-300 focus:outline-none"
                        placeholder="Enter email" name="email" required value="{{ old('email') }}" />
                    <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </span>
                </div>
                @error('email')
                    <p class="text-sm text-red-500 font-light">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="sr-only">Password</label>
                <div x-data="{ show: false }" class="relative">
                    <input :type="show ? 'text' : 'password'"
                        class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm border focus:border-gray-300 focus:outline-noney focus:outline-none"
                        placeholder="Enter password" name="password" required />
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 end-0 grid place-content-center px-4">
                        <span x-show="!show" class="text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                        <span x-show="show" class="text=gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </span>
                    </button>
                </div>
                @error('password')
                    <p class="text-sm text-red-500 font-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500 items-center">
                    <div class="space-x-3 items-center">
                        <a href="" class="text-blue-500">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="" class="text-blue-500">
                            <i class="fa-brands fa-google"></i>
                        </a>
                    </div>
                    <div>
                        <p>
                            No account?
                            <a class="underline" href="{{ route('register') }}">Sign up</a>
                        </p>
                    </div>
                </div>

                <button type="submit"
                    class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                    Sign in
                </button>
            </div>
        </form>
    </div>

</body>

</html>
