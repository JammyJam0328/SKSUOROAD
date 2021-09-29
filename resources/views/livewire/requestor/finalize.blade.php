<div>
    <div class="pb-5">
        <h1 class="text-xl text-green-500 font-semibold text-center">Options</h1>
    </div>
    <div class=" flex-col hidden md:flex">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Document
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    With Authentication
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Copies
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($request_documents as $document)
                                <tr wire:key="{{ $document->id }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $document->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($document->pivot->withAuth == 'no')
                                            <input id="authdasdasd-{{ $document->id }}"
                                                name="authasdasd-{{ $document->id }}"
                                                type="checkbox"
                                                wire:click="checkAuth('{{ $document->id }}')"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        @else
                                            <input checked="true"
                                                id="authdasdasd-{{ $document->id }}"
                                                name="authasdasd-{{ $document->id }}"
                                                type="checkbox"
                                                wire:click="uncheckAuth('{{ $document->id }}')"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <!-- This example requires Tailwind CSS v2.0+ -->
                                        <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                            <button wire:click.prevent="minusCopies('{{ $document->id }}')"
                                                @if ($document->pivot->copies == 1)
                                                disabled
                            @endif
                            class="relative inline-flex items-center px-2 py-1 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                            <span class="sr-only">Previous</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-3 w-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M18 12H6" />
                            </svg>
                            </button>
                            <div class="px-2 flex items-center">
                                {{ $document->pivot->copies }}
                            </div>
                            <button wire:click.prevent="addCopies('{{ $document->id }}')"
                                type="button"
                                class="-ml-px relative inline-flex items-center px-2 py-1 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                <span class="sr-only">Next</span>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-3 w-3"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </button>
                            </span>

                            </td>
                            </tr>
                            @endforeach

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="block md:hidden">

        <div class="mt-8">
            <div class="flow-root">
                <ul role="list"
                    class="-my-6 divide-y divide-green-600">
                    @foreach ($request_documents as $document)
                        <li class="py-6 flex">


                            <div class="ml-4 flex-1 flex flex-col space-y-2">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <a href="#">
                                                {{ $document->name }}
                                            </a>
                                        </h3>

                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">
                                        @if ($document->pivot->withAuth == 'no')
                                            <input id="authdasdasd-{{ $document->id }}"
                                                name="authasdasd-{{ $document->id }}"
                                                type="checkbox"
                                                wire:click="checkAuth('{{ $document->id }}')"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        @else
                                            <input checked="true"
                                                id="authdasdasd-{{ $document->id }}"
                                                name="authasdasd-{{ $document->id }}"
                                                type="checkbox"
                                                wire:click="uncheckAuth('{{ $document->id }}')"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        @endif With Authentication
                                    </p>
                                </div>
                                <div
                                    class="flex-1 flex items-end justify-between text-sm border-t border-gray-300 pt-3">
                                    <p class="text-gray-500">
                                        Copies
                                    </p>

                                    <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                        <button wire:click.prevent="minusCopies('{{ $document->id }}')"
                                            @if ($document->pivot->copies == 1)
                                            disabled
                    @endif
                    class="relative inline-flex items-center px-2 py-1 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    <span class="sr-only">Previous</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-3 w-3"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M18 12H6" />
                    </svg>
                    </button>
                    <div class="px-2 flex items-center">
                        {{ $document->pivot->copies }}
                    </div>
                    <button wire:click.prevent="addCopies('{{ $document->id }}')"
                        type="button"
                        class="-ml-px relative inline-flex items-center px-2 py-1 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                        <span class="sr-only">Next</span>
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-3 w-3"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </button>
                    </span>
            </div>
        </div>
        </li>
        @endforeach



        <!-- More products... -->
        </ul>
    </div>
</div>

</div>
<div class="pt-10 flex justify-end">
    <x-shared.router link="{{ route('dashboard') }}"
        text="Do it Later" />
    <x-shared.button method="finalize"
        text="Finalize"
        color="green" />
</div>
</div>
