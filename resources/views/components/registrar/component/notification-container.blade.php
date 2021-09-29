<div>
    <a href="{{ route('req-pending', ['id' => $notif->data['request_id']]) }}">
        <div class="flex space-x-3">

            <div class="flex-1 space-y-1">

                <p class="text-sm text-gray-500">
                    {{ $notif->data['context'] }}
                </p>
                <div class="flex items-center justify-between">
                    <h3 class="text-xs font-medium"></h3>
                    <p class="text-xs text-gray-500">
                        {{ $notif->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        </div>
    </a>
</div>
