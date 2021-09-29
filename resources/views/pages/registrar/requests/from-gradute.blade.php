@extends('layouts.registrar')

@section('content')
    <div>
        <div class="pb-5">
            <h1 class="text-xl font-semibold text-gray-600">Requests from graduate student to cleared</h1>
        </div>
        <div>
            @livewire('registrar.request.to-cleared',[
            'id' => $id
            ])
        </div>
    </div>

@endsection
