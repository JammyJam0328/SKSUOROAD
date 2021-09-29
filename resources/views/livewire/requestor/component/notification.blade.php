<div x-data="{notifOpen:false}"
    wire:init="loadNotif"
    class="relative inline-block text-left"
    x-on:close-notif.window="notifOpen=false">
    <div>
        <button x-on:click="notifOpen=!notifOpen"
            type="button"
            class="bg-green-600 p-1 rounded-full text-white focus:outline-none  relative">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <svg class="h-6 w-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            @if ($unread)
                <span class="bg-red-600 text-white text-xs absolute top-0 px-1 rounded-full">{{ $unread }}</span>
            @endif
        </button>
    </div>

    <!--
    Dropdown menu, show/hide based on menu state.

    Entering: "transition ease-out duration-100"
      From: "transform opacity-0 scale-95"
      To: "transform opacity-100 scale-100"
    Leaving: "transition ease-in duration-75"
      From: "transform opacity-100 scale-100"
      To: "transform opacity-0 scale-95"
  -->
    <div x-cloak
        x-show="notifOpen"
        x-on:click.outside="notifOpen=false"
        class="origin-top-right absolute -right-8 md:right-0 mt-2 w-64  shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="menu-button"
        tabindex="-1">
        <div class="py-1 divide-y divide-gray-200"
            role="none">
            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            @forelse ($notifications as $notification)
                <a href="#"
                    class=" block px-4 py-2 text-sm {{ $notification->read_at ? 'text-gray-700' : 'text-green-700 bg-green-100 ' }}"
                    role="menuitem"
                    tabindex="-1"
                    id="menu-item-0">{{ $notification->data['context'] }}</a>
            @empty
                <span class="text-gray-700 block px-4 py-2 text-sm"
                    role="menuitem"
                    tabindex="-1"
                    id="menu-item-0">No notification found</span>
            @endforelse
        </div>
        @if (count($notifications))
            <div class="w-full  flex justify-center">
                <button wire:click.prevent="markRead"
                    class="focus:outline-none  ring-0 underline text-gray-600">Mark all as read
                </button>
            </div>
        @endif
    </div>
</div>
