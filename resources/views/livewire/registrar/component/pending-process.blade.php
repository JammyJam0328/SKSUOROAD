<div x-data="{approveModal:false, denyModal:false}"
    class="grid grid-cols-1 gap-4">
    <section aria-labelledby="recent-hires-title">
        <div class="py-2 flex justify-center">
            <span class="relative z-0 inline-flex shadow-sm rounded-md ">
                <button type="button"
                    class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    Mark as processing
                </button>
                <button x-on:click="approveModal=true"
                    type="button"
                    class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-blue-700 hover:text-white hover:bg-blue-600 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    Approved
                </button>
                <button x-on:click="denyModal=true"
                    type="button"
                    class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-red-700 hover:text-white hover:bg-red-600 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    Deny
                </button>
            </span>
        </div>
        <div class="rounded-lg bg-white overflow-hidden shadow">
            <div class="p-6">
                <h2 class="text-base font-medium text-gray-900"
                    id="recent-hires-title">Request Document/s</h2>
                <div class="flow-root mt-6">
                    <ul role="list"
                        class="-my-5 divide-y divide-gray-200">

                        @foreach ($request->documents as $document)
                            <li class="py-4">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-8 w-8 rounded-full text-green-600"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                            <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                                        </svg>

                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{ $document->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            @if ($document->pivot->withAuth == 'yes')
                                                With Authentication
                                            @endif
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            Copies :
                                            {{ $document->pivot->copies }}
                                        </p>

                                        @if ($document->id == '5')
                                            <div>
                                                <p class="text-sm text-gray-500 truncate">
                                                    Number of Pages :
                                                    {{ $document->pivot->number_of_pages }}
                                                </p>
                                                <div
                                                    class="text-sm text-gray-500 py-2 pr-2 flex space-x-2 justify-between w-full">
                                                    @if ($document->pivot->docx_status == 'pending')
                                                        <input type="number"
                                                            wire:model.defer="page_count"
                                                            name="page"
                                                            id="page"
                                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full text-sm border-gray-300 rounded-md"
                                                            placeholder="">
                                                        <button
                                                            wire:click.prevent="savePageNumber('{{ $document->id }}')"
                                                            class="inline-flex items-center px-2  border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            <!-- Heroicon name: solid/plus-sm -->
                                                            <svg class="h-5 w-5"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor"
                                                                aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>
                                                @error('page_count')
                                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        @if ($document->pivot->docx_status == 'pending')
                                            <div class="grid space-y-2">
                                                @if ($document->id == '5')
                                                    <a wire:click.prevent="approveDocumentTORG('{{ $document->id }}')"
                                                        href="#TOR"
                                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                        Approved
                                                    </a>
                                                @else
                                                    <a wire:click.prevent="approveDocument('{{ $document->id }}')"
                                                        href="#document"
                                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                        Approved
                                                    </a>
                                                @endif
                                                <a wire:click.prevent="denyDocument('{{ $document->id }}')"
                                                    href="#deny"
                                                    class=" text-center shadow-sm px-2.5 py-0.5 border border-red-300 text-sm leading-5 font-medium rounded-full text-white bg-red-600 hover:bg-red-700">
                                                    Deny
                                                </a>
                                            </div>

                                        @else
                                            <div>
                                                <a wire:click.prevent="editStatus('{{ $document->id }}')"
                                                    href="#undo"
                                                    class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                    Undo
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
                <div class="mt-6">
                    <div
                        class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        &#8369; {{ $subtotal }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section aria-labelledby="announcements-title">
        <form action="">
            @csrf
            <div class="rounded-lg bg-white overflow-hidden shadow">
                <div class="p-6">
                    <h2 class="text-base font-medium text-gray-900"
                        id="announcements-title">Billing</h2>
                    <div class="flow-root mt-3">
                        <ul role="list"
                            class="-my-5 divide-y divide-gray-200">
                            <li class="py-5">
                                <div class="relative ">

                                    <div>
                                        <label for="price"
                                            class="block text-sm font-medium text-gray-700">Documentary Stamp</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">
                                                    &#8369;
                                                </span>
                                            </div>
                                            <input wire:model.defer="documentary_stamp"
                                                type="number"
                                                name="ds"
                                                id="ds"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                                placeholder="0.00"
                                                aria-describedby="ds">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm"
                                                    id="price-currency">
                                                    PHP
                                                </span>
                                            </div>
                                        </div>
                                        @error('documentary_stamp')
                                            <span class="text-red-600 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </li>

                            <li class="py-5">
                                <div class="relative ">

                                    <div>
                                        <label for="price"
                                            class="block text-sm font-medium text-gray-700">Additional Charges</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">
                                                    &#8369;
                                                </span>
                                            </div>
                                            <input wire:model.defer="additional_charges"
                                                type="number"
                                                name="ds"
                                                id="ds"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                                placeholder="0.00"
                                                aria-describedby="ds">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm"
                                                    id="price-currency">
                                                    PHP
                                                </span>
                                            </div>
                                        </div>
                                        @error('additional_charges')
                                            <span class="text-red-600 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </li>

                            <li class="py-5">
                                <div class="relative ">
                                    <div>
                                        <label for="res"
                                            class="block text-sm font-medium text-gray-700">Response / Remarks</label>
                                        <div class="mt-1">
                                            <textarea wire:model.defer="response"
                                                name="res"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                id="res"
                                                cols="30"
                                                rows="10"></textarea>
                                            @error('response')
                                                <span class="text-red-600 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-cloak
        x-show="approveModal"
        x-on:close-modal.window="approveModal=false"
        class="fixed z-10 inset-0 overflow-y-auto"
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
                            Approve Request
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Do you want to continue ?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                    <button wire:click.prevent="approvedRequest"
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

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-cloak
        x-show="denyModal"
        x-on:close-deny-modal.window="denyModal=false"
        class="fixed z-10 inset-0 overflow-y-auto"
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
                            Deny Request
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to deny this request?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button wire:click.prevent="denyRequest"
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
