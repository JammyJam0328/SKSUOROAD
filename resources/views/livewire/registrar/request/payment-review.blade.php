<div x-data="{modalOpen:@entangle('modal'),approveModal:false,denyModal:false}">
    <div>
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul role="list"
                class="divide-y divide-gray-200">

                @forelse ($toreviews as $request)
                    <li>
                        <a wire:click.prevent="viewRequest('{{ $request->id }}')"
                            href="#"
                            class="block hover:bg-gray-50">
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-full"
                                            src="{{ $request->user->profile_photo_url }}"
                                            alt="">
                                    </div>
                                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <p class="text-sm font-medium text-indigo-600 truncate">
                                                {{ $request->user->information->firstname }}
                                                {{ $request->user->information->middlename }}
                                                {{ $request->user->information->lastname }}</p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                                <!-- Heroicon name: solid/mail -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                </svg>
                                                <span class="truncate">{{ $request->request_code }}</span>
                                            </p>
                                        </div>
                                        <div class="hidden md:block">
                                            <div>
                                                <p class="text-sm text-gray-900">
                                                    Applied on
                                                    <time
                                                        datetime="">{{ date('M d, Y', strtotime($request->created_at)) }}</time>
                                                </p>
                                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                                    <!-- Heroicon name: solid/check-circle -->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ $request->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <!-- Heroicon name: solid/chevron-right -->
                                    <svg class="h-5 w-5 text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </li>
                @empty
                    <x-shared.empty-box />
                @endforelse

            </ul>
        </div>

    </div>

    {{-- modal container --}}
    <div>
        <!-- This example requires Tailwind CSS v2.0+ -->

        <div x-cloak
            x-show="modalOpen==true"
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            x-on:close-modal.window="modalOpen=false"
            class="fixed inset-0 overflow-hidden z-40"
            aria-labelledby="slide-over-title"
            role="dialog"
            aria-modal="true">
            <div class="absolute inset-0 overflow-hidden">
                <!-- Background overlay, show/hide based on slide-over state. -->
                <div class="absolute inset-0"
                    aria-hidden="true">
                    <div class="fixed inset-y-0 right-0  max-w-full flex ">
                        <div class="w-screen">
                            <div
                                class="h-full flex flex-col py-6 bg-gray-50 border-l-8 border-green-600 shadow-xl overflow-y-scroll">
                                <div class="px-4 sm:px-6">
                                    <div class="flex items-end justify-between">

                                        <div class="ml-3 h-7 flex  items-center fixed left-3 top-3">
                                            <button wire:click.prevent="closeModal"
                                                type="button"
                                                class="bg-gray-700  flex items-center space-x-2 px-2 py-1 rounded-md text-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span>Return</span>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div x-data="{infoTab:'reqInfo'}"
                                    class="mt-6 relative flex-1 px-4 sm:px-6">
                                    @if ($modal)
                                        <main class=" pb-8">
                                            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                                                <h1 class="sr-only">Profile</h1>
                                                <!-- Main 3 column grid -->
                                                <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
                                                    <!-- Left column -->
                                                    <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                                                        <!-- Welcome panel -->
                                                        <section aria-labelledby="profile-overview-title">
                                                            <div class="rounded-lg bg-white overflow-hidden shadow">
                                                                <h2 class="sr-only"
                                                                    id="profile-overview-title">Profile Overview</h2>
                                                                <div class="bg-white p-3">
                                                                    <div
                                                                        class="sm:flex sm:items-center sm:justify-between">
                                                                        <div class="sm:flex sm:space-x-5">
                                                                            <div class="flex-shrink-0">
                                                                                <img class="mx-auto h-10 w-10 rounded-full"
                                                                                    src="{{ $details->user->profile_photo_url }}"
                                                                                    alt="">
                                                                            </div>
                                                                            <div
                                                                                class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">

                                                                                <p
                                                                                    class="text-xl font-bold text-gray-900 sm:text-2xl">
                                                                                    {{ $details->user->information->firstname }}
                                                                                    {{ $details->user->information->middlename }}
                                                                                    {{ $details->user->information->lastname }}
                                                                                </p>
                                                                                <p
                                                                                    class="text-sm font-medium text-gray-600">
                                                                                    {{ $details->user->information->studentnumber }}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="border-t border-gray-200 bg-gray-50 grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-2 sm:divide-y-0 sm:divide-x">
                                                                    <div x-on:click="infoTab='reqInfo'"
                                                                        x-bind:class="infoTab=='reqInfo' ? 'bg-gray-200' : ''"
                                                                        class="px-6 py-2 text-sm font-medium text-center cursor-pointer hover:bg-gray-200">
                                                                        <span class="text-gray-600">Request
                                                                            Information</span>
                                                                    </div>

                                                                    <div x-on:click="infoTab='appInfo'"
                                                                        x-bind:class="infoTab=='appInfo' ? 'bg-gray-200' : ''"
                                                                        class="px-6 py-2 text-sm font-medium text-center cursor-pointer hover:bg-gray-200">
                                                                        <span class="text-gray-600">View Applicant
                                                                            Information</span>
                                                                    </div>




                                                                </div>
                                                            </div>
                                                        </section>

                                                        <!-- Actions panel -->
                                                        <section class="space-y-4"
                                                            aria-labelledby="quick-links-title">
                                                            <!-- This example requires Tailwind CSS v2.0+ -->
                                                            <div x-show="infoTab=='reqInfo'"
                                                                class="bg-white shadow overflow-hidden sm:rounded-lg">
                                                                <div class="px-4 py-5 sm:px-6">
                                                                    <h3
                                                                        class="text-lg leading-6 font-medium text-gray-900">
                                                                        Request Information
                                                                    </h3>

                                                                </div>
                                                                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                                                    <dl class="sm:divide-y sm:divide-gray-200">
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Request Code
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->request_code }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Receiver Name
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->receiver_name }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Purpose
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->purpose->description }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Specified Purpose
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->other_purpose }}
                                                                            </dd>
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Valid ID
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                                                                <iframe
                                                                                    src="https://drive.google.com/file/d/{{ $details->user->information->valid_id }}/preview?embedded=true"
                                                                                    class="w-full flex-wrap"></iframe>
                                                                            </dd>
                                                                        </div>


                                                                    </dl>
                                                                </div>
                                                            </div>

                                                            <div x-cloak
                                                                x-show="infoTab=='appInfo'"
                                                                class="bg-white shadow overflow-hidden sm:rounded-lg">
                                                                <div class="px-4 py-5 sm:px-6">
                                                                    <h3
                                                                        class="text-lg leading-6 font-medium text-gray-900">
                                                                        Applicant Information
                                                                    </h3>
                                                                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                                                        Personal details and application.
                                                                    </p>
                                                                </div>
                                                                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                                                    <dl class="sm:divide-y sm:divide-gray-200">
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Student Number
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->user->information->studentnumber }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Full name
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->user->information->firstname }}
                                                                                {{ $details->user->information->middlename }}
                                                                                {{ $details->user->information->lastname }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Sex
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->user->information->sex }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Email address
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->user->email }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Address
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->user->information->address }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Contact Number
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->user->information->contactnumber }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Status
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->user->information->status }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Campus
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->user->information->course->campus->name }}
                                                                            </dd>
                                                                        </div>
                                                                        <div
                                                                            class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                            <dt
                                                                                class="text-sm font-medium text-gray-500">
                                                                                Course
                                                                            </dt>
                                                                            <dd
                                                                                class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                                {{ $details->user->information->course->name }}
                                                                            </dd>
                                                                        </div>
                                                                    </dl>
                                                                </div>
                                                            </div>


                                                        </section>
                                                        <div class="mt-5 bg-white px-4 pb-4 rounded-md shadow-md">
                                                            <div class="px-4 py-2 pt-3 sm:px-6">
                                                                <h3
                                                                    class="text-lg leading-6 text-center font-medium text-gray-900">
                                                                    Proof of payment photos
                                                                </h3>

                                                            </div>
                                                            <hr>
                                                            <ul id="gallery"
                                                                class="flex flex-1 flex-wrap -m-1 mt-2 justify-center">
                                                                @foreach ($details->transaction->proofofpayments as $proof)



                                                                    <li class="block p-1 w-40"
                                                                        id="blob:https://tailwindcomponents.com/e2201f76-eaf3-4231-82e7-3dfdd10c2e06">
                                                                        <article tabindex="0"
                                                                            class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-white shadow-sm">
                                                                            <iframe alt="141516.jpg"
                                                                                class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed"
                                                                                src="https://drive.google.com/file/d/{{ $proof->image }}/preview?embedded=true">
                                                                            </iframe>


                                                                        </article>
                                                                    </li>


                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <!-- Right column -->
                                                    <div>
                                                        <section aria-labelledby="
                                                        recent-hires-title">
                                                            <div class="py-2 flex justify-center">
                                                                <span
                                                                    class="relative z-0 inline-flex shadow-sm rounded-md ">
                                                                    <button x-on:click="approveModal=true"
                                                                        type="button"
                                                                        class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-blue-600 hover:text-white hover:bg-blue-600 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                                        Approve Payment
                                                                    </button>

                                                                    <button x-on:click="denyModal=true"
                                                                        type="button"
                                                                        class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-red-700 hover:text-white hover:bg-red-600 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                                        Deny Payment
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="rounded-lg bg-white overflow-hidden shadow p-4">
                                                                <div>
                                                                    <h3 class="font-medium text-gray-900">Payment
                                                                        Details
                                                                    </h3>
                                                                    <dl
                                                                        class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                                                                        <div
                                                                            class="py-3 flex justify-between text-sm font-medium">
                                                                            <dt class="text-gray-500">Document total
                                                                                amount </dt>
                                                                            <dd class="text-gray-900">
                                                                                &#8369;
                                                                                {{ $details->transaction->documents_amount }}
                                                                            </dd>
                                                                        </div>

                                                                        @if ($details->transaction->documentary_stamp)
                                                                            <div
                                                                                class="py-3 flex justify-between text-sm font-medium">
                                                                                <dt class="text-gray-500">Documentary
                                                                                    Stamp</dt>
                                                                                <dd class="text-gray-900">
                                                                                    &#8369;
                                                                                    {{ $details->transaction->documentary_stamp }}
                                                                                </dd>
                                                                            </div>
                                                                        @endif


                                                                        @if ($details->transaction->additional_charge)
                                                                            <div
                                                                                class="py-3 flex justify-between text-sm font-medium">
                                                                                <dt class="text-gray-500">
                                                                                    Additional Chargers</dt>
                                                                                <dd class="text-gray-900">
                                                                                    &#8369;
                                                                                    {{ $details->transaction->additional_charge }}
                                                                                </dd>
                                                                            </div>
                                                                        @endif

                                                                        <div
                                                                            class="py-3 flex justify-between text-lg font-bold">
                                                                            <dt class="text-gray-800">
                                                                                Total amount : </dt>
                                                                            <dd class="text-gray-900">
                                                                                &#8369; {{ $total }}
                                                                            </dd>
                                                                        </div>



                                                                    </dl>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="rounded-lg bg-white overflow-hidden shadow p-4 mt-5">
                                                                <div>
                                                                    <label for="email"
                                                                        class="block text-sm font-medium text-gray-700">Response</label>
                                                                    <div class="mt-1">
                                                                        <textarea wire:model.defer="response"
                                                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                                            name=""
                                                                            id=""
                                                                            cols="30"
                                                                            rows="10"></textarea>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="rounded-lg bg-white overflow-hidden shadow p-4 mt-4">
                                                                <div>
                                                                    <label for="email"
                                                                        class="block text-sm font-medium text-gray-700">Retrieval
                                                                        Date</label>
                                                                    <div class="mt-1">

                                                                        <input wire:model="date"
                                                                            type="date"
                                                                            name="rdate"
                                                                            id="rdate"
                                                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                                        @error('date')
                                                                            <span
                                                                                class="text-red-600">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </main>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div x-cloak
            x-show="approveModal"
            x-on:close-modal.window="approveModal=false"
            class="fixed z-50 inset-0 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div x-cloak
                    x-show="approveModal"
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true">&#8203;</span>


                <div x-cloak
                    x-show="approveModal"
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div>
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <!-- Heroicon name: outline/check -->
                            <svg class="h-6 w-6 text-green-600"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900"
                                id="modal-title">
                                Approve Payment
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Do you want to continue ?
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                        <button wire:click.prevent="approvedPayment"
                            x-on:click="approveModal=false"
                            type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                            Yes
                        </button>
                        <button x-on:click="approveModal=false"
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div x-cloak
            x-show="denyModal"
            x-on:close-modal.window="denyModal=false"
            class="fixed z-50 inset-0 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true">&#8203;</span>

                <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
                <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg class="h-6 w-6 text-red-600"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900"
                                id="modal-title">
                                Deny Payment
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to deny this request?
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button wire:click.prevent="denyPayment"
                            type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Yes
                        </button>
                        <button x-on:click="denyModal=false"
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <x-shared.loading />
    </div>
</div>
