<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}




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
                        <form method="POST"
                            action="{{ route('register') }}">
                            @csrf

                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-white">
                                    Name
                                </label>
                                <x-jet-input id="name"
                                    class="block mt-1 w-full"
                                    type="text"
                                    name="name"
                                    :value="old('name')"
                                    required
                                    autofocus
                                    autocomplete="name" />
                            </div>

                            <div class="mt-4">
                                <label for="email"
                                    class="block text-sm font-medium text-white">
                                    Email address
                                </label>
                                <x-jet-input id="email"
                                    class="block mt-1 w-full"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required />
                            </div>

                            <div class="mt-4">
                                <label for="password"
                                    class="block text-sm font-medium text-white">
                                    Password
                                </label>
                                <x-jet-input id="password"
                                    class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <label for="con-password"
                                    class="block text-sm font-medium text-white">
                                    Confirm password
                                </label>
                                <x-jet-input id="password_confirmation"
                                    class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password" />
                            </div>



                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 ring-2 ring-white">
                                    Sign in
                                </button>
                            </div>
                        </form>
                        <div class="mt-10 flex justify-center text-center">
                            <a href="{{ route('login') }}"
                                class="text-white underline">Already registered</a>
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
