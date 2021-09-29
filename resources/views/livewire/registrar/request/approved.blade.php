  <div x-data="{modalOpen:@entangle('modal')}"
      class="bg-white px-4 py-7 rounded-md shadow-md">
      <div class="flow-root ">
          <ul role="list"
              class="-my-5 divide-y divide-gray-200">
              @forelse ($approved as $request)
                  <li class="py-4">
                      <div class="flex items-center space-x-4">
                          <div class="flex-shrink-0">
                              <img class="h-8 w-8 rounded-full"
                                  src="{{ $request->user->profile_photo_url }}"
                                  alt="">
                          </div>
                          <div class="flex-1 min-w-0">
                              <p class="text-sm font-medium text-gray-900 truncate">
                                  {{ $request->user->information->firstname }}
                                  {{ $request->user->information->middlename }}
                                  {{ $request->user->information->lastname }}


                              </p>
                              <p class="text-sm text-gray-500 truncate">
                                  Request Code : {{ $request->request_code }}
                              </p>
                          </div>
                          <div>
                              <a wire:click.prevent="viewRequest('{{ $request->id }}')"
                                  href="#{{ $request->request_code }}"
                                  class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                  View Details
                              </a>
                          </div>
                      </div>
                  </li>
              @empty
                  <x-shared.empty-box />
              @endforelse

          </ul>
      </div>



      <div>

          <div x-cloak
              x-show="modalOpen==true"
              x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
              x-transition:enter-start="translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="translate-x-full"
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
                                                  <div
                                                      class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
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
                                                                  <div
                                                                      class="border-t border-gray-200 px-4 py-5 sm:p-0">
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
                                                                  <div
                                                                      class="border-t border-gray-200 px-4 py-5 sm:p-0">
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

                                                      </div>

                                                      <!-- Right column -->
                                                      <div>
                                                          <section aria-labelledby="
                                                        recent-hires-title"
                                                              class="space-y-3">
                                                              <div class="bg-white p-5 rounded-md shadow-md space-y-3">
                                                                  <h1 class="text-lg text-gray-700">Responses</h1>
                                                                  <div>
                                                                      <ul role="list"
                                                                          class="divide-y divide-gray-200">
                                                                          @foreach ($details->documents as $document)
                                                                              <li
                                                                                  class="relative bg-white py-5 px-4 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                                                                  <div
                                                                                      class="flex justify-between space-x-3">
                                                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class=" text-green-600 h-8 w-8"
                                                                                          viewBox="0 0 20 20"
                                                                                          fill="currentColor">
                                                                                          <path
                                                                                              d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                                                      </svg>
                                                                                      <div
                                                                                          class="min-w-0 flex space-x-2">
                                                                                          <span>{{ $document->name }}</span>
                                                                                      </div>

                                                                                  </div>

                                                                              </li>
                                                                          @endforeach

                                                                          <!-- More messages... -->
                                                                      </ul>
                                                                  </div>
                                                              </div>
                                                              @if ($details->responses)
                                                                  <div
                                                                      class="bg-white p-5 rounded-md shadow-md space-y-3">
                                                                      <h1 class="text-lg text-gray-700">Responses</h1>
                                                                      <div>
                                                                          <ul role="list"
                                                                              class="divide-y divide-gray-200">
                                                                              @foreach ($details->responses as $response)
                                                                                  <li
                                                                                      class="relative bg-white py-5 px-4 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                                                                      <div
                                                                                          class="flex justify-between space-x-3">
                                                                                          <div class="min-w-0 flex-1">
                                                                                              <a href="#"
                                                                                                  class="block focus:outline-none">
                                                                                                  <span
                                                                                                      class="absolute inset-0"
                                                                                                      aria-hidden="true"></span>
                                                                                                  <p
                                                                                                      class="text-sm font-medium text-gray-900 truncate">
                                                                                                      Registrar</p>

                                                                                              </a>
                                                                                          </div>
                                                                                          <time
                                                                                              datetime=" {{ date('M d, Y', strtotime($response->created_at)) }}"
                                                                                              class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">
                                                                                              {{ date('M d, Y', strtotime($response->created_at)) }}</time>
                                                                                      </div>
                                                                                      <div class="mt-1">
                                                                                          <blockquote>
                                                                                              <p
                                                                                                  class="line-clamp-2 text-sm text-gray-600">
                                                                                                  "
                                                                                                  {{ $response->message }}"
                                                                                              </p>
                                                                                          </blockquote>
                                                                                      </div>
                                                                                  </li>
                                                                              @endforeach

                                                                              <!-- More messages... -->
                                                                          </ul>
                                                                      </div>
                                                                  </div>

                                                              @endif
                                                          </section>
                                                      </div>
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
      </div>
      <x-shared.loading />

  </div>
