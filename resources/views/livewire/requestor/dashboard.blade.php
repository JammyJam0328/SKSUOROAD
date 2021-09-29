<div>
    <div x-data="{tab:'request'}">
        <h1 class="text-xl font-bold text-green-600">Dashboad | <span x-cloak
                x-show="tab=='request'">MY REQUEST</span> <span x-cloak
                x-show="tab=='draft'">DRAFT REQUEST</span></h1>
        <div>
            <div class="
                border-b
                border-gray-200">
                <nav class="-mb-px flex space-x-8"
                    aria-label="Tabs">
                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200" -->
                    <a x-on:click="tab='request'"
                        href="#"
                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm">
                        My Request
                        <span
                            class="bg-red-100 text-red-600 ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium ">{{ $requests->count() }}</span>
                    </a>
                    <a x-on:click="tab='draft'"
                        href="#"
                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm">
                        Draft
                        <span
                            class="bg-red-100 text-red-600 ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium ">{{ $drafts->count() }}</span>
                    </a>
                </nav>
            </div>
            <div x-cloak
                x-show="tab=='request'"
                x-transition
                class="mt-10">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul role="list"
                        class="divide-y divide-gray-200">
                        @foreach ($requests as $request)
                            <li>
                                <a href="{{ route('viewrequest', ['id' => $request->id, 'code' => $request->request_code]) }}"
                                    class="block hover:bg-gray-50">
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <p class="text-lg font-semibold  text-green-600 truncate">
                                                {{ $request->purpose->description }} @if ($request->other_purpose)
                                                    | {{ $request->other_purpose }}
                                                @endif
                                            </p>
                                            <div class="ml-2 flex-shrink-0 flex">
                                                @if ($request->status == 'Pending')
                                                    <p
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        {{ $request->status }}
                                                    </p>
                                                @endif
                                                @if ($request->status == 'Cleared')
                                                    <p
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-50 text-indigo-800">
                                                        {{ $request->status }}
                                                    </p>
                                                @endif
                                                @if ($request->status == 'Approved')
                                                    <p
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $request->status }}
                                                    </p>
                                                @endif
                                                @if ($request->status == 'Payment Review')
                                                    <p
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        {{ $request->status }}
                                                    </p>
                                                @endif
                                                @if ($request->status == 'Denied')
                                                    <p
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $request->status }}
                                                    </p>
                                                @endif
                                                @if ($request->status == 'Claimed')
                                                    <p
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        {{ $request->status }}
                                                    </p>
                                                @endif
                                                @if ($request->status == 'Ready To Claim')
                                                    <p
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-600 text-white">
                                                        {{ $request->status }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-end">

                                            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                                <!-- Heroicon name: solid/calendar -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <p>

                                                    <time
                                                        datetime="">{{ date('M d, Y', strtotime($request->created_at)) }}</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div x-cloak
                x-show="tab=='draft'"
                x-transition
                class="mt-10">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul role="list"
                        class="divide-y divide-gray-200">

                        @foreach ($drafts as $draft)
                            <li>
                                <a href="{{ route('finalize', ['id' => $draft->id]) }}"
                                    class="block hover:bg-gray-50">
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-indigo-600 truncate">
                                                Back End Developer
                                            </p>
                                            <div class="ml-2 flex-shrink-0 flex">
                                                <p
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Full-time
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-end">

                                            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                                <!-- Heroicon name: solid/calendar -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <p>
                                                    Closing on
                                                    <time datetime="2020-01-07">January 7, 2020</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
