@extends('layouts.registrar')

@section('content')
    <div>
        <div class="pb-5">
            <h1 class="text-xl font-semibold text-gray-600">Lists of Ready to Claim Requests</h1>
        </div>
        <div>
            <!-- This example requires Tailwind CSS v2.0+ -->
            @livewire('registrar.request.ready-to-claim',[
            'id' => $id
            ])
        </div>
    </div>
@endsection
