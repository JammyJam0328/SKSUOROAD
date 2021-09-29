  <div class="bg-white px-4 py-7 rounded-md shadow-md">
      <div class="flow-root ">
          <ul role="list"
              class="-my-5 divide-y divide-gray-200">
              @forelse ($readys as $request)
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
                              <a wire:click.prevent="markAsClaimed('{{ $request->id }}','{{ $request->request_code }}')"
                                  href="#{{ $request->request_code }}"
                                  class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                  Mark as claimed
                              </a>
                          </div>
                      </div>
                  </li>
              @empty
                  <x-shared.empty-box />
              @endforelse

          </ul>
      </div>

  </div>
