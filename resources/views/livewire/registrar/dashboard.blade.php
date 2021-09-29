<main class="flex-1 relative pb-8 z-0 overflow-y-auto">


    <div class="mt-3">
        <div class=" px-4 sm:px-6 lg:px-8">
            <h2 class="text-xl leading-6 font-medium text-gray-900">Dashboard</h2>
            <div class="mt-2 grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Card -->



                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/scale -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        All Request
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $all }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#"
                                class="font-medium text-cyan-700 hover:text-cyan-900">
                                See Analytics
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/scale -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Pending Request
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $pending }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#"
                                class="font-medium text-cyan-700 hover:text-cyan-900">
                                See Analytics
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/scale -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Payment to Review
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $review }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#"
                                class="font-medium text-cyan-700 hover:text-cyan-900">
                                See Analytics
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/scale -->
                                <svg class="text-gray-600  mr-4 flex-shrink-0 h-6 w-6"
                                    fill="#424745"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 30 30">
                                    <path
                                        d="M 2 5 L 2.015625 17 L 3.6054688 17 L 12.394531 26.189453 A 2 2 0 0 0 14 27 A 2 2 0 0 0 16 25 A 2 2 0 0 0 15.976562 24.716797 A 2 2 0 0 0 17 25 A 2 2 0 0 0 19 23 A 2 2 0 0 0 18.976562 22.716797 A 2 2 0 0 0 20 23 A 2 2 0 0 0 22 21 A 2 2 0 0 0 21.976562 20.716797 A 2 2 0 0 0 23 21 A 2 2 0 0 0 25 19 A 2 2 0 0 0 24.423828 17.595703 L 24.398438 17.572266 A 2 2 0 0 0 24.265625 17.453125 L 18.357422 12.123047 C 18.357422 12.123047 14.695922 12.703781 13.294922 12.925781 C 11.893922 13.147781 8 12.682 8 8 C 8 6.542 9.0748125 6.21875 9.7578125 5.96875 C 10.439812 5.71775 12.5 5 12.5 5 L 2 5 z M 19 5 A 2 2 0 0 0 18.480469 5.0683594 A 2 2 0 0 0 18.478516 5.0683594 L 18.470703 5.0703125 A 2 2 0 0 0 18.464844 5.0722656 A 2 2 0 0 0 18.255859 5.1445312 L 10 8 L 10 8.5 C 10 9.881 11.119 11 12.5 11 C 12.583663 11 12.662591 10.982633 12.744141 10.974609 L 12.753906 10.986328 L 12.960938 10.953125 C 12.980441 10.949481 13.000191 10.947453 13.019531 10.943359 L 19 9.9960938 C 19 9.9960938 24.250969 14.694328 25.167969 15.611328 C 26.047969 16.491328 26.917328 17.155 26.986328 19 L 29 19 L 29 7 L 25 8 L 20.009766 5.2753906 A 2 2 0 0 0 19.902344 5.2167969 L 19.855469 5.1914062 L 19.847656 5.1914062 A 2 2 0 0 0 19 5 z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Total Claimed
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $claimed }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#"
                                class="font-medium text-cyan-700 hover:text-cyan-900">
                                See Analytics
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/scale -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Total Denied
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $denied }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#"
                                class="font-medium text-cyan-700 hover:text-cyan-900">
                                See Analytics
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/scale -->
                                <svg class=" mr-4 flex-shrink-0 h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 50 50">
                                    <path
                                        d="M 2 2 C 0.894531 2 0 2.894531 0 4 C 0 5.105469 0.894531 6 2 6 C 3.105469 6 4 5.105469 4 4 L 8.65625 4 C 10.742188 4 11.542969 4.667969 12.21875 6.9375 L 20.21875 39.21875 C 20.644531 40.828125 21.125 42.609375 22.9375 43.46875 C 22.367188 44.160156 22 45.035156 22 46 C 22 48.207031 23.792969 50 26 50 C 28.207031 50 30 48.207031 30 46 C 30 45.269531 29.78125 44.589844 29.4375 44 L 35.5625 44 C 35.21875 44.589844 35 45.269531 35 46 C 35 48.207031 36.792969 50 39 50 C 41.207031 50 43 48.207031 43 46 C 43 44.960938 42.589844 44.023438 41.9375 43.3125 C 41.972656 43.210938 42 43.113281 42 43 C 42 42.449219 41.550781 42 41 42 L 25.71875 42 C 23.023438 42 22.730469 40.921875 22.15625 38.75 L 21.46875 36 L 39.8125 36 C 40.226563 36 40.605469 35.730469 40.75 35.34375 L 47.9375 16.34375 C 48.054688 16.039063 47.996094 15.707031 47.8125 15.4375 C 47.628906 15.167969 47.324219 15 47 15 L 16.28125 15 L 14.15625 6.40625 C 13.476563 4.117188 12.320313 2 8.65625 2 Z M 27.375 6.1875 C 27.121094 6.1875 26.851563 6.304688 26.65625 6.5 L 20.125 13 L 34.59375 13 L 28.0625 6.5 C 27.867188 6.304688 27.628906 6.1875 27.375 6.1875 Z M 35.375 6.21875 C 35.117188 6.21875 34.84375 6.3125 34.65625 6.5 L 32.78125 8.375 L 37.40625 13 L 42.59375 13 L 36.0625 6.5 C 35.875 6.3125 35.632813 6.21875 35.375 6.21875 Z M 26 44 C 27.101563 44 28 44.898438 28 46 C 28 47.101563 27.101563 48 26 48 C 24.898438 48 24 47.101563 24 46 C 24 44.898438 24.898438 44 26 44 Z M 39 44 C 40.101563 44 41 44.898438 41 46 C 41 47.101563 40.101563 48 39 48 C 37.898438 48 37 47.101563 37 46 C 37 44.898438 37.898438 44 39 44 Z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Ready to claim
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $ready }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#"
                                class="font-medium text-cyan-700 hover:text-cyan-900">
                                Prind PDF
                            </a>
                        </div>
                    </div>
                </div>

                <!-- More items... -->
            </div>
        </div>

        <h2 class=" mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">
            Recent activity
        </h2>



        <!-- Activity table (small breakpoint and up) -->
        <div class="">
                    <div class="
            px-4
            sm:px-6
            lg:px-8">

        </div>
    </div>
</main>
