   <div class="px-3 md:px-28 py-16">

       <form class="space-y-8 divide-y divide-gray-200">
           <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
               <div class="text-2xl font-bold text-green-600 flex items-center space-x-4">
                   <svg xmlns="http://www.w3.org/2000/svg" class="hidden md:block h-8 w-8" viewBox="0 0 20 20"
                       fill="currentColor">
                       <path fill-rule="evenodd"
                           d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                           clip-rule="evenodd" />
                   </svg>
                   <h1>FILL ALL REQUIRED INPUT FIELDS</h1>

               </div>
               <div class="
                    space-y-6 sm:space-y-5">
                   <div class="mt-4">
                       <h3 class="text-lg leading-6 font-medium text-gray-900">
                           Personal Information
                       </h3>

                   </div>
                   <div class="space-y-6 sm:space-y-5">
                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               Student Number
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <input wire:model.defer="student_number" type="text" name="student_number-name"
                                   id="student_number" autocomplete="given-name"
                                   class="max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                               @error('student_number')
                                   <span class="text-red-600">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                       <div
                           class="
                                   sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               First name
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <input wire:model.defer="firstname" type="text" name="first-name" id="first-name"
                                   autocomplete="given-name"
                                   class="max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                               @error('firstname')
                                   <span class="text-red-600">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>

                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               Middle name
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <input wire:model.defer="middlename" type="text" name="middle-name" id="middle-name"
                                   autocomplete="given-name" placeholder="Optional"
                                   class="max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                               @error('middlename')
                                   <span class="text-red-600">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               Last name
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <input wire:model.defer="lastname" type="text" name="last-name" id="last-name"
                                   autocomplete="family-name"
                                   class="max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                               @error('lastname')
                                   <span class="text-red-600">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="sex" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               Sex
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <select wire:model.defer="sex" id="sex" name="sex" autocomplete="sex"
                                   class="max-w-lg block focus:ring-green-500 focus:border-green-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                   <option selected></option>
                                   @foreach ($sexes as $sex)
                                       <option value="{{ $sex }}">{{ $sex }}</option>
                                   @endforeach
                               </select>
                               @error('sex')
                                   <span class="text-red-600">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>


                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               Address
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <input wire:model.defer="address" id="address" name="address" type="text"
                                   autocomplete="address"
                                   class="block max-w-lg w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm border-gray-300 rounded-md">
                               @error('address')
                                   <span class="text-red-600">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="contact" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               Contact Number
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <input wire:model.defer="contact_number" type="text" name="contact" id="contact"
                                   autocomplete="contact"
                                   class="max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                               @error('contact_number')
                                   <span class="text-red-600">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>

                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="campus" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               Campus
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <select wire:model="campus" id="campus" name="campus" autocomplete="campus"
                                   class="max-w-lg block focus:ring-green-500 focus:border-green-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                   <option selected></option>
                                   @foreach ($campuses as $campus)
                                       <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                   @endforeach
                               </select>

                           </div>
                       </div>
                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="campus" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               Course
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <select wire:model.defer="course" id="course" name="course" autocomplete="course"
                                   class="max-w-lg block focus:ring-green-500 focus:border-green-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                   <option selected></option>
                                   @foreach ($courses as $courses)
                                       <option value="{{ $courses->id }}">{{ $courses->name }}</option>
                                   @endforeach
                               </select>
                               @error('campus')
                                   <span class="text-red-600">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="sex" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               Status
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2">
                               <select wire:model.defer="status" id="sex" name="sex" autocomplete="sex"
                                   class="max-w-lg block focus:ring-green-500 focus:border-green-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                   <option selected></option>
                                   @foreach ($status_lists as $status)
                                       <option value="{{ $status }}">{{ $status }}</option>
                                   @endforeach
                               </select>
                               @error('status')
                                   <span class="text-red-600">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>

                       <div
                           class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                           <label for="id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                               School ID / Valid ID
                           </label>
                           <div class="mt-1 sm:mt-0 sm:col-span-2 space-y-2 grid">
                               @if ($valid_id)
                                   <img src="{{ $valid_id->temporaryUrl() }}" class="h-60 w-52" alt="">
                               @endif
                               <input wire:model.defer="valid_id" id="valid_id" name="valid_id" type="file"
                                   class="">
                            @error('valid_id')
                                   <span class="
                                   text-red-600">{{ $message }}</span>
                           @enderror
                       </div>
                   </div>



               </div>
           </div>
       </div>
       <div class="
                                   pt-5">
           <div class="flex justify-end">
               <x-shared.button method="saveInfo" text="Save Information" color="green" />
           </div>
       </div>
   </form>

</div>
