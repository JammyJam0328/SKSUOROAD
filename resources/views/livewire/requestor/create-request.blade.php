<div>
    <div class="">
        <div class=" pb-3">
        <h1 class="text-xl font-bold text-green-600 text-center">SELECT DOCUMENT</h1>
    </div>
    <hr>
    <form action="">
        @csrf
        <div class="   grid md:grid-cols-3 gap-4  mt-2">
            @forelse ($docx_lists as $docs)
                <div class="relative flex items-start">
                    <div class="flex items-center h-5">
                        <input wire:model='document' value="{{ $docs->id }}"
                            id="selected_documents-{{ $docs->id }}" name="selected_documents-{{ $docs->id }}"
                            aria-describedby="comments-description" type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="selected_documents-{{ $docs->id }}"
                            class="font-bold text-gray-700  md:text-lg">{{ $docs->name }}</label>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
        <div class="mt-10  border-t-4 border-green-600 pt-4">
            <div class="py-4">
                <h1 class="text-xl font-bold text-green-600 text-center"> Fill all required inputs </h1>
            </div>
            <div class=" grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="reciever-name" class="block text-sm font-medium text-gray-700">
                        Reciever Name
                    </label>
                    <div class="mt-1">
                        <input wire:model.defer="receiver_name" type="text" name="reciever-name" id="reciever-name"
                            autocomplete="reciever-name"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="porpuse" class="block text-sm font-medium text-gray-700">
                        Purpose
                    </label>
                    <div class="mt-1">
                        <select wire:model="purpose" id="porpuse" name="porpuse" autocomplete="porpuse"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option selected></option>
                            @foreach ($purposes as $purpose)
                                <option value="{{ $purpose->id }}">{{ $purpose->description }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                @if ($others)
                    <div class="sm:col-span-3">
                        <label for="other-porpuse" class="block text-sm font-medium text-gray-700">
                            Other Purpose
                        </label>
                        <div class="mt-1">
                            <input wire:model.defer="other_purpose" type="text" name="other-porpuse" id="other-porpuse"
                                autocomplete="other-porpuse"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                @endif

            </div>
    </form>

    <div class="py-4 flex justify-end">
        <x-shared.button method="createRequest" text="Continue" color="green" />
    </div>

</div>
</div>
