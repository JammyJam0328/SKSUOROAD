<div>
    <div class="w-96  hidden md:block">
        <div class="bg-gray-50 px-2 pb-2 lg:flex-shrink-0 lg:border-l lg:border-gray-200  ">
            <div class="w-full">
                <div class="pt-2 pb-2">
                    <h2 class="text text-center font-semibold">Notifications</h2>
                </div>
                <div class="h-100 overflow-y-auto ">
                    <ul role="list"
                        class="divide-y divide-gray-200 border border-gray-300">
                        @foreach ($notifications as $notif)
                            <li
                                class="py-4 px-4 hover:shadow-md {{ $notif->read_at ? '' : 'bg-green-100 text-green-800' }}">
                                @livewire('registrar.component.notification-container',[
                                'id'=>$notif->data['request_id'],
                                'context'=>$notif->data['context'],
                                'time'=>$notif->created_at,
                                "notif"=>$notif->id,
                                ])
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>

    </div>
</div>
