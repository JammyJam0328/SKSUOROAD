<div class="space-y-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Request Information
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Personal details and application.
            </p>
        </div>
        <div class="mt-5 border-t border-gray-200">
            <dl class="sm:divide-y sm:divide-gray-200">
                @if ($details->status == 'Ready To Claim')
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">
                            Retrieval Date
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $details->transaction->retrieval_date }} (Please retrieve your requested documents at
                            the given date)
                        </dd>
                    </div>
                @endif
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">
                        Request Code
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $details->request_code }}
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">
                        Receiver Name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $details->receiver_name }}

                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">
                        Purpose
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $details->purpose->description }} @if ($details->other_purpose)
                            | {{ $details->other_purpose }}
                        @endif
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">
                        Response thread
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                        <ul role="list"
                            class="divide-y divide-gray-200 space-y-2">
                            @foreach ($details->responses as $response)
                                <li
                                    class="relative py-5 px-4 bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                    <div class="flex justify-between space-x-3">
                                        <div class="min-w-0 flex-1">
                                            <a href="#"
                                                class="block focus:outline-none">
                                                <span class="absolute inset-0"
                                                    aria-hidden="true"></span>
                                                <p class="text-sm font-medium text-gray-900 truncate">Registrar
                                                </p>

                                            </a>
                                        </div>
                                        <time datetime="2021-01-27T16:35"
                                            class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">
                                            {{ $response->created_at->diffForHumans() }}
                                        </time>
                                    </div>
                                    <div class="mt-1">
                                        <p class="line-clamp-2 text-sm text-gray-600">
                                            {{ $response->message }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach

                            <!-- More messages... -->
                        </ul>

                    </dd>
                </div>

                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">
                        Document
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <ul role="list"
                            class="border border-gray-200 rounded-md divide-y divide-gray-200">
                            @foreach ($details->documents as $document)
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <!-- Heroicon name: solid/paper-clip -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            {{ $document->name }}
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        @if ($document->pivot->docx_status == 'approved')
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:text-blue-500">
                                                {{ $document->pivot->docx_status }}
                                            </a>

                                        @endif
                                        @if ($document->pivot->docx_status == 'denied')
                                            <a href="#"
                                                class="font-medium text-red-600 hover:text-red-500">
                                                {{ $document->pivot->docx_status }}
                                            </a>
                                        @endif
                                        @if ($document->pivot->docx_status == 'pending')
                                            <a href="#"
                                                class="font-medium text-yellow-600 hover:text-red-500">
                                                {{ $document->pivot->docx_status }}
                                            </a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
    <hr>
    @if ($details->status == 'Approved')
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div>
            <div class="bg-white shadow sm:rounded-lg ring-2 ring-indigo-500">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Payment
                    </h3>
                    <div class="py-4">
                        <div>
                            <dl class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                                <div class="py-3 flex justify-between text-sm font-medium">
                                    <dt class="text-gray-500">Documents total amount</dt>
                                    <dd class="text-gray-900">&#8369; {{ $details->transaction->documents_amount }}
                                    </dd>
                                </div>

                                @if ($details->transaction->documentary_stamp)
                                    <div class="py-3 flex justify-between text-sm font-medium">
                                        <dt class="text-gray-500">Documentary stamp</dt>
                                        <dd class="text-gray-900">&#8369;
                                            {{ $details->transaction->documentary_stamp }}
                                        </dd>
                                    </div>
                                @endif
                                @if ($details->transaction->additional_charge)
                                    <div class="py-3 flex justify-between text-sm font-medium">
                                        <dt class="text-gray-500">Additional charges</dt>
                                        <dd class="text-gray-900">&#8369;
                                            {{ $details->transaction->additional_charge }}
                                        </dd>
                                    </div>
                                @endif

                                <div class="py-3 flex justify-between font-bold">
                                    <dt class="text-gray-500 ">Total amount to pay</dt>
                                    <dd class="text-gray-900">&#8369; {{ $toPay }}</dd>
                                </div>
                            </dl>
                        </div>

                    </div>
                    <div class="mt-2 flex space-x-3">
                        <a href="https://epaymentportal.landbank.com/pay1.php?code=S05EUEtVSGltb2t0emdaNmwyRFV5aG1pVVYzNHdTRXByL2ZoNHZjS1pZRT0="
                            target="_blank"
                            type="button"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Pay
                        </a>
                        <a href="{{ route('tutorial') }}"
                            target="_blank"
                            type="button"
                            class="ring-1 ring-gray-600 inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            How to pay (Steps)
                            <!-- Heroicon name: solid/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="ml-2 -mr-0.5 h-4 w-4"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-5">

                @if ($images)
                    <ul id="gallery"
                        class="flex flex-1 flex-wrap -m-1">
                        @foreach ($images as $key => $image)
                            <li wire:key="image{{ $key }}"
                                class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24"
                                id="blob:https://tailwindcomponents.com/e2201f76-eaf3-4231-82e7-3dfdd10c2e06">
                                <article tabindex="0"
                                    class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-white shadow-sm">
                                    <img alt="141516.jpg"
                                        class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed"
                                        src="{{ $image->temporaryUrl() }}">

                                    <section
                                        class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">

                                        <div class="flex">
                                            <span class="p-1">
                                                <i>
                                                    <svg class="fill-current w-4 h-4 ml-auto pt-"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z">
                                                        </path>
                                                    </svg>
                                                </i>
                                            </span>
                                            <button wire:click.prevent="removeImage({{ $key }})"
                                                class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md"
                                                data-target="blob:https://tailwindcomponents.com/e2201f76-eaf3-4231-82e7-3dfdd10c2e06">
                                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24">
                                                    <path class="pointer-events-none"
                                                        d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </section>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="relative h-44 w-full bg-green-50 flex justify-center items-center">
                        <input wire:model="images"
                            type="file"
                            multiple
                            class="h-full w-full absolute opacity-0"
                            name=""
                            id="">
                        <div class=" ">
                            <svg xmlns="
                        http://www.w3.org/2000/svg"
                                class="h-24 w-24 text-green-600 mx-auto"
                                wire:target="images"
                                wire:loading.class="animate-bounce"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                            </svg>
                            <h1 class="text-xs md:text-xl font-semibold text-gray-600"
                                wire:loading.remove>Upload your proof of payment here
                            </h1>
                            <h1 class="text-xs md:text-xl font-semibold text-gray-600"
                                wire:loading
                                wire:target="images">Uploading please wait . . .
                            </h1>
                        </div>
                    </div>
                @endif
            </div>
            <div class="mt-2 flex justify-end">
                <button wire:click.prevent="saveproof"
                    type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save
                </button>
            </div>
        </div>

    @endif
    <x-shared.loading />
</div>
