<div>
    <a wire:click.prevent="gotoRequest"
        href="#notif">
        <div class="flex space-x-3">
            <div class="flex-1 space-y-1">
                <p class="text-sm">
                    {{ $context }}
                </p>
                <div class="flex items-center justify-between">
                    <h3 class="text-xs font-medium"></h3>
                    <p class="text-xs">
                        {{ $time->format('Y-m-d H:m') }}
                    </p>
                </div>
            </div>
        </div>
    </a>
</div>
