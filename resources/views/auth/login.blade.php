<x-guest-layout>


    <div class="min-h-screen bg-green-600 flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-12 w-auto"
                        src="{{ asset('images/sksu1.png') }}"
                        alt="SKSU LOGO">
                    <h2 class="mt-6 text-3xl font-extrabold text-white">
                        Sign in to your account
                    </h2>

                </div>

                <div class="mt-8">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-white">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mt-6">
                        <x-jet-validation-errors class="mb-4" />
                        <form action="#"
                            method="POST"
                            action="{{ route('login') }}"
                            class="space-y-6">
                            @csrf
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-white">
                                    Email address
                                </label>
                                <div class="mt-1">
                                    <input id="email"
                                        name="email"
                                        type="email"
                                        autocomplete="email"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password"
                                    class="block text-sm font-medium text-white">
                                    Password
                                </label>
                                <div class="mt-1">
                                    <input id="password"
                                        name="password"
                                        type="password"
                                        autocomplete="current-password"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="flex items-center justify-between">


                                <div class="text-sm">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-50 hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 ring-2 ring-white">
                                    Sign in
                                </button>
                            </div>
                        </form>
                        <div class=" text-center flex justify-center mt-10">
                            <a href="{{ route('register') }}"
                                class="text-white underline">I don't have an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1 bg-white">
            <img class="absolute inset-0 h-full w-full object-cover p-40"
                src="{{ asset('images/OREACADLogo1.png') }}"
                alt="">
        </div>
    </div>

</x-guest-layout>
