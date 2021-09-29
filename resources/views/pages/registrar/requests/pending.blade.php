@extends('layouts.registrar')

@section('content')
    <div>
        <div class="pb-5">
            <h1 class="text-xl font-semibold text-gray-600">Pending Request</h1>
        </div>
        <div>
            @livewire('registrar.request.pending',[
            'id' => $id
            ])
        </div>
    </div>
@endsection
