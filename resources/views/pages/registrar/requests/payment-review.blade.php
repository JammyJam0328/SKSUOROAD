@extends('layouts.registrar')

@section('content')
    <div>
        <div class="pb-5">
            <h1 class="text-xl font-semibold text-gray-600">Requests Payments to Review</h1>
        </div>
        <div>
            @livewire('registrar.request.payment-review',[
            'id' => $id
            ])
        </div>
    </div>

@endsection
